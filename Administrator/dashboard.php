<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- <script src="/project/project.js"></script>  -->
</head>
<body>
  <style type="text/css">
    .errors{

      color: red;
    }
    .alert{

      color: red;
    }
    .display{
      color: green;
      font-size: 21px;

    }
    .help-block{
      color: red;
      margin-left: 20px;
    }
  </style>
<div class="container-fluid">
  <div class="row" style="border: 1px solid red; margin-top: 20px;">
    <div class="col-md-5" style="padding: 10px; border: 1px solid #4CAF50; margin-left: 10px;">
  <span class="display" id="display" style="display: none;"></span> <!-- success message -->
  <span class="alert alert-danger" id="display_err" style="display: none;"><p>Server not reqched</p></span>
  <form id="addRole" name="addRole">
   <div class="alert">
      <?= \Config\Services::validation()->listErrors(); ?>
      <?= \Config\Services::session()->getFlashdata('message'); ?>
   </div>
      <h3>  Add User Roles</h3>
      <div class="form-group row" id="rolename_group">
        <label for="rolename" class="col-sm-3 col-form-label">ROLE name:</label>
        <div class="col-sm-8"> 
            <input type="text" class="form-control" id="rolename" name="rolename" placeholder="ROLE NAME">  
          </div>
      </div>
      <div class="form-group row" id="rolesalary_group">
      <label for="description" class="col-sm-3 col-form-label">Expected Salary:</label>
        <div class="col-sm-8"> 
            <input type="number" class="form-control" id="renumeration" name="renumeration" placeholder="Expected Salary">  
          </div>
      </div>
      <div class="form-group row" id="roledescription_group">
        <label for="description" class="col-sm-3 col-form-label">Description:</label>
        <div class="col-sm-8"> 
            <textarea class="form-control" name="description" id="desc"></textarea>
          </div>
      </div>
    <input type="submit" class="btn btn-primary"  value="Create User Role">
    </form>
    </div>

<!--     form to create a new leave -->
    <div class="col-md-4 offset-1" style="padding: 10px; border: 2px solid #4CAF50; ">
      <form id="Addleave">
        <h3>Create Leave</h3>
       
      <div class="form-group row" id="leave_group">
        <label for="leaveID" class="col-sm-2 col-form-label">leaveID:</label>
        <div class="col-sm-8"> 
            <input type="text" class="form-control" id="leaveID" name="leaveID" placeholder="leave ID">  
          </div>
        </div>
        <div class="form-group row" id="name-group">
          <label for="name" class="col-sm-2 col-form-label">Name:</label> 
            <div class="col-sm-8">
              <input type="text" class="form-control" id="leavename" placeholder="name" name="leavename"> 
            </div>  
        </div>
         <div class="form-group row" id="days-group">
          <label for="jobId" class="col-sm-2 col-form-label">Length (days):</label> 
            <div class="col-sm-8">
              <input type="text" class="form-control" id="leaveDuration" placeholder="lenght of leave" name="leaveDuration"> 
            </div>  
        </div>
         <div class="form-group row" id="payment-group">
          <label for="jobId" class="col-sm-2 col-form-label">payment(if any):</label> 
            <div class="col-sm-8">
              <input type="text" class="form-control" id="payment" placeholder="amount expected" name="payment"> 
            </div>  
        </div>
        <input type="submit" class="btn btn-primary"  value="Add Leave">
    </form>
    <div  style="padding: 10px; border: 2px solid #4CAF50; ">


   <!--    create Organizational departments -->
       <form id="AddDepartment">
        <h3>Create Department</h3>
      <div class="form-group row" id="departID-group">
        <label for="email" class="col-sm-2 col-form-label">departID:</label>
        <div class="col-sm-8"> 
            <input type="text" class="form-control" id="departID" name="departID" placeholder="depart ID">  
          </div>
        </div>
        <div class="form-group row" id="departName-group">
          <label for="name" class="col-sm-2 col-form-label">Name:</label> 
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name" name='departName' placeholder="Department" name="departName"> 
            </div>  
        </div>
         <div class="form-group row" id="description-group">
          <label for="jobId" class="col-sm-2 col-form-label">Description:</label> 
            <div class="col-sm-8">
              <input type="text" class="form-control" id="description" placeholder="Description" name="description"> 
            </div>  
        </div>
        <input type="submit" class="btn btn-primary" value="Add Department">
    </form>
    </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function()
  { 
      
     $('#addRole').submit(function(event)
         {
          $(".form-group").removeClass("has-error"); //remove has-error class
         $(".help-block").remove();  //remove help-block div class
          event.preventDefault();
          $.ajax({
                   type:'POST',
                   url:'<?php echo base_url('admin/role'); ?>',
                   data: new FormData(this),
                   processData:false,
                   dataType:'json' ,
                   contentType:false,
                   cache:false,
                 }).done(function(result)
                  { 
                    // console.log(result.role_errors);
          
                   var errors= result.role_errors;
                    if (errors)
                     {
                       $.each(errors, function(key, value)
                       {

                             if(key=='rolename'){
                                  $("#rolename_group").addClass("has-error");
                                 $("#rolename_group").append(
                                  '<div class="help-block">' + value + "</div>" );
                                   }
                              if(key=='description'){
                                 $("#roledescription_group").addClass("has-error");
                                 $("#roledescription_group").append(
                                  '<div class="help-block">' + value + "</div>" );
                                    }

                              if(key=='renumeration'){
                                 $("#rolesalary_group").addClass("has-error");
                                   $("#rolesalary_group").append(
                                  '<div class="help-block">' + value + "</div>" );
                                    }
                              
                       });
                    }
                    else
                    {
                    
                      $("#addRole").trigger("reset"); //reset the form after submit success
                      $(".display").text(result.message);  //set Jquery messsage to spanclass
                      $(".display").show();  //then display
                        setTimeout(function()
                        { 
                          // document.getElementById('display').style.display='none';
                          $('#display').hide();
                        },3000); //hide message after 3secs.
                    }

                });
                 // .fail( function(data){
                 //    $('#display_err').show();
                 // });
        });
    
    
    //create leave category
    $('#Addleave').submit(function(e)
         {
          e.preventDefault();
           $(".form-group").removeClass("has-error"); //remove has-error class
           $(".help-block").remove();
          $.ajax({
                   type:'POST',
                   url:'<?php echo base_url('admin/leave'); ?>',
                   data: new FormData(this),
                   processData:false,
                   dataType:'json' ,
                   contentType:false,
                   cache:false,
                }).done(function(response)
                {
                 var errors= response.data_errors;
                 // console.log(response.error);
                 // alert(response.error);
                  if (errors)
                   {   

                       $.each(errors, function(key, value)
                       {
                           if(key=='leavename') {
                               $('#name-group').addClass('has-error');
                               $('#name-group').append('<div class="help-block">'+value+'</div>');
                                  }
                            if(key=='leaveID') {
                                $('#leave_group').addClass('has-error');
                               $('#leave_group').append('<div class="help-block">'+value+'</div>');
                                  }
                            if(key=='leaveDuration') {
                                $('#days-group').addClass('has-error');
                               $('#days-group').append('<div class="help-block">'+value+'</div>');
                                  }
                            if(key=='payment'){
                                $('#payment-group').addClass('has-error');
                               $('#payment-group').append('<div class="help-block ">'+value+'</div>');
                                  }
                       });
                  }
                  else
                  {
                     console.log(response.message);
                     alert(response.message);
                     $("#Addleave").trigger("reset");
                  }

              });
       });

    //create department
    $('#AddDepartment').submit(function(e)
         {
          e.preventDefault();
           $(".form-group").removeClass("has-error"); //remove has-error class
           $(".help-block").remove();
          $.ajax({
                   type:'POST',
                   url:'<?php echo base_url('admin/department'); ?>',
                   data: new FormData(this),
                   processData:false,
                   dataType:'html' ,
                   contentType:false,
                   cache:false,
                 }).done(function(response)
                   {
                       var result= JSON.parse(response);
                       var arrayErrors= result.department_errors;
                        if (arrayErrors)
                         {
                             $.each(arrayErrors, function(key, value)
                             {
                                 if(key=='departID'){
                                    $('#departID-group').addClass('has-error');
                                    $('#departID-group').append('<div class="help-block">'+value+'</div>');
                                        }
                                  if(key=='departName'){
                                      $('#departName-group').addClass('has-error');
                                      $('#departName-group').append('<div class="help-block">'+value+'</div>');
                                        }
                                  if(key=='description'){
                                      $('#description-group').addClass('has-error');
                                      $('#description-group').append('<div class="help-block">'+value+'</div>');
                                       }
                              });
                        }
                        else
                        {  
                          alert('Department Added successfully');
                          $('#AddDepartment').trigger("reset");
                        }


                  });
           });  
     
  });
</script>
</html>