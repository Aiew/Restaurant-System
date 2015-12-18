<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      อาหารที่สั่ง
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
      <li>อาหารที่สั่ง</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">อาหารที่สั่ง</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                <tr>
                  <th>รายการอาหาร</th>
                  <th>โต๊ะ</th>
                  <th>จำนวน</th>
                </tr>
              </thead>
              <?php
              $query = $this->db->get('SERVE_TO');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->FOOD_NO.'</td>';
                  echo '<td>'.$row->TABLE_NUM.'</td>';
                  echo '<td>'.$row->QUAN.'</td>';
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
