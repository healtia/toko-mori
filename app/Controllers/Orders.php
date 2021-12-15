<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SepatuModel;
use App\Models\UserModel;
use App\Models\OrderModel;

class Orders extends BaseController
{
	protected $sepatuModel;
	protected $userModel;
	protected $orderModel;

	public function __construct()
	{
		$this->sepatuModel = new SepatuModel();
		$this->userModel = new UserModel();
		$this->orderModel = new OrderModel();
	}

	public function vieworder($id)
	{
		$sepatu	= $this->sepatuModel->find($id);
		//$model = new OrderModel();
		$user = new UserModel();
		session();

		$data = [];
		/*
		$dataus = [
			'iduser' => session()->get('iduser'),
			'nama' => $this->request->getPost('nama'),
			'email' => $this->request->getPost('email'),
			'phone' => $this->request->getPost('phone'),
			'alamat' => $this->request->getPost('alamat'),
		];
		*/
		helper(['form']);
		
		/*
		if ($this->request->getMethod() == 'post') {
			//validasi
			$rules = [
				'nama'			=> "required",
				'phone'			=> "required",
				'email'			=> "required",
				'alamat'		=> "required",
				'keterangan'	=> "required",
				'harga'			=> "required",
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				//store
				$model = new OrderModel();

				$newData = [
					'nama' => $this->request->getVar('nama'),
					'phone' => $this->request->getVar('phone'),
					'email' => $this->request->getVar('email'),
					'alamat' => $this->request->getVar('alamat'),
					'keterangan' => $this->request->getVar('keterangan'),
					'harga' => $this->request->getVar('harga'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Order berhasil!');

				return redirect()->to('/daftarsepatu');
			}
		}

		*/
		$data['user'] = $user->where('iduser', session()->get('iduser'))->first();
		$data['dt'] = $sepatu;


		return view('vieworder',$data);
	}

	public function proses()
	{
		session();
		/*
		$data =[];
		$rules=[
			'nama'		=> "required",
			'phone'		=> "required",
			'email'			=> "required",
			'alamat'		=> "required",
			'keterangan'	=> "required",
			'harga'		=> "required"
		];

		if (!$this->validate($rules)) {
			$validation['validation'] = $this->validator;
			return redirect()->back()->withInput()->with('validation', $validation);
		}else{

			*/
			$this->orderModel->insert([
				'nama'			=> $this->request->getVar('nama'),
				'phone'			=> $this->request->getVar('phone'),
				'email'			=> $this->request->getVar('email'),
				'alamat'		=> $this->request->getVar('alamat'),
				'keterangan'	=> $this->request->getVar('keterangan'),
				'harga'			=> $this->request->getVar('harga'),
			]);
			return redirect()->to('/profile')->with('status', 'berhasil creating');
		//}
	}
	
/*
	public function proses(){
		$data = [];
		helper(['form']);
		
		if ($this->request->getMethod() == 'post') {
			//validasi
			$rules = [
				'nama'			=> "required",
				'phone'			=> "required",
				'email'			=> "required",
				'alamat'		=> "required",
				'keterangan'	=> "required",
				'harga'			=> "required",
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				//store
				$model = new OrderModel();

				$newData = [
					'nama' => $this->request->getVar('nama'),
					'phone' => $this->request->getVar('phone'),
					'email' => $this->request->getVar('email'),
					'alamat' => $this->request->getVar('alamat'),
					'keterangan' => $this->request->getVar('keterangan'),
					'harga' => $this->request->getVar('harga'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Registrasi berhasil!');

				return redirect()->to('/daftarsepatu');
			}
		}

		return view('vieworder', $data);

	}
	*/
	public function invoice()
	{
		return view('invoice');
	}

	public function keranjangadmin()
	{
		$data 	= $this->orderModel->findAll();

		return view('keranjangadmin',['data' => $data]);
	}

	public function keranjang($email)
	{
		$request = service('request');
		$searchData = $request->getGet();

		$search = $email;
		if (isset($searchData) && isset($searchData['search'])) {
			$search = $searchData['search'];
		}

		// Get data 
		$users = new OrderModel();

		if ($search == '') {
			$paginateData = $users->paginate(5);
		} else {
			$paginateData = $users->select('*')
				->like('email', $search)			
				->paginate(5);
		}

		$data = [
			'data' => $paginateData,
			'pager' => $users->pager,
			'search' => $search
		];

		return view('keranjang', $data);
	}
}
