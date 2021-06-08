<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
	public function up()
	{
		//

		$this->forge->addField([

       'id'   =>[

                    'type'=>'int',
                    'constraint'=>255,
                    'auto-increment'=>true,
                  ],
        'jobId'   =>[

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
                      'null'=>true,
                    ],

         'department'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>200,
                     'null'=>true,
                  ], 
          'date_employed'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>60,
                    ],
          'salary'   =>[
                      
                      'type'=>"FLOAT",
                      'constraint'=>10,2,
                    ],
          'phone_number'   =>[
                      
                      'type'=>"FLOAT",
                      'constraint'=>10,2,
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

		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//

		$this->forge->dropTable('users');
	}
}
