<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Stock
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Stock</li>
      <li class="active">list stock</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Stock Lists</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                <tr>
                  <th>Ingredient ID</th>
                  <th>Ingredient Name</th>
                  <th>Expire Date</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <?php 
              $query = $this->db->get('INGREDIENT');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->I_ID.'</td>';
                  echo '<td>'.$row->I_NAME.'</td>';
                  echo '<td>'.$row->EXP_DATE.'</td>';
                  echo '<td>'.$row->QUANTITY.'</td>';
                echo '</tr>';
            }
                ?>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->


  </section><!-- /.content -->



  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
