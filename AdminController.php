<?php  
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\DepartmentModel;
use App\Models\roleMode;

class AdminController extends BaseController
{  

    function __construct()
    {
       $this->CategoryModel = model('CategoryModel');
       helper(['form']);
       helper(['array']);	
    }
	public function admin()
	{
        $department= new DepartmentModel();
		$data['departments']=$department->findAll();
		$role= new roleMode();
		$data['roles']= $role->findAll();

	    // return view('Administrator/admin', $data);
	     return view('Administrator/dashboard', $data);
	}
	public function add_User()
	{  
		$customRules=[
				  	'userID'=>[
                               'rules'=>'required|is_unique[users.user_id]',
                               'label'=>'user ID',
                               'errors'=>[
                                          'required'=>'Please Enter User ID',
                                          'is_unique'=>'ID already exist! Enter Unique ID',
                                         ]
				  	          ],
				  	'email'=> [
				  	           'rules'=>'required|valid_email|is_unique[users.email]',
				  	           'label'=>"Email Address",
				  	           'errors'=>[
                                         'required'=>'Hey! email field is required*',
                                         'is_unique'=>'email value must be unique',
                                         'valid_email'=>'Enter a valid email address',

				  	                     ]
				  	          ],
				  	'salary'=>[
                                'rules'=>'required',
                                'label'=>'Salary',
                                'errors'=>[
                                           'required'=>'Salary Field is required*',
                                          ]
				  	           ],
				    'department'=>'required',
				  	'role'   =>'required',
		     		'password'=>[
		     			          'rules'=>'required|min_length[4]',
		     			          'label'=>'Password',
		     			          'errors'=> [
		     			          	          'required'=>'password is required*',
		     			          	          'min_length[4]'=>'password must be atleast 4 characters',
		     			                     ]
		     		            ],
		     		'phone'=>'required',
		     		'empDate'=>[
		     		     'rules'=>'required|date_check',
                         'label'=>'date',
                         'errors'=>[
                         	         'required'=>'Enter date of employment*',
                         	         'date_check'=>'Date must be less than todays date'
                                   ]
		     		    ]
		     	    ];
               if($this->validate($customRules)) { 
               	$data= [
                      'user_id'=> $this->request->getVar('userID'),
                      'email'=>$this->request->getVar('email'),
                      'role'=>$this->request->getVar('role'),
                      'department'=>$this->request->getVar('department'),
                      'date_employed'=>$this->request->getVar('empDate'),
                      'salary'=>$this->request->getVar('salary'),
                      'password'=>$this->request->getVar('password'),
                      'phone_number'=>$this->request->getVar('phone'), 
                       ];
                    $model= model("UserModel");
     		        $result['']=$model->insert($data);
		            $result['message']= 'User Added Successfully';
		          	return json_encode($result);
               }
               else {
	     			$validation= \Config\Services::validation();
			        $result['errors']= $validation->getErrors();
			        return json_encode($result);   
	     		}	
	}
public function add_leave_Category()
   {
   	      if($this->request->getMethod() == 'post') {   
   	      	   $rules=[
					  	'leavename'=>'required',
					  	'leaveID'=>'required',
					  	'leaveDuration'=>'required',
					  	'payment'=>'required',  ];
				if($this->validate($rules)) {
					  $data=[];
					  $data['category_id']= $this->request->getVar('leaveID');
					  $data['category']=$this->request->getVar('leavename');
					  $data['days_entitled']=$this->request->getVar('leaveDuration');
					  $data['pay']     =$this->request->getVar('payment');
                       if(!$this->CategoryModel->category_id_exists($data['category_id']) && !$this->CategoryModel->category_name_exists($data['category']))
                          {
                          	   $result= $this->CategoryModel->Add_Category($data);
							   $session=session();
							   $response['message']='Category created Successfully!';
							  return  json_encode($response);
                          }
                      else{
                           	 
                          	 $response['message']="Leave Category name or ID Already exists";
                              return json_encode($response);
                          }
                         
				}
				else {
					     $validation= \Config\Services::validation();
		                 $response['data_errors']= $validation->getErrors();
		                 $response['error']='Data has Errors!';
		                 return json_encode($response);
				}
   	      }           
	}
public function addRoles()
   {   
   	    $rules=[
				'rolename'=>'required|is_unique[roles.ROLES_name]',
				'renumeration'=>'required',
			    'description'=>'required',  ];
   	if(!$this->validate($rules))
   	{
         $validation= \Config\Services::validation();
		 $response['role_errors']= $validation->getErrors();
		 echo json_encode($response);
   	}
   	else
   	{
   		$data['ROLES_name']=$this->request->getVar('rolename');
	    $data['ROLES_salary']=$this->request->getVar('renumeration');
	    $data['ROLES_description']=$this->request->getVar('description');

            $role= model('roleMode');
            $role->insert($data);
		    $session=session();
		    $response['message']='User Role Added Successfully!';
		    return  json_encode($response);
   	}
}
 public function add_department()
   {
     $departmentRules=[
					'departID'=>'required|is_unique[departments.DEPARTMENTS_id]',
				    'departName'=>'required',
				    'description'=>'required', ];

				  if (!$this->validate($departmentRules))  {
				  	     $validator= \Config\Services::validation();
		                 $response['department_errors']= $validator->getErrors();
		                 return json_encode($response);
				  } 
				  else {
				  	   $department= [
				                     
				           'DEPARTMENTS_id'=> $this->request->getVar('departID'),
				           'DEPARTMENTs_name'=>$this->request->getVar('departName'),
				           'DEPARTMENTS_description'=>$this->request->getVar('description'),];
		                    $newDepartment= new DepartmentModel();
							$newDepartment->insert($department); 
		                    return  json_encode($newDepartment);  
				    }
		
   } 
   public function admin_update()
   {
	   	    $ids = $this->request->getVar('ids');
	        $statuses= $this->request->getVar('statuses');
            foreach ($ids as $key => $id) 
            {   
               $status = $statuses[$key]; 
               if($status!='')
               {
	            $data=['LEAVE_status'=>$status];

	            // var_dump($id);
	            // var_dump($status);
	            // die();
	            $model= model('LeaveModel');
	            $model->update($id, $data);
		        $message['message']="status changed";
		        echo  json_encode($message);
		       }
		      
            }        
    } 

}
