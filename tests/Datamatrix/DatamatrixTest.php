<?php

namespace Mpdf\DatamatrixCode;

/**
 * @group unit
 */
class DatamatrixTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	public function testDatamatrixAlnum()
	{
		$datamatrixCode = new DatamatrixCode('LOREM IPSUM 2019');

		$this->assertSame(16, $datamatrixCode->getDatamatrixSize());
	}

	public function testDatamatrixNumeric()
	{
		$datamatrixCode = new DatamatrixCode('5548741164863348');

		$this->assertCount(196, $datamatrixCode->getFinal());
	}

	public function testEmptyValue()
	{
		$this->expectException(\Mpdf\DatamatrixCode\DatamatrixCodeException::class);

		new DatamatrixCode('');
	}

	public function testTooLongData()
	{
		$this->expectException(\Mpdf\DatamatrixCode\DatamatrixCodeException::class);

		new DatamatrixCode(base64_encode(random_bytes(1024 * 3)));
	}

}
