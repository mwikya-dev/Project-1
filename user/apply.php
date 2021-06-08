<?= $this->extend('main')  ?>
<?=$this->section('content') ?>

<div class="row">
<div class="col-md-8 offset-2">
 <div class="card">
	<div class="card-header">
    Leave Application form
  </div>
		<div class="card-body">

        <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>

        <form id="applicationform">
		<div class="form-group row">
		    <label for="email" class="col-sm-2 col-form-label">Email:</label>
		     <div class="col-sm-10">
		       <input type="text" class="form-control" id="email" name="email" placeholder="your email address">
		    </div>
		</div>
		<div class="form-group row">
		  <label for="jobId" class="col-sm-2 col-form-label">Job ID:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="jobId" placeholder="Job Id" name="jobId">
		    </div>
        </div>

        <div class="form-group row">
		    <label for="daysfor" class="col-sm-2 col-form-label">Days Applied:</label>
		     <div class="col-sm-10">
		       <input type="text" class="form-control" id="daysfor"  name="daysfor" placeholder="no of days to apply">
		    </div>
		</div>

		<div class="form-group row">
		    <label for="startDate" class="col-sm-2 col-form-label">From:</label>
		     <div class="col-sm-4">
		       <input type="date" class="form-control" id="startDate" name="startDate" placeholder="start date">
		    </div>

		    <label for="endDate" class="col-sm-1 col-form-label">To:</label>
		     <div class="col-sm-4">
		       <input type="date" class="form-control" id="endDate" name="endDate" placeholder="end date">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="address" class="col-sm-2 col-form-label">Address</label>
		     <div class="col-sm-10">
		     	<textarea class="form-control" id="address" style="width: 100%; height: 80px;" placeholder="residence address"></textarea>
		       
		    </div>
		</div>
		<input type="submit" name="submit" value="Apply" class="btn btn-primary"/>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	</div>
	</div>
  </div>
</div>
<?=$this->endSection()  ?>