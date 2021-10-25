<?php

namespace App\Controllers;

use \App\Models\SepatuModel;

class Sepatu extends BaseController
{
	protected $sepatuModel;

	public function __construct()
	{
		$this->sepatuModel = new SepatuModel();
	}

	public function index()
	{
		$data 	= $this->sepatuModel->findAll();

		return view('index',['data' => $data]);
	}

	public function indexadmin()
	{
		$data 	= $this->sepatuModel->findAll();

		return view('indexadmin',['data' => $data]);
	}

	public function create()
	{
		session();

		$data = [
			'validation'	 => \Config\Services::validation()
		];
		// $validation 	= \Config\Services::validation();

		return view('tambah-data',$data);
	}

	public function store()
	{
		session();

		if (!$this->validate([
			'nama_sepatu'		=> "required",
			'harga_sepatu'		=> "required",
			'deskripsi'			=> "required",
			'gambar_sepatu'		=> "required",
			'jenis_sepatu'		=> "required",
			'merk_sepatu'		=> "required",
			'tahun_produksi'	=> "required"
		])) {
			$validation 	= \Config\Services::validation();

			return redirect()->to('/tambah-data')->withInput()->with('validation', $validation);
		}

		$this->sepatuModel->insert([
			'nama_sepatu'		=> $this->request->getVar('nama_sepatu'),
			'harga_sepatu'		=> $this->request->getVar('harga_sepatu'),
			'deskripsi'			=> $this->request->getVar('deskripsi'),
			'gambar_sepatu'		=> $this->request->getVar('gambar_sepatu'),
			'jenis_sepatu'		=> $this->request->getVar('jenis_sepatu'),
			'merk_sepatu'		=> $this->request->getVar('merk_sepatu'),
			'tahun_produksi'	=> $this->request->getVar('tahun_produksi'),
		]);

		return redirect()->to('/')->with('status', 'berhasil creating');
	}

	public function update($id)
	{
		session();
		
		$data 	= $this->sepatuModel->find($id);
		$validation 	= \Config\Services::validation();

		return view('update',[
			'data'			=> $data,
			'validation'	=> $validation
		]);
	}

	public function update_proses()
	{
		session();

		if (!$this->validate([
			'nama_sepatu'		=> "required",
			'harga_sepatu'		=> "required",
			'deskripsi'			=> "required",
			'gambar_sepatu'		=> "required",
			'jenis_sepatu'		=> "required",
			'merk_sepatu'		=> "required",
			'tahun_produksi'	=> "required"
		])) {
			$validation 	= \Config\Services::validation();

			return redirect()->back()->withInput()->with('validation', $validation);
		}

		$id 	= $this->request->getVar('id');

		$this->sepatuModel->update($id,[
			'nama_sepatu'		=> $this->request->getVar('nama_sepatu'),
			'harga_sepatu'		=> $this->request->getVar('harga_sepatu'),
			'deskripsi'			=> $this->request->getVar('deskripsi'),
			'gambar_sepatu'		=> $this->request->getVar('gambar_sepatu'),
			'jenis_sepatu'		=> $this->request->getVar('jenis_sepatu'),
			'merk_sepatu'		=> $this->request->getVar('merk_sepatu'),
			'tahun_produksi'	=> $this->request->getVar('tahun_produksi'),
		]);
		
		return redirect()->to('/')->with('status', 'berhasil update');
	}

	public function delete($id)
	{
		$this->sepatuModel->delete($id);

		return redirect()->to('/')->with('status', 'berhasil delete');
	}

	public function look($id)
	{
		$data 	= $this->sepatuModel->find($id);

		return view('post',['dt' => $data]);
	}
}
