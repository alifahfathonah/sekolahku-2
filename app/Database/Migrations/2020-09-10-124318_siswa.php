<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
	public function up()
	{
	  $this->db->enableForeignkeyChecks();
	  
		$this->forge->addField([
		  'id' => [
        'type'           => 'int',
        'unsigned'       => true,
        'auto_increment' => true
		  ],
		  'nama' => [
        'type'       => 'varchar',
        'constraint' => '120'
		  ],
		  'nisn_id' => [
        'type'       => 'int'
		  ],
		  'kelas' => [
        'type'       => 'varchar',
        'constraint' => '3'
		  ],
		  'jurusan_id' => [
		    'type' => 'int'
		  ],
		  'tmp_lahir' => [
        'type'       => 'varchar',
        'constraint' => '60'
		  ],
		  'tgl_lahir' => [
        'type'       => 'char',
        'constraint' => '10'
		  ],
		  'no_hp' => [
        'type'       => 'varchar',
        'constraint' => '15'
		  ],
		  'alamat' => [
        'type'       => 'varchar',
        'constraint' => '120'
		  ],
		  'status_id' => [
		    'type' => 'int'
		  ],
		  'created_at' => [
		    'type' => 'datetime'
		  ],
		  'updated_at' => [
		    'type' => 'datetime'
		  ]
		]);
		
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('nisn_id','nisn','id');
		$this->forge->addForeignKey('jurusan_id','jurusan','id');
		$this->forge->addForeignKey('status_id','status','id');
		$this->forge->createTable('siswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('siswa');
	}
}