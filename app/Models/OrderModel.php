<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
	protected $table                = 'orders';
	protected $allowedFields        = ['nama', 'phone', 'email', 'alamat', 'keterangan', 'created_at', 'updated_at', 'harga'];

	// Dates
	protected $useTimestamps        = true;

}
