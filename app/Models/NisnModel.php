<?php namespace App\Models;

use CodeIgniter\model;

class NisnModel extends Model
{
  protected $table         = 'nisn';
  protected $allowedFields = ['nisn'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
	public function getNisn($nisn = null)
	{
	  if($nisn !== null) {
	    $builder = $this->table('nisn');
	    
	    return $builder->getWhere(['nisn' => $nisn])->getRowArray();
	  }
	}
}