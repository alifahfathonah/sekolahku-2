<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
		  'id' => [
        'type'           => 'int',
        'unsigned'       => true,
        'auto_increment' => true
		  ],
		  'username' => [
        'type'       => 'varchar',
        'constraint' => '120'
		  ],
		  'password' => [
        'type'       => 'varchar',
        'constraint' => '255'
		  ],
		  'status_id' => [
		    'type' => 'int'
		  ],
		  'level_id' => [
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
		$this->forge->addForeignKey('status_id','status','id');
		$this->forge->addForeignKey('level_id','level','id');
		$this->db->enableForeignkeyChecks();
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
