<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Table
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Table</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


   <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Table Lists</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Table ID</th>
                  <th>Status</th>
                  <th>Customer Number</th>
                  <th>Max Seat</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <?php
              $query = $this->db->get('TABLES');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->T_ID.'</td>';
                  echo '<td>'.((!$row->STATUS)?"<b><font color=\"green\">Avaliable</font></b>":"<b><font color=\"red\">Busy</font></b>") .'</td>';
                  echo '<td>'.$row->E_NO.'</td>';
                  echo '<td>'.$row->MAX_SEAT.'</td>';
                  if ($row->STATUS == 0) {
                    echo '<td>';
                      echo form_open('dashboard/checkInMember/'.$row->T_ID);
                      echo '<input type="text" name="cus_id" placeholder="Customer ID">&nbsp;&nbsp;&nbsp;&nbsp;';
                      echo '<input type="submit" value="Member Checkin" class="btn btn-primary">';
                      echo form_close();
                      echo '<td><a href="' .site_url('dashboard/checkIn/'.$row->T_ID). '"><button type="button" class="btn btn-primary">Checkin</button></a></td>';
                      echo '</td>';
                  } else if ($row->STATUS == 1) {
                      echo '<td><a href="' .site_url('dashboard/checkOut/'.$row->T_ID). '"><button type="button" class="btn btn-primary">Checkout</button></a></td>';
                  }
                  //echo '<td>'.$row->TIMER.'</td>';
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
