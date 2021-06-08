<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRegister extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
		                'type'           => 'INT',
		                'constraint'     => 255,
		                'unsigned'       => true,
		                'auto_increment' => true,
		            ],
         'First_Name'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>60,
                      'null'=>false,
                  
                    ],
            'Second_Name'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>60,
                      'null'=>false,
                  
                    ],
        'emp_ID'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>200,
                    'auto-increment'=>false,
                  ],
        'email'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>200,
                    ],
          'role'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>60,
                      'null'=>false,
                  
                    ],
          'telephone'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>60,
                      'null'=>false,
                  
                    ],
          'DOB'   =>[
                      
                      'type'=>"DATE",
                      'null'=>false,
                  
                    ],
           'Date_Joined'   =>[
                      
                      'type'=>"DATE",
                      'null'=>false,
                  
                    ],
        'Address'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>60,
                      'null'=>false,
                  
                    ],


         'password'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>200,
                    ],
          'created_at'=> [
                'type'=>'DATETIME',
         ],
         'updated_at'=> [
                'type'=>'DATETIME',
         ],
        'deleted_at'=> [
                'type'=>'DATETIME',
         ],
			]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('registeredUsers');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('registeredUsers');
	}
}
