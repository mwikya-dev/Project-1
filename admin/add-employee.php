<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<style type="text/css">
     .help-block{
    color: red;
  }
  .form label{
    font-weight: strong;
  }
</style>
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Employees</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Employees</a>
                            </li>
                            <li class="breadcrumb-item active">Add Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Add</strong> Employee</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <form id="registerForm">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group fname-group">
                                        <div class="form-line">
                                           <label>Firt Name:</label><input type="text" name="fname" class="form-control" placeholder="First Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group sname-group">
                                        <div class="form-line">
                                            <label>second Name:</label><input type="text"  name="sname"class="form-control" placeholder="Last Name" />
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line email-group">
                                            <label>EMAIL:</label><input id="email" type="email" class="validate form-control"
                                                placeholder="Email" name="email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group empID-group">
                                        <div class="form-line">
                                            <label>EMP ID:</label><input type="text" class="datepicker form-control"
                                                placeholder="employee ID" name="empID">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group role-group">
                                        <div class="form-line ">
                                             <label>USER ROLE:</label><input type="text" class="form-control" placeholder="user role" name="role" />
                                        </div>
                                    </div>
                               </div>
                                  <div class="col-sm-4">
                                    <div class="form-group telephone-group">
                                        <div class="form-line">
                                            <label>Tel:</label><input type="text" name="telephone" class="form-control" placeholder="Telephone" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group dob-group">
                                        <div class="form-line">
                                            <label>DOB:</label><input type="text" class="datepicker form-control" placeholder="Birth Date" name="dob">
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line doj-group">
                                         <label>Date Joined:</label><input type="text" class="form-control" placeholder="Designation" name="doj" />
                                    </div>
                                </div>
                            </div>
                               <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line doj-group">
                                         <label>Address:</label> <textarea name="address" placeholder="current residence address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group password-group">
                                        <div class="form-line">
                                            <label>password:</label><input type="text" name="password" class="form-control" placeholder="password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group cpassword-group">
                                        <div class="form-line">
                                            <label>confirm password:</label><input type="text" name="cpassword" class="datepicker form-control" placeholder="confirm password" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-md-3">Upload Your Profile Photo</label>
                                    <!-- <form action="http://www.radixtouch.in/" id="frmFileUpload" class="dropzone" method="post"
                                        enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                            <em>(This is just a demo dropzone. Selected files are
                                                <strong>not</strong>
                                                actually uploaded.)</em>
                                        </div>
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </form> -->
                                </div>
                            </div>
                            <input type="submit" name="SUBMIT" class="btn btn-primary waves-effect m-r-15">
                            <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
    <script>
    $(document).ready( function()
    {  
        $('#registerForm').submit( function(event){
            event.preventDefault();
             $(".form-group").removeClass("has-error"); //remove has-error class
             $(".help-block").remove();
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('employee/register'); ?>',
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
                   $.each(errors, function(k, value)
                    {
                        if(k=='fname'){
                            $('.fname-group').addClass('has-error');
                             $('.fname-group').append('<div class="help-block">'+ value +'</div>');
                                }
                            if(k=='sname'){
                                $('.sname-group').addClass('has-error');
                                $('.sname-group').append('<div class="help-block">'+ value +'</div>');
                                }
                           if(k=='role'){
                                 $('.role-group').addClass('has-error');
                                 $('.role-group').append('<div class="help-block">'+ value +'</div>');
                                }
                            if(k=='email') {
                                 $('.email-group').addClass('has-error');
                                 $('.email-group').append('<div class="help-block">'+ value +'</div>');
                                
                                }
                            if(k=='empID') {
                                $('.empID-group').addClass('has-error');
                                 $('.empID-group').append('<div class="help-block">'+ value +'</div>');
                                }
                            if(k=='doj') {
                                 $('.doj-group').addClass('has-error');
                                 $('.doj-group').append('<div class="help-block">'+ value +'</div>');
                                }
                             if(k=='dob') {
                                    $('.dob-group').addClass('has-error');
                                 $('.dob-group').append('<div class="help-block">'+ value +'</div>');
                                    
                                }
                             if(k=='telephone') {
                                    $('.telephone-group').addClass('has-error');
                                 $('.telephone-group').append('<div class="help-block">'+ value +'</div>');
                                }
                            if(k=='password') {
                                    $('.password-group').addClass('has-error');
                                 $('.password-group').append('<div class="help-block">'+ value +'</div>');
                                }
                            if(k=='cpassword') {
                                    $('.cpassword-group').addClass('has-error');
                                 $('.cpassword-group').append('<div class="help-block">'+ value +'</div>');
                                }

                            
                        });

                 }
                 if(res.code=3)
                 {
                         alert(res.message);
                         $("#registerForm").trigger("reset");
                      

                 }
               if(res.code==1)
               {
                window.location.href='<?php echo base_url('employees') ?>';

               }
                
             
            });
        });
    });
</script>
    <?= $this->endSection('content') ?>