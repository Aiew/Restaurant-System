<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ใบเสร็จค่าอาหาร
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
      <li>ใบเสร็จค่าอาหาร</li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">ใบเสร็จค่าอาหาร</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                <tr>
                  <th>ID</th>
                  <th>ราคาทั้งหมด</th>
                  <th>พนักงานที่ดูแล</th>
                  <th>เวลา</th>
              
                </tr>
              </thead>
              <?php
              $query = $this->db->get('RECEIPTS');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->B_ID.'</td>';
                  echo '<td>'.$row->TOTAL.'</td>';
                  echo '<td>'.$row->E_NUM.'</td>';
                  echo '<td>'.$row->DATES.'</td>';
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
