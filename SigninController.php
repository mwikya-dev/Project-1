<?php   

namespace App\Controllers;
use App\Models\User_Model; 
use App\Models\UserModel; 
use App\Models\LeaveModel; 
class SigninController extends BaseController
{  

public function __construct()
    {
		helper(['form', 'url']);
    }
	public function loginForm() {
      return view('user/login');
	}
//--------------------------------------------------------------------
public function login()
{
    if($this->request->getMethod()=='post') 
       {  
       	$rules=[
	     		'email'=>[
		     		 	'rules'=>'required',
		     		 	'label'=>'user ID',
		     		 	'errors'=>['required'=>'ID is required']
	     		         ],
	     		        'password'=>
	     		          ['rules'=>'required|min_length[4]|valid_user[email,password]',
	     		            'label'=>'password',
	     		            'errors'=>[
	     		               	          'required'=>'Password Field is required',
     		               	               'min_length[4]'=>'password be at least 4 characters',
     		               	              'valid_user'=>'Email and password don\'t match! Try Again.'
     		               	          ],
     		             ]
     	     	];
	     		if (!$this->validate($rules)) {  
	             	$validation =  \Config\Services::validation();  
	             	$errors['validation']=$validation->getErrors();
		            return view('user/login', $errors);
	             }
	           else{ 
	        	    $email= $this->request->getVar('email');
                    $model= new UserModel();
                    $user= $model->where('USERS_email',  $email)->first(); 
			        
			        $this->setUserSession($user);
			        echo view('profile');
			       
	            }
     	   }   
    }
private function setUserSession($user)
{
	$userSESSION=[
                'name'  =>$user['USERS_name'],
                'email' =>$user['USERS_email'],
                'id'   =>$user['JOB_id'],
                 'isloggedin'=>true  ]; 
			   session()->set($userSESSION);
			   session()->setFlashdata('message', 'Login Success');
			   return true;
}
public function registerForm() {
     
        $data['title']="User Registration";
        $data['header']="User Register";
	    return view ("user/register", $data);  //use register view
	}
public function register()
   {
		$error=[];
	    $rules=[
	      	        'username'=>'required',
			        'email'=>'required|is_unique[registeredusers.USERS_email]|valid_email',
			        'role'=>'required',
			        'password'=>'required|min_length[4]|max_length[255]',
			       'cpassword'=>'matches[password]'
			        ];
			if(!$this->validate($rules))
			    { 
					$validation =  \Config\Services::validation();
	                $result['validation']=$validation->getErrors();
	             	$result['code']=0;
	             	return json_encode($result);
	            }
	         else { 
	         	     	
						$data['JOB_id']=$this->request->getVar('jobId');
						$data['USERS_role']=$this->request->getVar('username');
						$data['USERS_email']=$this->request->getVar('email');
						$data['USERS_role']=$this->request->getVar('role');
						$data['USERS_name']=$this->request->getVar('username');
						$data['password']=$this->request->getVar('password');

						$user=new UserModel();
					  	$user->insert($data);
					  	$session=session();
					  	$session->set($data);
					  	$session->setFlashdata('message', 'Registration successfull');
					    return json_encode($data);

	               }
    }
//--------------------------------------------------------------------
	public function index() {
        $userInfor= new UserModel();
		$data["user_data"]=$userInfor->findAll();

	    return view("user/show", $data);  //show as view
    }
public function edit($id)
	{      
	    $getData= new UserModel();
	    $data['title']='Edit Record';
	    $data['edit_data']=$getData->where('USERS_id', $id)->first();

	return view('edit/edit', $data);  //edit view

	}
public function update($id)
	{
	     
	      $model=new UserModel();
	      $id=$this->request->getVar('id');
	      
	      $data['JOB_id']     =$this->request->getPost('jobId');
	      $data['USERS_email']= $this->request->getPost('email');    
	      $data['USERS_role'] =$this->request->getPost('role');
	     $model->update($id, $data);
	     return redirect()->to(base_url('/users'))->with('success', 'Record Updated successfully');
	}
public function delete($id)
	{
      $model=new UserModel();

      $model->where('USERS_id', $id)->delete();

      $session = session();
      // session()->setFlashdata('message', 'User Deleted!');
      return redirect()->to(base_url('/users'))->with('delete', 'User deleted sucessfully');
	     
	}

public function activationEmail()
{

	$email = \Config\Services::email();

	$email->setFrom('your@example.com', 'Your Name');
	$email->setTo('someone@example.com');
	$email->setCC('another@another-example.com');
	$email->setBCC('them@their-example.com');

	$email->setSubject('Email Test');
	$email->setMessage('Testing the email class.');

	$email->send();

}

//--------------------------------------------------------------------
  public function logout()  {  
  	$session = session();
  	$session->destroy('login');
  	session()->setFlashdata('message', 'Logout successful!');
  	return view('user/login');
  }
//------------------------------------------------------------
}