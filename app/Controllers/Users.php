<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
	public function login()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//validasi
			$rules = [
				'password' 	=> 'required|min_length[3]|max_length[100]|validateUser[email,password]',
				'email' 	=> 'required|min_length[6]|max_length[100]|valid_email',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email atau password salah'
				]
			];

			if(!$this->validate($rules, $errors)){
				$data['validation'] = $this->validator;
			}else{
				//store
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
							  ->first();

				$this->setUserSession($user);

				return redirect()->to('Sepatu');
				
			}
		}

		return view('login', $data);
	}

	private function setUserSession($user){
		$data = [
			'iduser' => $user['iduser'],
			'nama' => $user['nama'],
			'email' => $user['email'],
			'phone' => $user['phone'],
			'alamat' => $user['alamat'],
			'status' => $user['status'],
		];
		if($data['status']=='Y'){
			$data['isSuperLoggedIn'] = true;
			$data['isLoggedIn'] = true;
		}else{
			$data['isLoggedIn'] = true;
		}

		session()->set($data);
		return true;
	}

	public function register()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//validasi
			$rules = [
				'nama' 				=> 'required|min_length[3]|max_length[100]',
				'password' 			=> 'required|min_length[3]|max_length[100]',
				'password_confirm' 	=> 'matches[password]',
				'email' 			=> 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
				'phone' 			=> 'required|min_length[3]|max_length[15]',
				'alamat' 			=> 'required|min_length[3]|max_length[500]',
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				//store
				$model = new UserModel();

				$newData = [
					'nama' => $this->request->getVar('nama'),
					'password' => $this->request->getVar('password'),
					'email' => $this->request->getVar('email'),
					'phone' => $this->request->getVar('phone'),
					'alamat' => $this->request->getVar('alamat'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Registrasi berhasil!');

				return redirect()->to('/login');
			}
		}

		return view('register', $data);
	}

	public function profile(){
		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//validasi
			$rules = [
				'nama' 				=> 'required|min_length[3]|max_length[100]',
				'phone' 			=> 'required|min_length[3]|max_length[15]',
				'alamat' 			=> 'required|min_length[3]|max_length[500]',
			];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[3]|max_length[100]';
				$rules['password_confirm'] = 'matches[password]';
			}

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				//store
				$model = new UserModel();

				$newData = [
					'iduser' => session()->get('iduser'),
					'nama' => $this->request->getPost('nama'),
					'phone' => $this->request->getPost('phone'),
					'alamat' => $this->request->getPost('alamat'),
				];
				if($this->request->getPost('password') != ''){
					$newData['password'] = $this->request->getPost('password');
				}
				$model->save($newData);
				session()->setFlashdata('success', 'Update berhasil!');

				return redirect()->to('/profile');
			}
		}

		$data['user'] = $model->where('iduser', session()->get('iduser'))->first();

		return view('profile', $data);
	}

	public function updateprofile(){
		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//validasi
			$rules = [
				'nama' 				=> 'required|min_length[3]|max_length[100]',
				'phone' 			=> 'required|min_length[3]|max_length[15]',
				'alamat' 			=> 'required|min_length[3]|max_length[500]',
			];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[3]|max_length[100]';
				$rules['password_confirm'] = 'matches[password]';
			}

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				//store
				$model = new UserModel();

				$newData = [
					'iduser' => session()->get('iduser'),
					'nama' => $this->request->getPost('nama'),
					'phone' => $this->request->getPost('phone'),
					'alamat' => $this->request->getPost('alamat'),
				];
				if($this->request->getPost('password') != ''){
					$newData['password'] = $this->request->getPost('password');
				}
				$model->save($newData);
				session()->setFlashdata('success', 'Update berhasil!');

				return redirect()->to('/profile');
			}
		}

		$data['user'] = $model->where('iduser', session()->get('iduser'))->first();

		return view('profile-update', $data);
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/login');
	}
}
