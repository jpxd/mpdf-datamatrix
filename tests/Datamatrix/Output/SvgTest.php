<?php

namespace Mpdf\DatamatrixCode\Output;

use Mpdf\DatamatrixCode\DatamatrixCode;

/**
 * @group unit
 */
class SvgTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{
	public function testOutput()
	{
		$code = new DatamatrixCode('LOREM IPSUM 2019');

		$output = new Svg();

		$data = $output->output($code);

		$filename = __DIR__ . '/../../reference/LOREM-IPSUM-2019.svg';
		file_put_contents($filename, $data);
		$this->assertSame($data, file_get_contents($filename));
		$this->assertStringStartsWith('<?xml', $data); // @todo solve line endings in GitHub Windows CI and test against reference
	}
}
