<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Nisn extends Seeder
{
	public function run()
	{
		$data =  [
  		[
        'nisn'       => '098109',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
  		],
  		[
        'nisn'       => '848084',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
  		],
		];
		
		$this->db->table('nisn')->insertBatch($data);
	}
}