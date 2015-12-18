<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Employees
      <small>..</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('')?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Employees</li>
      <li class="active">ListEmployees</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->

<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Employees Lists</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Salary</th>
                  <th>Position</th>
                  <th>Hire Date</th>
                </tr>
              </thead>
              <?php 
              $query = $this->db->get('EMPLOYEES');
              foreach($query->result() as $row)
              {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td>'.$row->E_ID.'</td>';
                  echo '<td>'.$row->E_NAME.'</td>';
                  echo '<td>'.$row->SALARY.'</td>';
                  echo '<td>'.$row->JOB.'</td>';
                  echo '<td>'.$row->HIRE_DATE.'</td>';
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
