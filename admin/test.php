<!DOCTYPE html>
<html>
<head>
	<title>   </title>
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
</head>
<style type="text/css">
  .help-block{
    color: red;
  }
  #body{
    background-color: #FFA07A;
  }
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  border: 1px solid #555;
}

li a {
  display: block;
  color: #000;
  padding: 4px 8px;
  text-decoration: none;
}

li {
  text-align: center;
  border-bottom: 1px solid #555;
}

li:last-child {
  border-bottom: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
#col1{
  float: left;
  padding-top: 20px;
  padding-left: 20px;
  margin: 0px;
}
#col2{
  float: center;
  padding-top: 20px;
  margin: 0px;
}
.errors{
	color: red;
}
</style>
<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Logo</a>
    <form class="form">
      <?php  echo "Welcome"." ". session()->get('USERS_name');  ?>
      <a href="<?php  echo base_url('users/logout') ?>" class="btn btn-danger">Log out</a>
    </form>
     </nav>
<body id="body">
<div class="container-fluid">
<div class="row">
	<div class="col-md-2" id="col1">
       <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
          <button type="button" id="bt1"  class="btn btn-primary" data-toggle="modal" data-target="  #exampleModal"> Leave Application
          </button>
          </li>
          <li class="nav-item">
          <button id="show">Leave Summary</button>
          </li>
          <li class="nav-item">
          <button id="result">History</button>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">View Comments</a>
          </li>
          <!-- <li class="nav-item">
          <a class="nav-link" href="#">Leave Balance</a>
          </li> -->
         <li class="nav-item">
         <a class="nav-link" href="<?php  echo base_url('users/logout') ?>" class="btn btn-danger">Logout</a>
        </li>
      </ul>
  </div>
<div class="col-md-8 offset-2" id="result">
  <table id="myTable" class="table table-bordered">
      <thead>
        <tr>
           <th><i>LeaveID</i></th>
          <th><i>jobId</i></th>
          <th><i>Email</i></th>
          <th><i>Category</i></th>
           <th><i>daysTaken</i></th>
          <th><i>Begining Date</i></th>
          <th><i>End Date</i></th>
          <th><i>status</i></th>
        </tr>
     </thead>
     <tbody>
     </tbody>
  </table>
  </div>
<div class="col-md-8 offset-2" id="col2">
<!-- Modal -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
   <script type="text/javascript">
  	$(document).ready(function()
{
              var url='<?php echo base_url('users/leave/history'); ?>';
              $.ajax({
                  type: 'GET',
                  url: url,
                  mimeType: 'json',
                  success: function(data) {
                    console.log(JSON.stringify(data));

                   $.each(data, function(i, data) {
                    var body = "<tr>";
                     body    += "<td>" + data.LEAVES_id+ "</td>";
                     body    += "<td>" + data.JOB_id+ "</td>";
                     body    += "<td>" + data.USERS_email + "</td>";
                     body    += "<td>" + data.LEAVES_category+ "</td>";
                     body    += "<td>" + data.DAYS_taken + "</td>";
                     body    += "<td>" + data.START_date + "</td>";
                     body    += "<td>" + data.END_date + "</td>";
                     body    += "<td>" + data.LEAVE_status + "</td>";
                     body    += "</tr>";
                     $( "#myTable tbody" ).append(body);
                     });
                      /*DataTables instantiation.*/
                      $("#myTable").DataTable();
                        },
                        error: function() {
                            alert('Problem loading DataTable');
                        }
                });

      $('#applicationform').submit(function(event)
       {
          event.preventDefault();
           $(".form-group").removeClass("has-error"); //remove has-error class
           $(".help-block").remove();
           $.ajax(
           {
              type:'post',
              url:'<?php echo base_url('/user/apply'); ?>',  //(/user/apply);
              data: new FormData(this),
              dataType:'json' ,
              processData:false,
              contentType:false,
              cache:false,
            
          }).done(function(result) 
             {  
                 var errors= result.errors;
                 if(errors){
                  $.each(errors, function(key, error) 
                    {
                      if(key=='email'){
                        $('.email-group').addClass('has-error');
                        $('.email-group').append('<div class="help-block">'+ error +'</div>');
                      }
                      if(key=='jobId'){
                        $('.jobid-group').addClass('has-error');
                        $('.jobid-group').append('<div class="help-block">'+ error+'</div>');
                      }
                      if(key=='phone'){
                        $('.phone-group').addClass('has-error');
                        $('.phone-group').append('<div class="help-block">'+ error +'</div>');
                      }
                      if(key=='daysTaken') {
                        $('.daysTaken-group').addClass('has-error');
                        $('.daysTaken-group').append('<div class="help-block">'+ error +'</div>');
                      }
                      if(key=='category') {
                        $('.category-group').addClass('has-error');
                        $('.category-group').append('<div class="help-block">'+ error +'</div>');
                      }
                    
                      if(key=='startDate'){
                        $('.startDate-group').addClass('has-error');
                        $('.startDate-group').append('<div class="help-block">' + error +'</div>');
                      }
                      if(key=='endDate'){
                        $('.endDate-group').addClass('has-error');
                        $('.endDate-group').append('<div class="help-block">'+ error +'</div>');
                      }

                  });
                }
              if(result.date_error){
                // console.log(result.date_error);
                $('.startDate-group').addClass('has-error');
                $('.startDate-group').append('<div class="help-block">' + result.date_error +'</div>');
              }
              if(empty(errors)  && empty(result.date_error))
              {
                 alert('Application submitted successful');
              }

             });
         clearForm('#applicationform');

      });
 function clearForm(form)
      {
          $(":input", form).each(function()
          {
          var type = this.type;
          var tag = this.tagName.toLowerCase();
              if (type == 'text' || type=='datetime-local')
              {
              this.value = "";
              }
             
          });
      };
});  
  </script>
</div>
</div>
</div>
</body>
</html>  