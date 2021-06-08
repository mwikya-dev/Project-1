<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LeaveCategories extends Migration
{
	public function up()
	{
		$this->forge->addField(
		[

	          'id'=>[
				             'type'=>'INT',
				             'constraint'=>255 ,
				             'unsigned'       => true,
		                     'auto_increment' => true,
				            
	           ],
	           'category_id'=>[
					             'type'=>'VARCHAR',
					             'constraint'=>'255',
					             'null'=>false,
	           ],
	           

	           'category'=>[
					             'type'=>'VARCHAR',
					             'constraint'=>'100' ,
	           ],
	           
	           'days_entitled'=>[
				             'type'=>'VARCHAR',
				             'constraint'=>'200' 
	           ],

	           'pay'=>[
				             'type'=>'float',
				             'constraint'=>14,2,
	           ],
	           'Description'=>[
				             'type'=>'VARCHAR',
				             'constraint'=>255,
				             'null'=>true
	           ],

	        
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('LeaveCategories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('LeaveCategories');
	}
}
