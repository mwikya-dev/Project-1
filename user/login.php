<!--  -->
<?= $this->extend('main')  ?>
<?=$this->section('content') ?>
 
<div class="row">
<div class="col-md-8 offset-2">
 <div class="card">
	<div class="card-header">
   USER LOGIN FORM
  </div>
  <style type="text/css">
  	#errors
  	{
  		color: red;
  	}
  </style>
<div class="card-body">
	<?php $errors =  \Config\Services::validation();   ?>
      <span id="errors">  <?=$errors->listErrors()  ?></span> 
<?php  if(session()->has('danger')){    ?>
   <div class="alert alert-danger">
     <?= session()->getFlashdata('danger') ?>
   </div> <?php }  ?>
<?php 
if(session()->has('message')){  ?>
   <div class="alert alert-success">
     <?= session()->getFlashdata('message') ?>
   </div> <?php  }  ?>
	<form id="loginform" action="<?php echo base_url('/users/sign'); ?>" method="post">
		<div class="form-group row">
		  <label for="email" class="col-sm-2 col-form-label">Email Address:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="email" placeholder="EMAIL ADDRESS" name="email" value="<?= set_value('USERS_email');  ?>">
		    </div>
        </div>

        <div class="form-group row">
		    <label for="password" class="col-sm-2 col-form-label">password:</label>
		     <div class="col-sm-10">
		       <input type="password" class="form-control" id="password"  name="password" placeholder="password" value="";  ?>
		    </div>
		</div>
		<input type="submit" name="submit"  class="btn btn-primary"/>
	</form>
	
	</div>
	</div>
  </div>
</div>
<!--  -->
<?=$this->endSection()  ?>