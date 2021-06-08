<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Edit Employee</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Employee</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Employee</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Edit</strong> Employee</h2>
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
                        <?php if($user_record){ ?>
                        <form id="editForm">
                              <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <label><strong>First Name:</strong></label> <span id="sname_error" class="errors"></span><input type="text" class="form-control" name="fname" value="<?php  echo $user_record['First_Name']; ?>"
                                                placeholder="First Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                       <label><strong>second Name:</strong></label><span id="sname_error" class="errors"></span><div class="form-line">
                                            <input type="text" class="form-control" name="sname" value="<?php  echo $user_record['Second_Name']; ?>"
                                                placeholder="Last Name" />
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-4">
                                    <div class="form-group">
                                       <label><strong>EMAIL:</strong></label><span id="email_error" class="errors"></span> <div class="form-line">
                                            <input type="email" class="form-control" name="email" value="<?php  echo $user_record['email']; ?>"
                                                placeholder="email address" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <label><strong>USER ROLE:</strong></label><span id="role_error" class="errors"></span><input id="role" type="text" name="role" class="validate form-control"
                                                value="<?php  echo $user_record['role']; ?>" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <label><strong>Date of Joining</strong></label><span id="doj_error" class="errors"></span><input type="text" name="doj" class="datepicker2 form-control" value="<?php  echo $user_record['Date_Joined']; ?>"
                                                placeholder="Joining Date">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <label><strong>Date of Birth</strong></label><span id="dob_error" class="errors"></span><input type="text" name="dob" class="datepicker2 form-control" value="<?php  echo $user_record['DOB']; ?>"
                                                placeholder="Birth Date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $user_record['id'] ?>">
                            <input type="submit" name="SUBMIT">
                        </form>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script type="text/javascript">
       $('#editForm').submit(function(event){
         event.preventDefault();
         $.ajax({
                type:'POST',
                url: "<?php echo base_url('employee/update') ?>",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                dataType: 'html',
      }).done(function(result)
        {    
                var errors=result.validation;
                if(result.code==0)
                {
                    $.each(errors, function(k, value){
                        if(k=='fname'){
                            $('#fname_error').text(value);
                           }
                        if(k=='sname'){
                            $('#sname_error').text(value);
                            }
                        if(k=='email'){
                               $('#email_error').text(value);
                             }
                        if(k=='role'){
                               $('#role_error').text(value);
                             }
                        if(k=='dob'){
                               $('#dob_error').text(value);
                             }
                        if(k=='doj'){
                               $('#doj_error').text(value);
                             }

                    });
                }
                window.location.href='<?php echo base_url('/employees'); ?>';
        });
       });
</script>
<?= $this->endSection('content') ?>