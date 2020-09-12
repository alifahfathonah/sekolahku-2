<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
		  'jabatan' => [
        'type'       => 'varchar',
        'constraint' => '60'
		  ],
		  'tmp_lahir' => [
        'type'       => 'varchar',
        'constraint' => '60'
		  ],
		  'tgl_lahir' => [
        'type'       => 'char',
        'constraint' => '10'
		  ],
		  'alamat' => [
        'type'       => 'varchar',
        'constraint' => '120'
		  ],
		  'email' => [
        'type'       => 'varchar',
        'constraint' => '60'
		  ],
		  'no_hp' => [
        'type'       => 'varchar',
        'constraint' => '15'
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
		$this->forge->addForeignKey('status_id','status','id');
		$this->forge->createTable('admin');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('admin');
	}
}