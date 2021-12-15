<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	//protected $DBGroup              = 'default';
	protected $table                = 'users';
	//protected $primaryKey           = 'id';
	//protected $useAutoIncrement     = true;
	//protected $insertID             = 0;
	//protected $returnType           = 'array';
	//protected $useSoftDelete        = false;
	//protected $protectFields        = true;
	protected $allowedFields        = ['nama', 'password', 'email', 'phone', 'alamat', 'created_at', 'updated_at'];
	protected $beforeInsert			= ['beforeInsert'];
	protected $beforeUpdate			= ['beforeUpdate'];

	// Dates
	protected $useTimestamps        = true;
	//protected $dateFormat           = 'datetime';
	//protected $createdField         = 'created_at';
	//protected $updatedField         = 'updated_at';
	//protected $deletedField         = 'deleted_at';

	protected function beforeInsert(array $data){
		$data = $this->passwordHash($data);

		return $data;
	}
	
	protected function beforeUpdate(array $data){
		$data = $this->passwordHash($data);

		return $data;
	}

	protected function passwordHash(array $data){
		if(isset($data['data']['password']))
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		
		return $data;
	}
}
