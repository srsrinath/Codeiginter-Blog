<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'p_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
			],
            'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
			],
			'content' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'u_id' => [
				'type' => 'INT',
				'constraint' => 20,
			],
            'c_id' => [
				'type' => 'INT',
				'constraint' => 20,
			],
            'image' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
		]);
		$this->forge->addKey('p_id', true);
		$this->forge->createTable('posts');

    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
