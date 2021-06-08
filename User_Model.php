<?php 

namespace App\Models;
use CodeIgniter\Model;
class User_Model extends model
{
	
	protected $table="users";
	protected $primaryKey="user_id";
	protected  $returnType="array";
	protected $useSoftDeletes=true;
	protected $allowedFields=['name', 'role', 'email', 'password', 'user_id', 'email', 'role', 'department', 'date_employed','salary', 'phone_number', 'password'];
	protected $useTimeStamps=false;
	protected $beforeInsert=['beforeInsert'];
	// protected $beforeUpdate=['beforeUpdate'];

	protected function beforeInsert(array $data)
	{
        
	$data= $this->passwordHash($data);
	return $data;
	}
	protected function passwordHash(array $data)
	{
		 if(isset($data['data']['password']))
     	{
             $data['data']['password']= password_hash($data['data']['password'], PASSWORD_DEFAULT);
     		 return $data;
     	}
	}

}
?>