<?php namespace App\Models;

use CodeIgniter\model;

class JurusanModel extends Model
{
  protected $table         = 'jurusan';
  protected $allowedFields = ['jurusan'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
	public function getJurusan($jurusan = null)
	{
	  if($jurusan !== null) {
	    $builder = $this->table('jurusan');
	    
	    return $builder->getWhere(['jurusan' => $jurusan])->getRowArray();
	  }
	}
}