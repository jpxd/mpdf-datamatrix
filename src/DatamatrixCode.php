<?php

namespace Mpdf\DatamatrixCode;

use Datamatrix;

/**
 * Datamatrix Code generator
 *
 * @license LGPL
 */
class DatamatrixCode
{

	/**
	 * @var Datamatrix
	 */
	private $datamatrix;

	/**
	 * @param string $value Contents of the Datamatrix code
	 */
	public function __construct($value)
	{
		if (empty($value)) {
			throw new DatamatrixCodeException('Datamatrix code cannot be empty');
		}
		if (strlen($value) > 2048) {
			throw new DatamatrixCodeException('Datamatrix code cannot be longer than 2048 characters');
		}
		$this->datamatrix = new Datamatrix($value);
	}

	/**
	 * @return int Datamatrix code dimensions
	 */
	public function getDatamatrixSize()
	{
		return $this->datamatrix->getBarcodeArray()['num_rows'];
	}
	
	/**
	 * @return mixed[]
	 */
	public function getFinal()
	{
		return array_merge(...$this->datamatrix->getBarcodeArray()['bcode']);
	}

}
