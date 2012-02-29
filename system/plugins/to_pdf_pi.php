<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');


	function pdf_showest($html, $filename) 
	{
	require_once("dompdf/dompdf_config.inc.php");
	
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	 
	$dompdf->stream($filename.".pdf",array("Attachment" => 0));
	}

	function pdf_createest($html, $filename) 
	{
		require_once("dompdf/dompdf_config.inc.php");
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$pdf = $dompdf->output();
		$fpath = "pdf/".$filename.".pdf";
		file_put_contents($fpath, $pdf);
	}
	
?>