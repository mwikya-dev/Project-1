<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<style type="text/css">
     .help-block{
    color: red;
  }
</style>
 <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Add Leave</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Leaves</a>
                            </li>
                            <li class="breadcrumb-item active">Add Leave</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>New</strong> Leave Request</h2>
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
                            <form id="applicationform">
                                <div class="row clearfix">
                               <div class="col-sm-4">
                                    <div class="form-group empID-group">
                                        <div class="form-line ">
                                            <input type="text" class="form-control" placeholder="Employee Id" name="empID">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="form-group email-group">
                                        <div class="form-line ">
                                            <input type="email" class="form-control" placeholder="Email Address" name="email" />
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="form-group phone-group">
                                        <div class="form-line ">
                                            <input type="text" class="form-control" placeholder="phone number" name="phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group ltype-group">
                                        <div class="form-line ">
                                        <select class="form-control" name="ltype">
                                            <option value="" disabled selected>Leave Type</option>
                                            <option value="Privilege">Privilege Leave</option>
                                            <option value="Casual">Casual Leave</option>
                                            <option value="Sick">Sick Leave</option>
                                            <option value="Maternity">Maternity Leave</option>
                                            <option value="Paternity">Paternity Leave</option>
                                        </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line days-group">
                                            <input type="days" class="form-control" placeholder="No.of days" name="days" />
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group startDate-group">
                                        <div class="form-line ">
                                            <input type="datetime-local" class="datepicker form-control" 
                                                placeholder="From Date" name="startDate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group endDate-group">
                                        <div class="form-line ">
                                            <input type="datetime-local" class="datepicker2 form-control" placeholder="To Date" name="endDate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize"
                                                placeholder="Remark" name="remarks"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <input type="hidden" name="status" id="hidden" value="Pending">
                            <div class="col-lg-12 p-t-20 text-center">
                                <input type="submit" class="btn btn-primary" id="submit" value="SUBMIT">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
    $(document).ready(function(){

        $('#applicationform').submit( function(event){
        event.preventDefault();
           $(".form-group").removeClass("has-error"); //remove has-error class
           $(".help-block").remove();
         $.ajax({
              type:'POST',
              url:'<?php echo base_url('leave/apply'); ?>',  //(/user/apply);
              data: new FormData(this),
              dataType:'json' ,
              processData:false,
              contentType:false,
              cache:false,
         }).done(function(result)
         {  
            var errors= result.errors;
            $.each(errors, function(key, value)
            {
                 if(key =='email'){
                    $('.email-group').addClass('has-error');
                    $('.email-group').append('<div class="help-block">'+ value +'</div>');
                }
                if(key=='empID'){
                    $('.empID-group').addClass('has-error');
                    $('.empID-group').append('<div class="help-block">'+value+'</div>');
                }
                if(key=='endDate'){
                    $('.endDate-group').addClass('has-error');
                    $('.endDate-group').append('<div class="help-block">'+value +'</div>');
                }
                if(key=='startDate'){
                    $('.startDate-group').addClass('has-error');
                    $('.startDate-group').append('<div class="help-block">'+value+'</div>');
                }
                if(key=='fname'){
                    $('.fname-group').addClass('has-error');
                    $('.fname-group').append('<div class="help-block">'+value+'</div>');
                }
                if(key=='lname'){
                    $('.lname-group').addClass('has-error');
                    $('.lname-group').append('<div class="help-block">'+value+'</div>');
                }
                if(key=='ltype'){
                    $('.ltype-group').addClass('has-error');
                    $('.ltype-group').append('<div class="help-block">'+value+'</div>');
                }
                if(key=='days'){
                    $('.days-group').addClass('has-error');
                    $('.days-group').append('<div class="help-block">'+value+'</div>');
                }
                if(key=='phone'){
                    $('.phone-group').addClass('has-error');
                    $('.phone-group').append('<div class="help-block">'+value+'</div>');
                }
            });  
            clearForm('#applicationform');
         });
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
<?= $this->endSection('content') ?>