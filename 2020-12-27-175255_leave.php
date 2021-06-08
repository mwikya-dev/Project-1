<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
class Leave extends Migration
{
	public function up()
	{
		$this->forge->addField([
       
       'id'   =>[

                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
                    
                  ],
         'empID'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>'200',
                    'auto-increment'=>false,
                    
                  ],
           'phone'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>'200',
                    'auto-increment'=>false,
                    
                  ],
           'email'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>'200',
                    'null'=>false,
                  ],
         'category'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>'200',
                    'null'=>false,
                  ],

         'days_applied'   =>[
                      
                      'type'=>"INT",
                      'constraint'=>60,
                    ],
         'START_date'   =>[
                      
                      'type'=>'DATETIME',
                   
                    ],

         'END_date'   =>[
                      
                      'type'=>'DATETIME',
                     
                    ],

        'status'   =>[
                      
                      'type'=>'ENUM',
                      'constraint'=>['Pending', 'Rejected', 'Accepted'],
                      'default'=>'Pending',
                    ],
        'remarks'   =>[

                    'type'=>'VARCHAR',
                    'constraint'=>'200',
                    'null'=>true,
                  ],

       
		]);
   $this->forge->addKey('id', true);
		$this->forge->createTable('leaves');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable("leaves");

	}
}
