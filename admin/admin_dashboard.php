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
</head>
<style type="text/css">
  .div1 a{
     width: 100px;
     height: 100px;

     border: 1px solid blue;
     box-sizing: border-box;
     font-size: 17px;
     display: inline-block;
     position: relative;
     padding: 0px;
     margin: 20px;
     text-align: center;

    
  }
 /* .leave{
    width: 70px;
    height: 30px;
    border: 1px solid blue;
    box-sizing: border-box;
    text-align: inherit*/;
  }
</style>
<nav class="navbar navbar-expand-lg" style="background-color: #111">
  <a><img src="<?php echo base_url('/images/display.jpg') ?>" width="100" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<body>
  <div class="row">
    <div class="col-md-3 col-sm-4" style="border-width: 4px; background-color: #444; height: 555px;">
    <div class="div1" id="nav">
     <a href="<?php echo base_url('dashboard/record'); ?>" class="card-link">Leave Profile</a>
     <a href="<?php echo base_url('/dashboard/records'); ?>" class="card-link">All Users</a>
     <a href="<?php echo base_url('/dashboard/address'); ?>" class="card-link">UserAddress</a>
        </div>
   </div>
   <div class="col-md-9" id="content" style="background-color: ; height: 555px; margin:0px;">
   </div>
  <script>
         $(document).ready(function() {
               $.ajax({
                type: 'GET',
                success: function(data)
                {  
                  // console.log(data);
                },
                complete: function(data)
                {  
                   $('#nav a').click(function(e) {
                         e.preventDefault();
                         // document.location.reload(true);
                         $('#content').load($(this).attr('href'));
                        }); 
                }
               });
       
        });
</script>
</body>
</html>  