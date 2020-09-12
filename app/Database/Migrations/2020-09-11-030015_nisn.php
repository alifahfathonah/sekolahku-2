<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nisn extends Migration
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
		  'nisn' => [
        'type'       => 'char',
        'constraint' => '6'
		  ],
		  'created_at' => [
		    'type' => 'datetime'
		  ],
		  'updated_at' => [
		    'type' => 'datetime'
		  ]
		]);
		
		$this->forge->addKey('id', true);
		$this->forge->createTable('nisn');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('nisn');
	}
}