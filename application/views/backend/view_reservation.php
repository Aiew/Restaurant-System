<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reservation
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Reservation</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


     <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Reservation Lists</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                <tr>
                  <th>Reserve ID</th>
                  <th>Arriving Time</th>
                  <th>Table Number</th>
                  <th>Customer Number</th>
                  <th>Arrive Date</th>
                  <th>Seat</th>
                  <th>Customer Name</th>
                  <th>Customer Phone Number</th>
                  <th>Customer E-mail</th>
                </tr>
              </thead>
              <?php
              $query = $this->db->get('RESERVATIONS');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->R_ID.'</td>';
                  echo '<td>'.$row->ARR_TIME.'</td>';
                  echo '<td><b>'.$row->TABLE_NO.'</b></td>';
                  echo '<td>'.$row->CUS_NO.'</td>';
                  echo '<td>'.$row->ARR_DATE.'</td>';
                  echo '<td>'.$row->SEAT.'</td>';
                  echo '<td>'.$row->CNAME.'</td>';
                  echo '<td>'.$row->CTELE.'</td>';
                  echo '<td>'.$row->CEMAIL.'</td>';
                echo '</tr>';
            }
                ?>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
