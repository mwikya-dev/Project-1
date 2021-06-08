<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

 <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Edit Leave</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index-2.html"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Leaves</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Leave</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Edit</strong> Leave Request</h2>
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
                        <?php  if ($user_data){ ?>
                         <form action=" <?php  echo base_url('leave/update/').'/'.$user_data['id']; ?>" method="post">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                          EMAIL  <input type="text" name="email" class="form-control" placeholder="email"
                                                value="<?php  echo $user_data['email']; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                           NO.DAYS APPPLIED <input type="text" name="daysTaken" class="form-control" placeholder="jobId"
                                                value="<?php  echo $user_data['days_applied']; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                           START DATE<input type="text" name="startDate" class="datepicker2 form-control" placeholder="From Date"
                                                value="<?php  echo $user_data['START_date']; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                          END DATE<input type="text" name="endDate" class="datepicker2 form-control" placeholder="To Date"
                                                value="<?php  echo $user_data['END_date']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="leave"> Select Leave</label>
                                         <select class="form-control" id="leave" name="leavType">
                                          <?php if($categories) {  ?>
                                             <option value="" disabled>Leave Type</option>
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?php  echo $category['category']; ?>"> <?php  echo $category['category']; ?> </option>
                                            <?php } }  ?>
                                        </select>
                                        </div>
                                </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                          PHONE<input type="text" class="datepicker2 form-control" placeholder="To Date" value="<?php echo $user_data['phone']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                 <input type="hidden" name="id" class="form-control" value="<?php  echo $user_data['id']; ?>">
                                <input type="submit" name="submit" value="Update Record" class="btn btn-primary waves-effect m-r-15">
                                <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                            </div>
                        </div>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?= $this->endSection('content') ?>