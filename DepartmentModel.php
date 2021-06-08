<?php 

namespace App\Models;
use CodeIgniter\Model;
class DepartmentModel extends model
{
	
	protected $table="departments";
	protected $primaryKey="DEPARTMENTS_id";
	protected  $returnType="array";
	protected $useSoftDelete=true;
	protected $allowedFields=['DEPARTMENTS_id', 'DEPARTMENTs_name', 'DEPARTMENTS_description',];

}