<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $options = new Options();
    $dompdf = new DOMPDF($options);
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $options->setIsRemoteEnabled(true);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}