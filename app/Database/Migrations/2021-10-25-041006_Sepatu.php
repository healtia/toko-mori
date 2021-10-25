<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sepatu extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          	=> [
					'type'				=> 'INT',
					'constraint'		=> 8,
					'unsigned'			=> true,
					'auto_increment'	=> true,
			],
			'nama_sepatu' 	=> [
					'type'				=> 'VARCHAR',
					'constraint'		=> '100',
			],
			'harga_sepatu'	=> [
					'type'				=> 'INT',
					'constraint'		=> 100,
			],
			'deskripsi'		=> [
					'type'				=> 'VARCHAR',
					'constraint'		=> '1000',
			],
			'gambar_sepatu'	=> [
					'type'				=> 'VARCHAR',
					'constraint'		=> '1000',
			],
			'jenis_sepatu'	=> [
					'type'				=> 'VARCHAR',
					'constraint'		=> '100',
			],
			'merk_sepatu'	=> [
					'type'				=> 'VARCHAR',
					'constraint'		=> '100',
			],
			'tahun_produksi'	=> [
					'type'				=> 'INT',
					'constraint'		=> 5,
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('sepatu');

	}

	public function down()
	{
		$this->forge->dropTable('sepatu');
	}
}
