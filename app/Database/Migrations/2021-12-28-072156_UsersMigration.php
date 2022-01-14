<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'u_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
			],
            'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => 'default',
			],
			
		]);
		$this->forge->addKey('u_id', true);
		$this->forge->createTable('users');

    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
