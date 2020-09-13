<?php namespace App\Models;

use CodeIgniter\model;

class UsersModel extends Model
{
  protected $table         = 'users';
  protected $allowedFields = ['username','password','status_id','level_id'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
	public function getUsername($username = null)
	{
	  if($username !== null)
	  {
	    return $this->getWhere(['username' => $username])->getRowArray();
	  }
	}
}