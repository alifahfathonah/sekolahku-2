<?php namespace App\Models;

use CodeIgniter\model;

class SiswaModel extends Model
{
  protected $table         = 'siswa';
  protected $allowedFields = ['nama','nisn_id','kelas','jurusan_id','tmp_lahir','no_hp','alamat','status_id'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
	public function getNisnId($nisn_id)
	{
	  return $this->find($nisn_id);
	}
}