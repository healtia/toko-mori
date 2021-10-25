<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sepatu extends Seeder
{
	public function run()
	{
		$data = [
				'nama_sepatu' 		=> 'test',
				'harga_sepatu'    	=> '1000',
				'deskripsi'		=> 'test'
		];

		// Using Query Builder
		$this->db->table('sepatu')->insert($data);
		}
}