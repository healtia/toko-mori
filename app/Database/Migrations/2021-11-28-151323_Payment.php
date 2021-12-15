<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'idpay'          	=> [
					'type'				=> 'INT',
					'constraint'		=> 8,
					'unsigned'			=> true,
					'auto_increment'	=> true,
			],
			'nama' 	            => [
					'type'				=> 'VARCHAR',
					'constraint'		=> '100',
			],
			'jumlah'	        => [
					'type'				=> 'INT',
					'constraint'		=> 100,
			],
			'discount'		    => [
					'type'				=> 'VARCHAR',
					'constraint'		=> '1000',
			],
			'waktu'             => [
				'type'                  => 'DATETIME',
				'null'       	        => true,
			]
	]);
	$this->forge->addKey('idpay', true);
	$this->forge->createTable('payment');

	}

	public function down()
	{
		$this->forge->dropTable('payment');
	}
}
