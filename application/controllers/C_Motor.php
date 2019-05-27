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
    $data['penjualan'] = json_decode($this->curl->simple_get($this->API.'/penjualan'))->data->terjual;

    $this->load->view('template/header');
    $this->load->view('V_penjualan', $data);
    $this->load->view('template/footer');
  }

	// proses untuk menambah data
	// insert data kontak

}
