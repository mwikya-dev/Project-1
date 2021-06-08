<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Sr No</th>
    <th>Job_ID</th>
    <th>Email_Addr</th>
    <th>days_Taken</th>
    <th>Leave Balance</th>
  </tr>
  <?php
		  $i=1;
		  foreach($data as $row) {
				  echo "<tr><td>".$i."</td>";
				  echo "<td>".$row['JOB_id']."</td>";
				  echo "<td>".$row['USERS_email']."</td>";
				  // echo "<td>".$row['daysRemaining']."</td>";
				  echo "<td>".$row['DAYS_taken']."</td></tr>";
		   $i++;
		  }
   ?>
</table>
</body>
<script type="text/javascript">
</script>
</html>