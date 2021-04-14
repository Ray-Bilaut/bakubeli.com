<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_trans_model');
		$this->load->model('transaction_model');
		$this->load->model('rekening_model');
	}

	public function index()
	{

		$trans 	= $this->header_trans_model->listing();

		$data 	= [ 'title'			=> 'Data Transaksi',
					'header'		=>  $trans,
					'isi'			=> 'admin/transaksi/list'
    			  ];
    	$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}

	public function detail($transaction_code)

	{
		$trans_header	= $this->header_trans_model->transaction_code($transaction_code);
		$transaksi		= $this->transaction_model->transaction_code($transaction_code);

	


		$data = array( 'title'		=> 'Detail Transaksi',
						'header'	=>  $trans_header, 
						'trans'		=>  $transaksi,
						'isi'		=> 'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}


	//Cetak Print
	public function cetak($transaction_code)

	{
		$trans_header	= $this->header_trans_model->transaction_code($transaction_code);
		$transaksi		= $this->transaction_model->transaction_code($transaction_code);
		$site 			= $this->model_config->listing();
	


		$data = array( 'title'		=> 'Detail Transaksi',
						'header'	=>  $trans_header, 
						'trans'		=>  $transaksi,
						'site'		=>  $site
						
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);

	}
	//cetak PDF
	public function pdf($transaction_code)

	{
		$trans_header	= $this->header_trans_model->transaction_code($transaction_code);
		$transaksi		= $this->transaction_model->transaction_code($transaction_code);
		$site 			= $this->model_config->listing();
	


		$data = array( 'title'		=> 'Detail Transaksi',
						'header'	=>  $trans_header, 
						'trans'		=>  $transaksi,
						'site'		=>  $site
						
					);
		//$this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html 	= 	$this->load->view('admin/transaksi/cetak', $data, TRUE);
		$mpdf 	= new \Mpdf\Mpdf();
		//Set Header Footer
		$mpdf->SetHTMLHeader('
		<div style="padding: 10px 20px; text-align: left; font-weight: bold; background-color: #f5f5f5;">
		<img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 50px; width: 180;">
		</div>');
		$mpdf->SetHTMLFooter('<div style="padding: 10px 20px; background-color: yellow; color: black; font-size: 12px; font-weight: bold; text-transform: uppercase;">
		'.$site->webname.'
		</div>');
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		//Output Tampil nama baru
		$nama_file_pdf = url_title($site->webname,'dash','true').'-'.$transaction_code.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}

	//cetak PDF
	public function kirim($transaction_code)

	{
		$trans_header	= $this->header_trans_model->transaction_code($transaction_code);
		$transaksi		= $this->transaction_model->transaction_code($transaction_code);
		$site 			= $this->model_config->listing();
	


		$data = array(  'title'		=> 'Detail Transaksi',
						'header'	=>  $trans_header, 
						'trans'		=>  $transaksi,
						'site'		=>  $site
						
					);
		//$this->load->view('admin/transaksi/kirim', $data, FALSE);
		$html 	= $this->load->view('admin/transaksi/kirim', $data, TRUE);
		//load mpdf
		$mpdf 	= new \Mpdf\Mpdf();
		//Set Header Footer
		$mpdf->SetHTMLHeader('
		<div style="padding: 10px 20px; text-align: left; font-weight: bold; background-color: #f5f5f5;">
		<img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 50px; width: 180;">
		</div>');
		$mpdf->SetHTMLFooter('<div style="padding: 10px 20px; background-color: yellow; color: black; font-size: 12px; font-weight: bold; text-transform: uppercase;">
		'.$site->webname.'
		</div>');
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		//Output Tampil nama baru
		$nama_file_pdf = url_title($site->webname,'dash','true').'-'.$transaction_code.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}





}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */