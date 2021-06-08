<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">All Leave Request</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Leave</a>
                            </li>
                            <li class="breadcrumb-item active">All Leave Request</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>All</strong> Leave Request
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" onClick="return false;">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <tr>
                                    <th>LEAVE ID</th>
                                    <th>empID</th>
                                    <th>Email</th>
                                    <th>Leave Type</th>
                                    <th>Days Applied</th>
                                    <th>start Date</th>
                                    <th>end Date</th>
                                    <th>description</th>
                                    <th>status</th>
                                    <th>edit</th>
                                    <th>AlterSt</th>
                                    <th>delete</th>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <div class="modal fade" id="statusModal" tabindex="-1" role="dialog"
    aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="statusForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">CHANGE STATUS</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="input-field col s12">
                            <select class="form-control" name="status" id="status">
                                <option value="" disabled selected>Select Status</option>
                                <option value="3">Pending</option>
                                <option value="2">Rejected</option>
                                <option value="1">Accepted</option>
                            </select> 
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="userid" id="userid">
                <button type="submit"
                    class="btn btn-info waves-effect" id="submitstatus">Change</button>
                <button type="button" class="btn btn-danger waves-effect"
                    data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script type="text/javascript">
    var url="<?php echo base_url('leave/all'); ?>";
    var url1="<?php echo base_url('leave/type'); ?>";
      $.ajax({
                type:"GET", 
                url: url, 
                dataType:"json",
                success: function(data) {
                    $.each(data, function(i, data) {
                        console.log(data);
                      var id= data.id;
                      var st=data.status;
                      var status;
                      if(st=='Accepted'){
                        status=1;
                      }
                      else if(st=='Rejected'){
                         status=2;
                      }else{
                         status=3;
                      }
                      var urledit='<?php echo base_url('leave/edit') ?>/'+id;
                      var urldelete='<?php echo base_url('leave/delete') ?>/'+id;
                      var alter_status='onClick="changestastus('+id+','+status+')"';
                      var body = "<tr>";
                                 body    += "<td>" + data.id + "</td>";
                                 body    += "<td>" + data.empID+ "</td>";
                                 body    += "<td>" + data.email + "</td>";
                                 body    += "<td>" + data.category+ "</td>";
                                 body    += "<td>" + data.days_applied + "</td>";
                                 body    += "<td>" + data.START_date + "</td>";
                                 body    += "<td>" + data.END_date + "</td>";
                                 body    += "<td>" + data.remarks + "</td>";
                                 body    += "<td>" + data.status + "</td>";
                                 body    += "<td> <a href='"+urledit+"'><i class='fas fa-user-edit'></i><a/></td>";
                                 body    += "<td> <a href='javascript:;' "+alter_status+"><i class='fas fa-cogs'></i><a/></td>";
                                 body += "<td><a href='"+urldelete+"'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                                 body    += "</tr>";
                             $( "#myTable tbody" ).append(body);
                     });
                           
                    }, 
             })

  $(document).ready(function(){
  changestastus=function(userid, status)
  {
    $('#userid').val(userid);
    $('#status').val(status).change();
    $('#statusModal').modal('show');        
  }
    $('#statusForm').submit(function(event){
     
    event.preventDefault();
    $("#submitstatus").attr("disabled", false);
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url('leave/change-status'); ?>",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        dataType: 'html',
        success: function(results){
         var parse=JSON.parse(results);
         if(parse.code==1)
         {
          showSuccessMessage(parse.message);
          document.getElementById("statusForm").reset();
          $("#statusModal").modal("hide");
          $("#submitstatus").attr("disabled", false);
          window.location.reload();
         }
         else
         {
          
          $("#submitstatus").attr("disabled", false);
         }
        }
    });
  });
 });
</script>
<?= $this->endSection('content') ?>