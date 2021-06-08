<?php 
namespace App\Models;
use CodeIgniter\Model;
class ModUsers extends model
{
	
	protected $table="u_table";
	protected $primaryKey="u_id";
	protected  $returnType="array";
	protected $useSoftDeletes=false;
	protected $createdField = 'u_createAt';
    protected $updatedField = 'u_updated';
	protected $allowedFields=['u_id', 'u_name','u_email', 'u_password', 'u_status', 'u_link','u_createAt', 'u_updated'];

}