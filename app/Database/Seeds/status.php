<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Status extends Seeder
{
	public function run()
	{
		$data = [
		  [
        'status'     => 'aktif',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		  [
        'status'     => 'tidak aktif',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		  [
        'status'     => 'proses',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ]
		];
		
		$this->db->table('status')->insertBatch($data);
	}
}