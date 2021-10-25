<?php

namespace App\Models;

use CodeIgniter\Model;

class SepatuModel extends Model
{
	protected $table      = 'sepatu';

    protected $allowedFields = ['nama_sepatu', 'harga_sepatu','deskripsi'];
}
