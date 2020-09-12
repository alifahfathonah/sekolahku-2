<?php namespace App\Models;

use CodeIgniter\model;

class UsersModel extends Model
{
  protected $table         = 'users';
  protected $allowedFields = ['nama','username','password','status_id','level_id'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
}