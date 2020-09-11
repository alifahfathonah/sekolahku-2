<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Jurusan extends Seeder
{
	public function run()
	{
		$data = [
		  [
        'jurusan'    => 'rekayasa perangkat lunak',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		  [
        'jurusan'    => 'teknik komputer dan jaringan',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		  [
        'jurusan'    => 'teknik kendaraan ringan',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		  [
        'jurusan'    => 'desain pemodelan',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		];
		
		$this->db->table('jurusan')->insertBatch($data);
	}
}