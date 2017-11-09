<?php

class Crude extends CI_Controller{

	function __contruct()
	{
		parent:: __contruct();
		$this->load->model('ServicesModel');
		$this->load->helper('helpers/index');

	}

	function index()
	{
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}

	function tambah()
	{
		$this->load->view('admin/v_input');
	}

	function tambah_aksi()
	{
		$ID = $this->input->post('ID');
		$PROCESSOR = $this->post('PROCESSOR');
		$RAM = $this->post('RAM');
		$HARDDISK = $this->post('HARDDISK');
		$GRAPHICS_CARD = $this->post('GRAPHICS_CARD');
		$MONITOR = $this->post('MONITOR');
		$status = $this->post('status');

		$data = array
		(
			'ID' => $ID,
			'PROCESSOR' => $PROCESSOR,
			'RAM' => $RAM,
			'HARDDISK' => $HARDDISK,
			'GRAPHICS_CARD' => $GRAPHICS_CARD,
			'MONITOR' => $MONITOR,
			'status' => $status,
		);

		$this->ServicesModel->input_data($data, 'user');
		rediriect('crud/index');

	}

}


?>