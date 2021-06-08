<?php 

namespace App\Models;
use CodeIgniter\Model;
class CategoryModel extends model
{
	
	protected $table="leavecategories";
	protected $primaryKey="leaveID";
	protected  $returnType="array";
	protected $useSoftDeletes=false;
	// protected $DBGroup = 'default_group';

	protected $allowedFields=['category_id', 'category', 'duration', 'pay'];
		                      
public function Add_Category($data)
  {    
 	 
    // $db = \Config\Database::connect();
    $db=db_connect();
    $query= $db->table('leavecategories');
    $query->insert($data);
    return true;
  }
public function category_id_exists($id)
	{   
			 $db=db_connect();
			 $query=$db->query("SELECT * FROM leavecategories WHERE category_id='$id' ");
			 $result=  $query->getRow();
			 if(isset($result))
			 {
			 	return true;
			 }
			 else
			 {
			 	return false;
			 }
	   }
public function category_name_exists($name)
      {
         	 $db= db_connect();
		      	if($db->tableExists("leavecategories"))
		      	{  
				       $query=$db->query("SELECT * FROM leavecategories WHERE category='$name' ");
							 $ResultName =  $query->getRow();
							 if(isset($ResultName))
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

