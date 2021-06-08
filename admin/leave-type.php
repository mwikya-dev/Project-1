<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>      
<div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Leave Type</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Leave</a>
                            </li>
                            <li class="breadcrumb-item active">Leave Type</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Leave</strong> Type
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
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center"> Name </th>
                                            <th class="center"> Leave Type </th>
                                            <th class="center"> Status </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if($categories) {
                                         foreach ($categories as $leave) {  ?>
                                         <tr class="odd gradeX">
                                               <td class="center"><?php  echo $leave['category']; ?>
                                               </td>
                                                <td class="center">non paid</td>
                                                <td class="center">
                                                    <div class="badge col-green">Active</div>
                                                </td>
                                                <td class="center">
                                                    <button class="btn tblActnBtn">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <button class="btn tblActnBtn">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                        </tr>
                                        
                                    <?php }}   ?>
                                      
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="center"> Name </th>
                                            <th class="center"> Leave Type </th>
                                            <th class="center"> Status </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?= $this->endSection('content') ?>