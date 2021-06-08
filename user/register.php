<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">  
</head>
<body>
	<style type="text/css">
		.errors{

			color: red;
		}
	</style>
<div class="container">
<?php 
  if(session()->has('message')){
?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
     <?= session()->getFlashdata('message') ?>
   </div>
<?php
  }
?>
<div class="row">
 <div class="col-md-8 offset-2">
 	<div class="errors">
		 <?php  if(isset($validation))
			{
				echo $validation->listErrors();
			}    
	    ?>
	</div>
    <div class="card">
	<div class="card-header">USER REGISTRATION</div>
	 <div class="card-body">
	 <form id="userform">
		<div class="row">
		 <div class="col-md-6">
		 <div class="form-group">
			<label>job ID</label>
			<input type="text" name="jobId" class="form-control" placeholder="Enter Job ID">
			<span id="id_errror" class="errors"></span>
		 </div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label>EmpName</label>  <span id="name_error" class="errors"></span>
			<input type="text" name="username" class="form-control" placeholder="Enter Your Name" id="name"> 
		</div>
	    </div>
		<div class="col-md-6">
		<div class="form-group">
		  <label>Email Address</label> 	<span id="email_error" class="errors"></span>
		  <input type="email" name="email" class="form-control" placeholder="email" id="email" >
		 </div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label>userRole</label>	<span id="role_error" class="errors"></span>
			<input type="text" name="role" class="form-control" placeholder="User role" id="role">
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label>Password</label> 	<span id="password_error" class="errors"></span>
			<input type="password" name="password" class="form-control" placeholder="Enter password" id="password" >
		</div>
		</div>
		<div class="col-md-6">
		 <div class="form-group">
			<label>Confirm Password</label> 	<span id="cpassword_error" class="errors"></span>
			<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" id="cpassword">
		 </div>
		</div>
		</div>

		 <input type="submit" name="submit" value="REGISTER" class="btn btn-success form-group">
	</form>
		<button class="btn btn-danger form-group"> <a href="/users">show all</a></button>
	 </div>
	 </div>
	<div class="row">
	  <div class=" col-md-10 offset-1" >
	  </div>
   </div>
</div>
</div>
</div>
</body>
<script>
	$(document).ready( function()
	{  
		$('#userform').submit( function(event){
			event.preventDefault();
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('users/register'); ?>',
			    data: new FormData(this),
	  	        dataType:'html' ,
	  	        processData:false,
	  	        contentType:false,
	  	       cache:false,
			})
			.done( function(result){
                 console.log(result);
				var res=JSON.parse(result);
				var errors=res.validation;
			    if (res.code==0) 
			    {
                   $.each(errors, function(k, v)
                    {
                     	if(k=='email'){
                     		$('#email_error').text(v);
                     			}
                     		if(k=='username'){
                     				$('#name_error').text(v);
                     			}
                     	   if(k=='role'){
                     				$('#role_error').text(v);
                     			}
                     		if(k=='password') {
                     				$('#password_error').text(v);
                     			}
                     		if(k=='cpassword') {
                     				$('#cpassword_error').text(v);
                     			}
                     	});
			     }
			    else {
                    
			    	window.location.href='<?php echo base_url('users/login'); ?>';
			    }
			});
		});
	});
</script>
</html>