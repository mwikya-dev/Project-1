
<?= $this->extend('main')  ?>
<?=$this->section('content') ?>
<div class="row">
    <div class="col-md-10 offset-1">
    <table class="table table-bordered table-stripped" id="show_records">    
    <thead>
          <tr>
             <th>User Id</th>
              <th>Job Id</th>
             <th>Email</th>
             <th>user_Role</th>
             <th>action</th>
          </tr>
       </thead>  
        <tbody>
        <?php if($user_data): ?>
          <?php foreach($user_data as $record): ?>
            
            <tr>
             <td><?php echo $record['id']; ?></td>
             <td><?php echo $record['JOB_id']; ?></td>
             <td><?php echo $record['USERS_email']; ?></td>
              <td><?php echo $record['USERS_role']; ?></td>
             <td>
              <a href="<?php echo base_url('users/edit/'.$record['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('users/delete/'.$record['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
                 <?php endforeach; ?>
                 <?php endif; ?>
        </tbody>
        <button class="btn btn-secondary form-group"> <a href="/users/create/">REGISTER USER</a></button>
    </table>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function(){
          <?php if(session()->getFlashdata('delete')) {  ?>
          alertify.set('notifier', 'position', 'top-right');
          alertify.warning("<?=session()->getFlashdata('delete') ?>");
        <?php } ?>

        <?php if(session()->getFlashdata('success')) {  ?>
          alertify.set('notifier', 'position', 'top-right');
          alertify.success("<?=session()->getFlashdata('success') ?>");
        <?php } ?>

        <?php if(session()->getFlashdata('userAdded')) {  ?>
          alertify.set('notifier', 'position', 'top-right');
          alertify.success("<?=session()->getFlashdata('userAdded') ?>");
        <?php } ?>
        
        $("#show_records").DataTable();
        });
    </script>
</div>
</div> 
<?=$this->endSection()  ?>