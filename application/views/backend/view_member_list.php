<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Member
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Member</a></li>
      <li class="active">ListMember</li>
    </ol>
  </section>



  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Member Lists</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Customer ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Points</th>
                  
                </tr>
              </thead>
              <?php 
              $this->db->where('IS_ADMIN','0');
              $query = $this->db->get('USERS');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->ID.'</td>';
                  echo '<td>'.$row->USERNAME.'</td>';
                  echo '<td>'.$row->NAME.'</td>';
                  echo '<td>'.$row->EMAIL.'</td>';
                  echo '<td>'.$row->PHONE.'</td>';
                  echo '<td>'.$row->ADDRESS.'</td>';
                  echo '<td>'.$row->POINT.'</td>';
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
