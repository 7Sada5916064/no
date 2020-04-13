<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include('My_controller.php');
	//include_once('profile_mpdf/mpdf.php');
	require_once __DIR__ . '/vendor/autoload.php';
	class Export_controller extends My_controller {
		
		
		public function __construct()
		{
			parent::__construct();
			//include_once('../libraries/profile_mpdf/mpdf.php');
			//echo $this->config->item();
		}
		
		public function export_pdf_1()
		{	
			$bil_id = $this->input->post("bil_id");
			$cond = "AND bil_id = $bil_id";
			$this->load->model('Bill_model');
			$data['bm'] = $this->Bill_model->get_bill_order($cond);
			$data['bi'] = $this->Bill_model->get_bill_item($cond);
			// $this->load->view("bill",$data);
			$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
			$fontDirs = $defaultConfig['fontDir'];
			
			$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
			$fontData = $defaultFontConfig['fontdata'];
			
			$mpdf = new \Mpdf\Mpdf([
			'fontDir' => array_merge($fontDirs, [
			__DIR__ . '/tmp',
			]),
			'default_font' => 'Garuda'
			]);
			$html = $this->load->view("bill",$data,true);
			
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			
		}
		
		public function export_pdf_2()
		{	
			$bil_id = $this->input->post("bil_id");
			$cond = "AND bil_id = $bil_id";
			$this->load->model('Bill_model');
			$data['bm'] = $this->Bill_model->get_bill_order($cond);
			$data['bi'] = $this->Bill_model->get_bill_item($cond);
			// $this->load->view("bill",$data);
			$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
			$fontDirs = $defaultConfig['fontDir'];
			
			$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
			$fontData = $defaultFontConfig['fontdata'];
			
			$mpdf = new \Mpdf\Mpdf([
			'fontDir' => array_merge($fontDirs, [
			__DIR__ . '/tmp',
			]),
			'default_font' => 'Garuda'
			]);
			$html = $this->load->view("bill2",$data,true);
			
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			
		}
	}
	
	
	
?>		