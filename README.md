# mPDF Datamatrix code library

Datamatrix code generating library with HTML/PNG/mPDF output possibilities.

This is based on TCPDF Datamatrix class. It is provided under LGPL license.

## Installation

```sh
$ composer require jpxd/mpdf-datamatrix-code
```

## Usage

```php
<?php

use Mpdf\DatamatrixCode\Datamatrix;
use Mpdf\DatamatrixCode\Output;

$datamatrixCode = new DatamatrixCode('Lorem ipsum sit dolor');

// Save black on white PNG image 100 px wide to filename.png. Colors are RGB arrays.
$output = new Output\Png();
$data = $output->output($datamatrixCode, 100, [255, 255, 255], [0, 0, 0]);
file_put_contents('filename.png', $data);

// Echo a SVG file, 100 px wide, black on white.
// Colors can be specified in SVG-compatible formats
$output = new Output\Svg();
echo $output->output($datamatrixCode, 100, 'white', 'black');

// Echo an HTML table
$output = new Output\Html();
echo $output->output($datamatrixCode);

// Draw the code on an mPDF object
$mpdf = new \Mpdf\Mpdf();
$output = new Output\Mpdf();
$output->output($datamatrixCode, $mpdf, 20, 40, 10, [255, 255, 255], [0, 0, 0]);
```
