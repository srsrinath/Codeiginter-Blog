<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'c_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
			],			
		]);
		$this->forge->addKey('c_id', true);
		$this->forge->createTable('categories');

    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
