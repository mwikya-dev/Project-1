<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Test extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'u_id'=>[
		                'type'           => 'INT',
		                'constraint'     => 15,
		                'auto_increment' => true,
		                 'null'=>false,
		            ],
         'u_name'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>200,
                      'null'=>false,  
                  ],

             'u_email'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>200,
                  ],
             'u_password'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>200,
                      'null'=>false,
                  ],
             'u_link'   =>[
                      
                      'type'=>"VARCHAR",
                      'constraint'=>200,
                      'null'=>false,
                  ],
             'u_status'   =>[
                      
                      'type'=>"INT",
                      'constraint'=>20,
                      'DEFAULT'=>0,
                  ],
            'u_createAt'   =>[
                      
                      'type'=>"DATETIME",
                      'null'=>false,
                  ],
            'u_updated'   =>[
                      
                      'type'=>"DATETIME",
                      'null'=>true,
                  ],
			]);
		$this->forge->addKey('u_id', true);
		$this->forge->createTable('u_table');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('u_table');
	}
}
