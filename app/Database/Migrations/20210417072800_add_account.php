<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAccount extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'account_owner'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'label'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 64,
            ],
            'fy_start'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'fy_end'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'currency_symbol'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
            ],
            'date_format'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 16,
            ],
            'status'          => [
                'type'           => 'INT',
                'constraint'     => 1,
                'comment' => '1-active, 2-locked / closed',
                'default' => 1,
            ],
        ]);

        $this->forge->addField('CONSTRAINT FOREIGN KEY (account_owner) REFERENCES wp_users(ID)');

        $this->forge->addKey('id', true);
        $this->forge->createTable('ven_account');
    }

    public function down()
    {
        $this->forge->dropTable('ven_account');
    }
}