<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      อาหาร
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
      <li>อาหาร</li>
      <li class="active">รายการอาหาร</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->


    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Food Lists</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                <tr>
                  <th>ID</th>
                  <th>ชื่ออาหาร</th>
                  <th>ราคา</th>
                  <th>ประเภท</th>
                </tr>
              </thead>
              <?php
              $query = $this->db->get('FOODS');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->F_ID.'</td>';
                  echo '<td>'.$row->F_NAME.'</td>';
                  echo '<td>'.$row->PRICE.'</td>';
                  echo '<td>'.$row->TYPE.'</td>';
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
