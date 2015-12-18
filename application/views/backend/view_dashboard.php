

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Home
            <small>Home</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="row">
            <div class="col-lg-4 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                    $this->db->select_sum('TOTAL');
                    $x = $this->db->get('RECEIPTS');

                    echo '<h3>' .$x->row()->TOTAL. '</h3>';
                  ?>
                  <p>Gross sale</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>

              </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                    $count = $this->db->count_all('USERS');

                    echo '<h3>' .$count. '</h3>';
                  ?>
                  <p>Entry Customer</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div>

          <div class="row">
            <div class="col-md-6">
              <h2>Ordering</h2>
              <?php echo form_open('dashboard/ordering_validation'); ?>

              <div class="row">
            <div class="col-md-8">
              <!-- general form elements -->

              <?php
                  if ($order_success){
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


                <label for="billing_email">
                  Table No.<abbr class="required"></abbr>
                </label>
                <?php
                  $input_tableid = array(
                  'name' => 'table_ID',
                  'class' => 'form-control',
                  'placeholder' => "Table ID",
                  'value' => $this->input->post('table_ID')
                  );
                  echo form_input($input_tableid);
                ?>


                <label for="billing_email">
                Food No.
                <abbr class="required"></abbr>
                </label>
                <?php
                $input_foodid = array(
                'name' => 'food_ID',
                'class' => 'form-control',
                'placeholder' => "Food ID",
                'value' => $this->input->post('food_ID')
                );
                echo form_input($input_foodid);
                ?>

                <label for="billing_email">
                Quantity
                <abbr class="required"></abbr>
                </label>
                <?php
                $input_quanid = array(
                'name' => 'quantity',
                'class' => 'form-control',
                'placeholder' => "Quantity",
                'value' => $this->input->post('quantity')
                );
                echo form_input($input_quanid);
                echo '</br>';
                  $submit = array(
                  'name' => 'food_submit',
                  'value' => 'Submit',
                  'class'=> 'btn btn-primary'
                  );
                echo form_submit($submit);
                ?>

                </div>

              <?php echo form_close(); ?>
            </div>
          </div>




        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
