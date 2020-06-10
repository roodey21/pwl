<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Departemen_model');
	}

	public function index()
	{
		echo 'oke';
	}
	
	public function list_departemen()
	{
		$data_departemen = $this->Departemen_model->get_departemen();

		$konten = '<tr>
				<td>No</td>
				<td>Nama Departemen</td>
				<td>Aksi</td>
				</tr>';

		foreach ($data_departemen->result() as $key => $value) {
			$konten .= '<tr>
						<td>'.$value->id_departemen.'</td>
						<td>'.$value->nama_departemen.'</td>
						<td> Read | Hapus | Edit </td>
						</tr>';
		}

		$data_json = array(
				'konten' => $konten,
		);

		echo json_encode($data_json);
	}
}