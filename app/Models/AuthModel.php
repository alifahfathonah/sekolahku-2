<?php namespace App\Models;

use CodeIgniter\model;

class AuthModel extends Model
{
  protected $table         = 'users';
  protected $allowedFields = ['nama','username','password','level_id'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
}