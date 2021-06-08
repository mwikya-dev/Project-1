<?php 

namespace App\Models;
use CodeIgniter\Model;
class LeaveModel extends model
{
	
	protected $table="leaves";
	protected $primaryKey="id";
	protected  $returnType="array";
	protected $useSoftDelete=true;
    protected $db; 
	protected $allowedFields=['empID', 'phone', 'email','category', 'days_applied', 'START_date','END_date', 'remarks', 'status'];

  // public function __construct()
  // {
  //   $this->db= db_connect();
  // }
  //   public function get_user()
  //   {
  //       $query= $this->db->query('SELECT * FROM leaves');
  //       return $query->getResult();
  //   }

}