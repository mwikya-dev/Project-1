<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departments extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[

             'DEPARTMENTS_id'=> [
             	            'type'=>'INT',
             	            'constraint'=>5,
             	            'auto_increment'=>true,
             	            'unsigned'=>true,

                ],
            'DEPARTMENTs_name'=> [
             	            'type'=>'VARCHAR',
             	            'constraint'=>'150',

                ], 

                'DEPARTMENTS_description'=> [
             	            'type'=>'VARCHAR',
             	            'constraint'=>'255',
             	            'null'=>true, 

                ],
			]);
        $this->forge->addKey('DEPARTMENTS_id', true);
		$this->forge->createTable('Departments');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('Departments');
	}
}
