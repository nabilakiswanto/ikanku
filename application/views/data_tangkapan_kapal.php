 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          HOME
          <small>ikanku.net</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?=base_url('page')?>"><i class="fa fa-home"></i>Home</a></li>
          <!--<li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>-->
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Hasil Tangkapan Kapal</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Nakhoda</th>
                        <th>No. Keberangkatan</th>
                        <th>Waktu Penangkapan</th>
                        <th>Kode QR</th>
                        <th>Lokasi (lat)</th>
                        <th>Lokasi (lon)</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <!--tampilkan data sesuai dengan db-->
                    <?php $no=1;
                    foreach($kapal as $key=>$data){?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->fishing_master?></td>
                        <td><?=$data->depart_number?></td>
                        <td><?=$data->catch_time?></td>
                        <td><?=$data->qr?></td>
                        <td><?=$data->lat?></td>
                        <td><?=$data->lon?></td>
                        
                    </tr>
                    <?php
                    }?>
                    
                </tbody>
            </table>
          </div>
         
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->