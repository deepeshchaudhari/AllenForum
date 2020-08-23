<?php


//$fileUrl = '../'.BASEURL.'home/cv/templates/cvTemplate.php';
// reference the Dompdf namespace
require_once "dompdf/autoload.inc.php";
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$html = file_get_contents($fileUrl);
$dompdf->loadHtml('hello world');
//$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

echo "print this page";





?>