<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'iduser'          => [
				'type'           => 'INT',
				'constraint'     => 8,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'nama'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'phone'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '500',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'status'       => [
				'type'           => 'INT',
				'constraint'     => 4,
            ],
		]);
		$this->forge->addPrimaryKey('iduser', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
