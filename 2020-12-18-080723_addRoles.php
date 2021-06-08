<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoles extends Migration
{
	public function up()
	{

		$this->forge->addField(

			[     

                
                
				'ROLES_id'=> [
                          'type'           => 'INT',
		                'constraint'     => 5,
		                'unsigned'       => true,
		                'auto_increment' => true,
				],
				
				'ROLES_name'=>[
                            'type'=>"VARCHAR",
                           'constraint'=>200,

				 ],

				 'ROLES_salary'=>[
                            'type'=>"INT",
                           'constraint'=>200,

				 ],

				 'ROLES_description'=>[
                            'type'=>"VARCHAR",
                           'constraint'=>200,

				 ],

				  'created_at'   =>[
                      
                      'type'=>"DATETIME",
         ],
         'updated_at'   =>[
                      
                      'type'=>"DATETIME",
                  
         ],
         'deleted_at'   =>[
                      
                      'type'=>"DATE",

         ],
			]);
        	$this->forge->addKey('ROLES_id', true);
		$this->forge->createTable("roles");
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//

		$this->forge->dropTable("roles");
	}
}
