<?php
require './vendor/autoload.php';

use Spipu\Html2Pdf\html2pdf;

//recoge el contenido de otro fichero

ob_start();
require_once 'vistapdf1.php';
$html= ob_get_clean();

$html2pdf = new Html2Pdf('p','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('pdf_generado.pdf');

?>