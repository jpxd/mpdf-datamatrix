<?php

namespace Mpdf\Datamatrix\Output;

use Mpdf\DatamatrixCode\DatamatrixCode;
use Mpdf\DatamatrixCode\Output\Html;

/**
 * @group unit
 */
class HtmlTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	public function testOutput()
	{
		$code = new DatamatrixCode('LOREM IPSUM 2019');

		$output = new Html();

		$data = $output->output($code);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019.html';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));
	}
}
