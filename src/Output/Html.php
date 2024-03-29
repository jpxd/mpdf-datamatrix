<?php

namespace Mpdf\DatamatrixCode\Output;

use Mpdf\DatamatrixCode\DatamatrixCode;

class Html
{

	/**
	 * @param \Mpdf\DatamatrixCode\DatamatrixCode $datamatrixCode
	 *
	 * @return string
	 */
	public function output(DatamatrixCode $datamatrixCode)
	{
		$s = '';

		$datamatrixSize = $datamatrixCode->getDatamatrixSize();
		$final = $datamatrixCode->getFinal();

		$minSize = 0;
		$maxSize = $datamatrixSize;

		$s .= '<table class="qr" cellpadding="0" cellspacing="0" style="font-size: 1px;">' . "\n";

		for ($y = $minSize; $y < $maxSize; $y++) {
			$s .= '<tr style="height: 4px;">';
			for ($x = $minSize; $x < $maxSize; $x++) {
				$on = $final[$x + $y * $datamatrixSize];
				$s .= '<td class="' . ($on ? 'on' : 'off') . '" style="width: 4px; background-color: ' . ($on ? '#000' : '#FFF') . '">&nbsp;</td>';
			}
			$s .= '</tr>' . "\n";
		}

		$s .= '</table>';

		return $s;
	}

}
