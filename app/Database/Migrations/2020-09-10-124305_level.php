<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
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
		  'level' => [
        'type'       => 'varchar',
        'constraint' => '60'
		  ],
		  'created_at' => [
		    'type' => 'datetime'
		  ],
		  'updated_at' => [
		    'type' => 'datetime'
		  ]
		]);
		
		$this->forge->addKey('id', true);
		$this->forge->createTable('level');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('level');
	}
}
