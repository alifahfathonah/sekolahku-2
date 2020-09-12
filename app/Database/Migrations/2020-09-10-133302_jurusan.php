<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jurusan extends Migration
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
		  'jurusan' => [
        'type'       => 'varchar',
        'constraint' => '120'
		  ],
		  'created_at' => [
		    'type' => 'datetime'
		  ],
		  'updated_at' => [
		    'type' => 'datetime'
		  ]
		]);
		
		$this->forge->addKey('id', true);
		$this->forge->createTable('jurusan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('jurusan');
	}
}