<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Leave Balance</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Leave</a>
                            </li>
                            <li class="breadcrumb-item active">Leave Balance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Leave</strong> Balance
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
                                <table class="table table-bordered" id="table1">
                                        <tr>
                                            <th>#</th>
                                            <th class="center">EMPID</th>
                                            <th class="center"> EMAIL </th>
                                            <th>SICK </th>
                                             <th>PRIVILEGE</th>
                                              <th>MATERNITY</th>
                                               <th>PATERNITY</th>
                                            <th class="center"> CASUAL  </th>                      
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
        <script type="text/javascript">
            $(document).ready(function(){
                var url= '<?php echo base_url('leave/balance')   ?>';
                $.ajax({
                    type:"GET",
                     url:url,
                     dataType:'json',
                     processData:false,
                     cache:false,
                     success:function(data)
                     {
                       if(data.status=='success')   
                       {
                          alert('Successful application');
                       }
                       else   {
                         $.each(data, function(i, data)
                                {
                                var CasualCount= data.CasualCount?data.CasualCount:0;
                                var MaternityCount= data.MaternityCount||0
                                var PrivilegeCount= data.PrivilegeCount||0
                                var SickCount= data.SickCount?data.SickCount:0;
                                var PaternityCount= data.PaternityCount||0
                                var SickCount = data.SickCount||0
                                var  CasualCount = data.CasualCount || 0
                                var body = "<tr>";
                                         body    += "<td>" + data.id+ "</td>"; 
                                         body    += "<td>" + data.emp_ID+ "</td>";
                                         body    += "<td>" + data.email + "</td>";
                                         body    += "<td>" +  SickCount + "</td>";
                                         body    += "<td>" +  PrivilegeCount + "</td>";
                                         body    += "<td>" +  MaternityCount + "</td>";
                                         body    += "<td>" + PaternityCount+ "</td>";
                                         body    += "<td>" + CasualCount+ "</td>";
                                         body    +="</tr>"

                                     $( "#table1 tbody" ).append(body);
                                });
                       }
                    
                     }
                });
            });
        </script>
<?=$this->endSection('content') ?>




