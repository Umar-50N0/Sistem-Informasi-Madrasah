<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    
    require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
  

/*// Composer's auto-loading functionality
public function generate($html,$filename){
require "vendor/autoload.php";

//generate some PDFs!
$dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream($filename.'.pdf',array("Attachment"=>0));	
}*/

}
