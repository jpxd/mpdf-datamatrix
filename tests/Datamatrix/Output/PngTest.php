<?php

namespace Mpdf\Datamatrix\Output;

use Mpdf\DatamatrixCode\DatamatrixCode;
use Mpdf\DatamatrixCode\Output\Png;

/**
 * @group unit
 */
class PngTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	public function testOutput()
	{
		$code = new DatamatrixCode('LOREM IPSUM 2019');

		$output = new Png();

		$data = $output->output($code);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019-100.png';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));

		$data = $output->output($code, 250);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019-250.png';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));
	}
}
