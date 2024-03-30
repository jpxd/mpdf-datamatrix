<?php

namespace Mpdf\DatamatrixCode\Output;

use Mpdf\Mpdf as MpdfObject;
use Mpdf\DatamatrixCode\DatamatrixCode;

class Mpdf
{

	/**
	 * Write the DatamatrixCode into an Mpdf\Mpdf object
	 *
	 * @param \Mpdf\DatamatrixCode\DatamatrixCode $qrCode DatamatrixCode instance
	 * @param \Mpdf\Mpdf $mpdf Mpdf instance
	 * @param float $x position X
	 * @param float $y position Y
	 * @param float $w DatamatrixCode width
	 * @param int[] $background RGB background color
	 * @param int[] $color RGB foreground and border color
	 */
	public function output(DatamatrixCode $qrCode, MpdfObject $mpdf, $x, $y, $w, $background = [255, 255, 255], $color = [0, 0, 0])
	{
		$size = $w;
		$datamatrixSize = $qrCode->getDatamatrixSize();
		$s = $size / $qrCode->getDatamatrixSize();

		$mpdf->SetDrawColor($color[0], $color[1], $color[2]);
		$mpdf->SetFillColor($background[0], $background[1], $background[2]);

		$minSize = 0;
		$maxSize = $datamatrixSize;
		$mpdf->Rect($x, $y, $size, $size, 'FD');

		$mpdf->SetFillColor($color[0], $color[1], $color[2]);

		$final = $qrCode->getFinal();

		for ($j = $minSize; $j < $maxSize; $j++) {
			for ($i = $minSize; $i < $maxSize; $i++) {
				if ($final[$i + $j * $datamatrixSize]) {
					$mpdf->Rect($x + ($i - $minSize) * $s, $y + ($j - $minSize) * $s, $s, $s, 'F');
				}
			}
		}
	}

}
