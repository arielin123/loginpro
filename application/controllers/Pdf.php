<?php

use Dompdf\Dompdf;

Class Pdf extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){		

		$vista = $this->load->view('vistapdf.php', [], true);

		$dompdf = new Dompdf();
		$dompdf->loadHtml($vista);


		$dompdf->render();
		$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
	}
}