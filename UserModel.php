<?php 

namespace App\Models;
use CodeIgniter\Model;
class UserModel extends model
{
	
	protected $table="registeredUsers";
	protected $primaryKey="id";
	protected $useSoftDelete=true;
	protected $useTimestamps = true;
	protected $beforeInsert=['beforeInsert'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
	protected $allowedFields=['First_Name','Second_Name', 'emp_ID', 'role',
	'email', 'password', 'telephone', 'Address', 'Date_Joined', 'DOB', ];
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
	
	public function id_exists($id)
	{
			 $db=db_connect();
			 $query=$db->query("SELECT * FROM registeredusers WHERE emp_ID='$id' ");
			 $rowId=  $query->getRow();
			 if(isset($rowId))
			 {
			 	return true;
			 }
			 else
			 {
			 	return false;
			 }

	}
    public function email_exists($email)
    {     	 $db=db_connect();
         if($db->tableExists("registeredusers"))
		      	{  
				       $query=$db->query("SELECT * FROM registeredusers WHERE email='$email' ");
							 $emailRow =  $query->getRow();
							 if(isset($emailRow))
							 {
							 	return true;
							 }
							 else
							 {
							 	return false;
							 }
      	  }  
    }

}