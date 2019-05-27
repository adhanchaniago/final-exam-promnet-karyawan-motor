<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Motor extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API="https://api.akhmad.id/uaspromnet/";
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
    $this->curl->http_header("X-Nim", "1703204");
    $data['user'] = json_decode($this->curl->simple_get($this->API.'/user'))->data;

    $this->load->view('template/header');
    $this->load->view('home', $data);
    $this->load->view('template/footer');

	}

  public function List(){

    $this->curl->http_header("X-Nim", "1703204");
    $data['motor'] = json_decode($this->curl->simple_get($this->API.'/motor'))->data;

    $this->curl->http_header("X-Nim", "1703204");
    $data['cicilan'] = json_decode($this->curl->simple_get($this->API.'/cicil'))->data;

    $this->curl->http_header("X-Nim", "1703204");
    $data['dp'] = json_decode($this->curl->simple_get($this->API.'/uangmuka'))->data;

    $this->curl->http_header("X-Nim", "1703204");
    $data['sales'] = json_decode($this->curl->simple_get($this->API.'/penjualan'))->data;

    $this->load->view('template/header');
    $this->load->view('V_list', $data);
    $this->load->view('template/footer');


  }

  public function Penjualan(){

		$this->curl->http_header("X-Nim", "1703204");
		$data['motor'] = json_decode($this->curl->simple_get($this->API.'/motor'))->data;

		$this->curl->http_header("X-Nim", "1703204");
		$data['cicilan'] = json_decode($this->curl->simple_get($this->API.'/cicil'))->data;

		$this->curl->http_header("X-Nim", "1703204");
		$data['dp'] = json_decode($this->curl->simple_get($this->API.'/uangmuka'))->data;

    $this->curl->http_header("X-Nim", "1703204");
    $data['penjualan'] = json_decode($this->curl->simple_get($this->API.'/penjualan'))->data->terjual;

    $this->load->view('template/header');
    $this->load->view('V_penjualan', $data);
    $this->load->view('template/footer');
  }

	function add(){
		$this->curl->http_header("X-Nim", "1703204");
		$data = array(
			'id_cicil'      =>  $this->input->post('id_cicil'),
			'id_uang_muka'    =>  $this->input->post('id_uang_muka'),
			'id_motor'	  =>  $this->input->post('id_motor'),
			'cicilan_pokok' => $this->input->post('cicilan_pokok'),
			'cicilan_bunga' => $this->input->post('cicilan_bunga'),
			'cicilan_total'=> $this->input->post('cicilan_total')
		);
		$insert =  $this->curl->simple_post($this->API.'/penjualan', $data, array(CURLOPT_BUFFERSIZE => 0));

		if($insert)
		{
			$this->session->set_flashdata('hasil','Insert Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Insert Data Gagal');
		}

		redirect('C_Motor/Penjualan');

	}

	function delete($id){
		if(empty($id)){

			redirect('C_Motor');
		}else{
			$this->curl->http_header("X-Nim", "1703204");
			$delete =  $this->curl->simple_delete($this->API.'/penjualan/'.$id, array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
			if($delete)
			{
				$this->session->set_flashdata('hasil','Delete Data Berhasil');
			}else
			{
				$this->session->set_flashdata('hasil','Delete Data Gagal');
			}

			redirect('C_Motor/Penjualan');
		}
	}

	function update($id){
		$this->curl->http_header("X-Nim", "1703204");
		$data = array(
			'id_cicil'      =>  $this->input->post('id_cicil'),
			'id_uang_muka'    =>  $this->input->post('id_uang_muka'),
			'id_motor'	  =>  $this->input->post('id_motor'),
			'cicilan_pokok' => $this->input->post('cicilan_pokok'),
			'cicilan_bunga' => $this->input->post('cicilan_bunga'),
			'cicilan_total'=> $this->input->post('cicilan_total')
		);
		$update =  $this->curl->simple_put($this->API.'/penjualan/'.$id, $data, array(CURLOPT_BUFFERSIZE => 0));

		if($update)
		{
			$this->session->set_flashdata('hasil','Update Data Berhasil');
		}else
		{
			$this->session->set_flashdata('hasil','Update Data Gagal');
		}

		redirect('C_Motor/Penjualan');

	}



	// proses untuk menambah data
	// insert data kontak

}
