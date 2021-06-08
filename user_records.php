<!DOCTYPE html>
<html>
<head>
<title>Admin|Manage|leave</title>
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>  -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

</head>
<body>
<form id="change">
<table width="65%" border="2" cellspacing="5" cellpadding="5" style="margin-left: 90px;">
  <tr style="background:#CCC">
  	 <th>No.</th>
    <th>Leave Type</th>
    <th>Job_ID</th>
    <th>Email_Addr</th>
    <th>days_Taken</th>
     <th>status</th>
     <th>change status</th>
  </tr> <?php
		  $i=1;
		  foreach($data as $row) {     
		          echo "<tr>";
				  echo "<td>".$i."</td>";
				  echo "<td>".$row['LEAVES_category']."</td>";
				  echo "<td>".$row['JOB_id']."</td>";
				  echo "<td>".$row['USERS_email']."</td>";
				  echo "<td>".$row['DAYS_taken']."</td>";
				  echo "<td>".$row['LEAVE_status']."</td>";
				  echo "<td>";
						 ?>
						 <select name="change_status[]" class="form-control" id="selectBox">
						 	<option value=""></option>
						 	<option value="Rejected">Rejected</option>
						 	<option value="Accepted">Accepted</option>
						 </select>
			     <?php echo " </td>";?>
				  <div>
				  <input type="hidden" name="jobId[]" id="jobId" value="<?= $row['LEAVES_id'] ?>">
				  <?php 
				   echo "</tr>";
		      $i++;
		  }
   ?>
</table>
<input type="submit" name="submit" value="CHANGE STATUS" style="margin-left:500px; background-color: rgb(23,90,62); ">
</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
	   $('#change').submit( function(event)
	   	{
	   	   var ids = $("input[name='jobId[]']")
              .map(function()
              	{ return $(this).val();
              	}).get();
            var statuses = $("select[name=\'change_status[]\']").map(function() {
			     return $(this).val();
			      }).toArray();

           event.preventDefault();
           $.ajax({
                  url:"<?php echo base_url('admin/update'); ?>",
                  type:'post',
                  data:{'ids':ids,'statuses':statuses},
                  dataType:'html',
           }).done(function(message)
           {  
               // console.log(message);
               if(message)
                { 

                	setTimeout(function() {
							    window.location.reload(true);
							  }, 2000);
		          alertify.set('notifier', 'position', 'top-right');
		          alertify.success("Leave Status changed successfully");
		          
		        }
           });
	   	}); 
	}); 
</script>
</html>