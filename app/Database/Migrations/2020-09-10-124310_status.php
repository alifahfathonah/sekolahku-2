<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
	public function up()
	{
		$this->forge->addField([
		  'id' => [
        'type'           => 'int',
        'unsigned'       => true,
        'auto_increment' => true
		  ],
		  'status' => [
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
		$this->db->enableForeignkeyChecks();
		$this->forge->createTable('status');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('status');
	}
}