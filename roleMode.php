<?php 

namespace App\Models;
use CodeIgniter\Model;
class roleMode extends model
{
	
	protected $table="roles";
	protected $primaryKey="ROLES_id";
	protected  $returnType="array";
	protected $useSoftDeletes=true;
	protected $allowedFields=['ROLES_name', 'ROLES_salary', 'ROLES_description',];

}