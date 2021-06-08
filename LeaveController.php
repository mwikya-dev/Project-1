<?php  
namespace App\Controllers;
use App\Models\User_Model; 
use App\Models\UserModel; 
use App\Models\LeaveModel; 
use App\Models\CategoryModel;
class LeaveController extends BaseController
{    
function __construct()
{
		$this->leave_category = model('CategoryModel');
		$this->leave_model = model('LeaveModel');
		$this->model_user=model('UserModel');
		$this->db = \Config\Database::connect();
		helper(['form']);
		helper(['text']);
		helper(['url']);
		helper(['number']);
}
public function adminView()
{
		return view('admin/admin');
}
public function register()
{
		return view('admin/login');
}
public function fetch_leaves()
	{   

	    $model= new LeaveModel();
	    $data= $model->findAll();
	    echo json_encode($data);
	  
	}
public function requests()//fetch all employee leave days
		{   
				$db= \Config\Database::connect();
				$query = $db->query("SELECT * FROM leaves");
				$res= $query->getResult('array');
				return $res;
		}
public function add_leave()
		{
			return view('admin/add-leave');
		}

public function edit_leave($id)
	{    
			$model1= new CategoryModel();
			$data['categories']= $model1->findAll();
	    $model= new LeaveModel();
	    $data['user_data']=$model->where('id', $id)->first();
		 return view('admin/edit-leave', $data);
	}
public function update($id)
  { 

	      $model=new LeaveModel();
	      $id=$this->request->getVar('id');
	      $data['USERS_email']= $this->request->getPost('email');    
	      $data['DAYS_taken'] =$this->request->getPost('daysTaken');
	      $data['START_date'] =$this->request->getPost('startDate');
	      $data['END_date'] =$this->request->getPost('endDate');
	      $model->update($id, $data);

	return redirect()->to(base_url('/leave'))->with('success', 'Record Updated successfully');

  }
public function change_status()
  {   
        $model=new LeaveModel();
			  $id=$this->request->getPost('userid');
			  $status=$this->request->getPost('status');
			  if($status==1) {
			  	$st='Accepted';
			  }
			  elseif($status==2) {
			  	$st='Rejected';
			  }
			  else{
			  	$st='Pending';
			  }

			  $data['status']= $st;    
			  $res=$model->update($id, $data);

			  if($res) {
			  	$re['code']=1;
			  	$re['message']='Updated successfully';
			  	echo json_encode($re);
			  }
  }
public function delete($id)
{
	    $model=new LeaveModel();
      $model->where('id', $id)->delete();
      // $message['code']=1;
      //  return json_encode($message);
      return redirect()->to(base_url('/leave'))->with('message', 'User deleted sucessfully');
}
public function balance_view()
{
	return view('admin/leave-balance');
}  
protected function ids()
{
	    $mode1= new LeaveModel();
		  $results= $mode1->findAll();
		  $ids=array();
		  foreach($results as $result)
		  {  
		  	 array_push($ids,$result['empID']);
		  } 
		  return $ids;
}
public function leave_days_balance()
{  
	 $final_result= array();
   $query=  $this->db->table('registeredusers')
	         ->select(['id', 'email', 'role', 'emp_ID'])
	         ->orderBy('id', 'ASC')
	         ->get();
				  foreach($query->getResult('array') as $row){
				  	 $query1= $this->db->table('leaves')
				  	            ->select('SUM(leaves.days_applied) as PrivilegeCount ')
				  	            ->where('category', 'Privilege')
				  	            ->where('empID', $row['emp_ID'])
			                  ->get();
			                  $prividgeDays=$query1->getResult('array');

			        $query2= $this->db->table('leaves')
			                 ->select('SUM(leaves.days_applied) as SickCount')
				  	           ->where('category', 'Sick')
				  	           ->where('empID', $row['emp_ID'])
			                 ->get();
			                 $sickDays= $query2->getResult('array');

			        $query3= $this->db->table('leaves')
			                 ->select('SUM(leaves.days_applied) as CasualCount')
				  	           ->where('category', 'Casual')
				  	           ->where('empID', $row['emp_ID'])
			                 ->get();
			                 $casualDays= $query3->getResult('array');

			       $query4= $this->db->table('leaves')
			                 ->select('SUM(leaves.days_applied) as MaternityCount')
				  	           ->where('category', 'Maternity')
				  	           ->where('empID', $row['emp_ID'])
			                 ->get();
			                 $MaternityDays= $query4->getResult('array');
			        $query5= $this->db->table('leaves')
			                 ->select('SUM(leaves.days_applied) as PaternityCount')
				  	           ->where('category', 'Paternity')
				  	           ->where('empID', $row['emp_ID'])
			                 ->get();
			                 $PaternityDays= $query5->getResult('array');

			                 $temp_array= array_merge($row, $prividgeDays[0], 
			                 $sickDays[0], $casualDays[0], $MaternityDays[0], $PaternityDays[0]);
			       array_push($final_result, $temp_array);
	  }
	  echo json_encode($final_result);
}
public function leave_type()
	{  

	  	$model1= new CategoryModel();
	  	$data['categories']= $model1->findAll();
		 return view('admin/leave-type', $data);
	}
public function user_profile()
	{
		 return view('profile');
	}
public function dashboard()
	{

		return view('admin/add-leave');
	}
public function user_address()
	{
	    return view('user_address');
	}
	public function employee_view()
	 {
	 	 return view('admin/all-employees');
	 }
	public function all_employees()
	{
   
		$model= new UserModel();
		$employees= $model->findAll();

		$output ='';
	
		foreach($employees as $record)
		{  

				$del= base_url('/employee/delete/'.$record['id']);
		    $edit= base_url('/employee/edit/'.$record['id']);
			  $output .='<tr>';
			  $output .='<td>'.$record['id']. '</td>';
			  $output .='<td>'.$record['emp_ID']. '</td>';
				$output .='<td>'.$record['First_Name'].' '. $record['Second_Name']. '</td>';
				$output .='<td>'.$record['role']. '</td>';
				$output .='<td>'.$record['email']. '</td>';
				$output .='<td>'.$record['telephone']. '</td>';
			
				$output .='<td>'.$record['Date_Joined']. '</td>';
				$output.="<td> <a href='".$edit."'><i class='fas fa-user-edit'></i><a/></td>";
				$output .="<td><a href='".$del."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
				$output .='</tr>';

		}
   echo json_encode($output);
	}
	public function edit_employee($id)
	{
	    $model= new UserModel();
	    $editUser['user_record']=$model->where('id', $id)->first();
	  	return view('admin/edit-employee', $editUser);

	}
	public function update_employee()
	{  


				$rules= [
				    'fname'=>['rules'=>'required',
				              'label'=>'firstName',
				               'errors'=>['required'=>'First Name is required']
				           ],
				    'sname'=>['rules'=>'required',
				              'label'=>'secondNAME',
				               'errors'=>['required'=>'second Name is required']
				           ],
				    'email'=>['rules'=>'required',
				              'label'=>'email',
				               'errors'=>['required'=>'email is required']
				           ],
				    'dob'=>['rules'=>'required',
				              'label'=>'startDate',
				               'errors'=>['required'=>'startDate is required']
				           ],

				     'doj'=>['rules'=>'required',
				              'label'=>'endDate',
				               'errors'=>['required'=>'end date is required']
				           ],
				 
				];
		   if(!$this->validate($rules))
		   { 
		   	  $validation =  \Config\Services::validation();
	                  $result['validation']=$validation->getErrors();
	             	    $result['code']=0;
	                 echo json_encode($result);

		   }
		   else{
		   	$model=new UserModel();
	      $id=$this->request->getVar('id');
	      $data['email']= $this->request->getPost('email');    
	      $data['First_Name'] =$this->request->getPost('fname');
	      $data['Second_Name'] =$this->request->getPost('sname');
	      $data['Date_Joined'] =$this->request->getPost('doj');
	      $data['role'] =$this->request->getPost('role');
	      $data['DOB'] =$this->request->getPost('dob');
	      // $data['telephone'] =$this->request->getPost('telephone');
	      $model->update($id, $data);

	// return redirect()->to(base_url('/employees'))->with('success', 'Record Updated successfully');
		   }

       
	}
  public function delete_employee($id)
  {
  	  $model=new UserModel();
      $model->where('id', $id)->delete();
      return redirect()->to(base_url('employees'))->with('message', 'User deleted sucessfully');
  }
	public function add_employee()
	{
		 return view('admin/add-employee');
	}
	public function register_employee()
	{   

		$validationRules=[
				  	'fname'=>[
                               'rules'=>'required',
                               'label'=>'First Name',
                               'errors'=>[
                                          'required'=>'Please Enter first Name',
                                         ]
				  	          ],
				  	'sname'=> [
				  	           'rules'=>'required',
                               'label'=>'second Name',
                               'errors'=>[
                                          'required'=>'Please Enter second Name',
                                         ]
				  	          ],
				  	'role'=> [
				  	           'rules'=>'required',
                               'label'=>'user role',
                               'errors'=>[
                                          'required'=>'Input User role',
                                         ]
				  	          ],
				  	'email'=>[
                                'rules'=>'required',
                                'label'=>'email',
                                'errors'=>[
                                           'required'=>'EMail is required*',
                                          ]
				  	           ],
				  	  'empID'=> [
				  	           'rules'=>'required',
                               'label'=>'employee ID',
                               'errors'=>[
                                          'required'=>'Input emp ID',
                                         ]
				  	          ],
				  	  'doj'=> [
				  	           'rules'=>'required',
                               'label'=>'date Joined',
                               'errors'=>[
                                          'required'=>'Input date engaged',
                                         ]
				  	          ],
				  	    'telephone'=> [
				  	           'rules'=>'required',
                               'label'=>'telephone no',
                               'errors'=>[
                                          'required'=>'Input telephone number',
                                         ]
				  	          ],
				  	    'dob'=> [
				  	           'rules'=>'required',
                               'label'=>'date of birth',
                               'errors'=>[
                                          'required'=>'Input date of birth',
                                         ]
				  	          ],
				  	    'password'=>[
		     			          'rules'=>'required|min_length[4]',
		     			          'label'=>'Password',
		     			          'errors'=> [
		     			          	          'required'=>'password is required*',
		     			          	          'min_length[4]'=>'password must be atleast 4 characters',
		     			                     ]
		     		            ],
		     		   'cpassword'=>'matches[password]'
				  
		     	    ];
               if(!$this->validate($validationRules)) 
               { 
	                	$validation =  \Config\Services::validation();
	                  $result['validation']=$validation->getErrors();
	             	    $result['code']=0;
	                	echo json_encode($result);
    
               }
               else 
	              {  
				            	$data['dob']=$this->request->getVar('dob');
											$data['email']=$this->request->getVar('email');
											$data['First_Name']=$this->request->getVar('fname');
											$data['Second_Name']=$this->request->getVar('sname');
											$data['password']=$this->request->getVar('password');
											$data['password']=$this->request->getVar('cpassword');
											$data['role']= $this->request->getPost('role');
											$data['DOB']=$this->request->getPost('dob');
											$data['emp_ID']=$this->request->getPost('empID');
											$data['Date_Joined']=$this->request->getVar('doj');
											$data['telephone']=$this->request->getVar('telephone');
										
                    if(!$this->model_user->email_exists($data['email']) && !$this->model_user->id_exists($data['emp_ID']))
                    {


										  	$user=new UserModel();
										  	$user->insert($data);
										  	$session=session();
										  	$session->set($data);
										  	$session->setFlashdata('message', 'Registration successfull');
										  	 $result['code']=1;
										    // return json_encode($result);	


                    }
                    else
                    {   
                    	 $result['message']='email or employee ID already exists!';
                    	 $result['code']=3;
	                	  

                    }
		     	    	}
		        echo json_encode($result);	
	}
public function register_leave()
	{    
				$rules= [
				   'empID'=>[ 'rules'=>'required',
				      'label'=>'empID',
				      'errors'=>[
				                  'required'=>'Enter Valid Job IDno',
				                 
				                   ]
				         ],
				    'email'=>['rules'=>'required|valid_email',
				              'label'=>'email',
				               'errors'=>['required'=>'email is required',
				                         ]
				           ],
				    'startDate'=>['rules'=>'required',
				              'label'=>'startDate',
				               'errors'=>['required'=>'startDate is required']
				           ],

				     'endDate'=>['rules'=>'required',
				              'label'=>'endDate',
				               'errors'=>['required'=>'end date is required']
				           ],
				    'days'=>['rules'=>'required',
				              'label'=>'days taken',
				               'errors'=>['required'=>'days taken is required']
				             ],
				    'phone'=>['rules'=>'required',
				              'label'=>'phone',
				               'errors'=>['required'=>'phone number required']
				          
				           ],
				  'ltype'=>['rules'=>'required',
				              'label'=>'leave type',
				               'errors'=>['required'=>'choose leave typei']
				           ],
				];
		if($this->validate($rules))
				{
					$data['empID']    = $this->request->getVar('empID');
					$data['category'] =$this->request->getVar('ltype');
					$data['email']    =$this->request->getVar('email');
					$data['phone'] =$this->request->getVar('phone');
					$data['days_applied']=$this->request->getVar('days');
					$data['START_date']=$this->request->getPost('startDate');
					$data['END_date']  =$this->request->getPost('endDate');
					$data['status']  =$this->request->getPost('status');
					$data['remarks']  =$this->request->getPost('remarks');

					   if($this->model_user->id_exists($data['empID'])  && $this->model_user->email_exists($data['email']))
					   {
					   	  $model = model('LeaveModel');
					      $model->insert($data);
					      $result['success']='Application submitted successfuly';
					      $result['status']='success';
					      // return json_encode($result);
					    }
					   else
						   {  $result['code']=0;
						   	  $result['message']='invalid records! Register first!';
						     // return json_encode($result);
						   }
					}
		else
			{
				$validator = \Config\Services::validation();
				$result['code']=0;
				$result['errors']= $validator->getErrors();
			}
				return json_encode($result);
}
public function submit_application()
	{
	$rules= [     
			'jobId'=> [
	              'rules'=>'required',
	              'label'=>'job ID',
	              'errors'=>[
	                          'required'=>'Enter Valid Job IDno',
	                        ]
			      ],

			'email'=>[
	                 'rules'=>'required',
	                 'label'=>'Emaill Address',
	                 'errors'=>[
	                          'required'=>'Enter email Address',
	                 ]
			    ],
			'phone'=>[
	                  'rules'=>'required',
	                  'label'=>'Phone Number',
	                  'errors'=>[
	                          'required'=>'Phone number',
	                  ]
			  ],
			'daysTaken'=>[
	                    'rules'=>'required',
	                    'label'=>'Days Taken',
	                    'errors'=>[
	                              'required'=>'Enter leave days you are applying for',
	                    ]
	        ],
	        'category'=>[
	                    'rules'=>'required',
	                    'label'=>'category',
	                    'errors'=>[
	                              'required'=>'Please select leave category',
	                    ]
			        ],  
			'startDate'=>[
	                    'rules'=>'required',
	                    'label'=>'start Date',
	                    'errors'=>[
	                             'required'=>'start date is required',
	                    ]
			    ],
			'endDate'=>[
	                   'rules'=>'required',
	                   'label'=>'end date',
	                   'errors'=>[
	                         'required'=>'end date is required',
	                   ]
			     ]
			 ];
		if($this->validate($rules)) 
		   {
							$data['empID']    = $this->request->getVar('empID');
							$data['category'] =$this->request->getVar('category');
							$data['email']    =$this->request->getVar('email');
							$data['phone']    =$this->request->getVar('phone');
							$data['days_applied']=$this->request->getVar('days');
							$data['START_date']=$this->request->getPost('startDate');
							$data['END_date']  =$this->request->getPost('endDate');
							$data['status']  =$this->request->getPost('status');
							// $data['LEAVES_id']= 'AE21'.strtoupper(random_string('alnum', 4));
							if(strtotime($data['START_date']) < strtotime($data['END_date'])){
								   $model = model('LeaveModel');
							     $model->insert($data);
							     $result['message']='Application submitted successfuly';

							}   
							else
							{
							   
							   $result['date_error']= "start date should be less than end date";
							   // return json_encode($result);
							}
		   }
		else
			 {
				$validator = \Config\Services::validation();
				$result['errors']= $validator->getErrors();
				// return json_encode($result);
			 }

			 return json_encode($result);
	}

	public function leave_history()     //display history of applied leaves per person//
	{    
	     $balance= $this->leave_balance();
	     $result= $this-> fetch_record();
	  // print_r($result);
	     return json_encode($result);  //accessed via the profile view
	 
	}

	public function display_records() //display all employee records using the display_records 

	{
				$result['data']=$this->fetch_records();

			// print_r($result['data']);
			  return view('user_records', $result);
	}
	public function fetch_records()//fetch all employee leave days
	{   
			// $id=$this->request->getVar('id')
			$db= \Config\Database::connect();
			$query = $db->query("SELECT * FROM leaves");
			$res= $query->getResult('array');
			return $res;

	}
	public function display_record()
	{
			 $result['data']= $this-> fetch_record();
			 $days['data']= $this->leave_balance();
			 
			 return view('user_record', $result);
	}
	public function fetch_record()
	{
			$db= \Config\Database::connect();
			$query = $db->query("SELECT * FROM leaves WHERE JOB_id=003");
			$res= $query->getResult('array');
			return $res;
	}
public function leave_balance()
	{ 
			$db= \Config\Database::connect();
			$query= $db->query('SELECT SUM(leaves.DAYS_taken) as daysRemaining FROM leaves WHERE JOB_id= 003');
			$query= $query->getResult('array');
			return $query;
	}
public function test1()
	{

			$db= \Config\Database::connect();
			$builder = $db->table('registeredusers');
			$id= 003;
			$query= $builder->getWhere('JOB_id', $id);
			foreach ($as as $key => $value)
			 {
				# code...
		   }

	}
public function contact()
		{
			return view('contact');

		}
 public function emailsend()
 {      
 	    $to = $this->request->getVar('email');
      $subject = $this->request->getVar('subject');
      $message = $this->request->getVar('message');

        if(!$to || !$subject || !$message)
        {   
        	$msg='fill all spaces';
        	   
        }

       else{
              $email = \Config\Services::email();
			        $email->setTo($to);
			        $email->setFrom('peninahkimani0727@gmail.com', 'Contact Us');
			        $email->setSubject($subject);
			        $email->setMessage($message);
					      if ($email->send()) 
								 {
								   $msg = 'Email successfully sent';
								 } 
								 else 
								 {
							        $data = $email->printDebugger();
							        // echo $data;
							        // exit();
							         $msg ='Email send failed';
							     }
				  }
	 return redirect()->to( base_url('contact') )->with('msg', $msg);
}
public function linkActivation(){
   $message = "Please activate the account ".anchor('user/activate/','Activate Now','');
   $to='dominicmwikya50@gmail.com';
   $subject='Account Activation';
   $email = \Config\Services::email();
   $email->setFrom('peninahkimani0727@gmail.com', 'activate');
   $email->setTo($to);
   $email->setSubject($subject);
   $email->setMessage($message);//your message here
   $email->send();
   $email->printDebugger(['headers']);


	}
}