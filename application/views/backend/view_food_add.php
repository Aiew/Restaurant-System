<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Stock
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../../starter.html"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Stock</li>
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
            <h3 class="box-title">Add/Update Stock Form</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <?php echo form_open('dashboard/add_ingredient_validation'); ?>
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
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="input_name" value="<?php $this->input->post('input_name'); ?>" placeholder="Ingredient's Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Expire</label>
                <input type="date" class="form-control" name="input_expire_date" value="<?php $this->input->post('input_expire_date'); ?>" placeholder="Ingredient's expire date">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="text" class="form-control" name="input_quatity" value="<?php $this->input->post('input_quatity'); ?>" placeholder="Ingredient's quantity">
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
