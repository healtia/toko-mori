<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'idorder'          => [
				'type'           => 'INT',
				'constraint'     => 8,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'nama'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'phone'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '500',
			],
			'keterangan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'waktu' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'harga'       => [
				'type'           => 'INT',
				'constraint'     => 10,
            ],
		]);
		$this->forge->addPrimaryKey('idorder', true);
		$this->forge->createTable('orders');
	}

	public function down()
	{
		$this->forge->dropTable('orders');
	}
}
