<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Employees
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Employees</li>
      <li class="active">Add/Update Employees</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add/Update Employees Form</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open('dashboard/add_employee_validation'); ?>
            <div class="box-body">
              <?php
                  if ($add_success){
                    echo '<div class="callout callout-info lead">';
                    echo '<p>Reserve successful.</p>';
                    echo '</div>';
                  }

                  if (validation_errors() != NULL){
                    echo '<div class="callout callout-danger lead">';
                    echo '<p>'.validation_errors().'</p>';
                    echo '</div>';
                }
                ?>
              <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="input_name" placeholder="Employee's name" value="<?php $this->input->post('input_name'); ?>">
              </div>
              <div class="form-group">
                <label >Salary</label>
                <input type="text" class="form-control" name="input_salary" placeholder="Employee's salary" value="<?php $this->input->post('input_salay'); ?>">
              </div>
              <div class="form-group">
                <label >Position</label>
                <input type="text" class="form-control" name="input_position" placeholder="Employee's position" value="<?php $this->input->post('input_position'); ?>">
              </div>
              <div class="form-group">
                <label >Hire date</label>
                <input type="date" class="form-control" name="input_hire_date" placeholder="Employee's hire date" value="<?php $this->input->post('input_hire_date'); ?>">
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Add/Update</button>
            </div>
          <?php echo form_close(); ?>
        </div><!-- /.box -->
      </div>
    </div>




  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
