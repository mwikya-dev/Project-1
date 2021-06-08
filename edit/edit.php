
<?= $this->extend('main') ?>
<?= $this->section('content') ?>
<div class="row">  
 <div class="col-md-8 offset-2">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <?php if ($edit_data) {  ?>
            <form action=" <?php  echo base_url('users/update/').'/'.$edit_data['USERS_id']; ?>" method="post">
            <div class="row">
            <input type="hidden" name="id" class="form-control" value="<?php  echo $edit_data['USERS_id']; ?>">
            <div class="col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="start" class="form-control" value="<?php  echo $edit_data['USERS_name']; ?>" required>
                </div>
            </div>  
            <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="endDate" class="form-control" value="<?php  echo $edit_data['USERS_email']; ?>"   required>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" value="<?php  echo $edit_data['USERS_role']; ?>"   required>
                </div>
            </div>
            </div>
            <input type="submit" name="submit" value="Update Record" class="btn btn-success form-group">

        </form>
        <button class="btn btn-danger form-group"> <a href="/users/">show all</a></button>
             <?php  
            }  
         ?>
        </div>
     </div>
    </div>
</div>   
<?=$this->endSection();