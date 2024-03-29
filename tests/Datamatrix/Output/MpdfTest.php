<?php

namespace Mpdf\DatamatrixCode\Output;

use Mockery;
use Mpdf\DatamatrixCode\DatamatrixCode;

/**
 * @group unit
 */
class MpdfTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	public function testOutput()
	{
		$code = new DatamatrixCode('LOREM IPSUM 2019');

		$mpdf = Mockery::mock('Mpdf\Mpdf');

		$mpdf->shouldReceive('SetDrawColor')->once();
		$mpdf->shouldReceive('SetFillColor')->twice();
		$mpdf->shouldReceive('Rect')->times(143);

		$output = new Mpdf();

		$output->output($code, $mpdf, 0, 0, 0);
	}

	protected function tear_down()
	{
		parent::tear_down();

		if ($container = Mockery::getContainer()) {
			$this->addToAssertionCount($container->mockery_getExpectationCount());
		}

		Mockery::close();
	}

}
