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
                                    <th>status</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                <tbody id='records'>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script type="text/javascript">
    var url="<?php echo base_url('leave/all'); ?>";
      $.ajax({
                type:"GET", 
                url: url, 
                dataType:"json",
                success: function(data) {
                     console.log(data);
                    }, 
             })
</script>
<?= $this->endSection('content') ?>