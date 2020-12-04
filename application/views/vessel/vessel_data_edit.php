<head>    
        <meta charset="utf-8" />    
        <title></title>    
        <script>    
            function processData(date) {    
                var v1 = document.getElementById(date).value;        
                alert(v1 + "\n" );    
            }    
        </script>    
    </head>
<div class="content-wrapper">
<section class="content-header">
    <?php foreach($vessel as $data)?>
      <h1>
       Vessel Data
        <small>Data Kapal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('Page')?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Vessel</li>
        </ol>
</section>

    <!-- Main content -->
<section class="content">
<div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data kapal</h3>
            <div class="pull-right">
                <a href="<?=base_url('Vessel')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back</a>
            </div>
        </div>
        <div class="box-body table-responsive">

            <div class="row"> 
                <div class="col-md-4 col-md-offset-4">
                    
                    <form action="<?=base_url().'Vessel/update';?>" method="post">
                        <div class="form-group row row-no-gutters">
                            <div class="col-xs-6 col-sm-3">
                            <label>No. Reg. Kapal</label>
                            <input type="text" name="vessel_number_reg" class="form-control" placeholder="No. Registrasi Kapal" value="<?=$data->vessel_number_reg?>">
                            <?= form_error('vessel_number_reg','<small class="text-danger">','</small>');?>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label>Nama Kapal</label>
                            <input type="text" name="vessel_name" class="form-control" placeholder="Nama Kapal" value="<?=$data->vessel_name?>">
                            <?= form_error('vessel_name','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Perusahaan</label>
                            <input type="text" name="company" class="form-control" placeholder="Nama Perusahaan" value="<?=$data->company?>">
                            <?= form_error('company','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Alat Tangkap</label>
                            <input type="text" name="fishing_gear" class="form-control" placeholder="Nama Alat Tangkap" value="<?=$data->fishing_gear?>">
                            <?= form_error('fishing_gear','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Ukuran Kapal (GT)</label>
                            <input type="text" name="gt" class="form-control" placeholder="Ukuran Kapasitas Kapal" value="<?=$data->gt?>">
                            <?= form_error('gt','<small class="text-danger">','</small>');?>
                        </div>
                            <div class="form-group">
                                <label >Tanggal Reg.</label>
                                    <input type="type" name="date_reg" class="form-control"  placeholder="YYYY/MM/DD" value="<?=$data->date_reg?>">
                                    <?= form_error('date_reg','<small class="text-danger">','</small>');?>
                            </div>
                           
                        <div class="form-group">
                            <label>Tanggal Reg. Berakhir*</label>
                            <input type="text" name="date_reg_end" class="form-control" placeholder="YYYY/MM/DD" value="<?=$data->date_reg_end?>">
                            <?= form_error('date_reg_end','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Nama Nahkoda</label>
                            <input type="text" name="nakhoda" class="form-control" placeholder="Nama Nahkoda" value="<?=$data->nakhoda?>">
                            <?= form_error('nakhoda','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="row row-no-gutters">
                            <div class="col-xs-6 col-sm-3">
                                <label>Username Kapal</label>
                                <input type="text" name="username" class="form-control" placeholder="Username Kapal" value="<?$data->username?>">
                                <?= form_error('username','<small class="text-danger">','</small>');?>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <label>Password Kapal</label>
                                <input type="text" name="password" class="form-control" placeholder="Password" value="<?=$data->password?>">
                                <?= form_error('password','<small class="text-danger">','</small>');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fishing Ground</label>
                            <textarea name="fishing_ground" class="form-control" value=""><?=$data->fishing_ground?></textarea>
                            <?= form_error('fishing_ground','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelabuhan</label>
                            <input type="text" name="port_name" class="form-control" placeholder="Nama Pelabuhan" value="<?=$data->port_name?>">
                            <?= form_error('port_name','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="form-group">
                            <label>Id FMA</label>
                            <input type="text" name="fma_id" class="form-control" placeholder="Id FMA" value="<?=$data->fma_id?>">
                            <?= form_error('fma_id','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="form-group">
                            <label>Nama FMA</label>
                            <input type="text" name="fma" class="form-control" placeholder="Nama FMA" value="<?=$data->fma?>">
                            <?= form_error('fma','<small class="text-danger">','</small>');?>
                        </div>
            
                        <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat" onclick="return confirm('Are you Sure to Input this Data?')"><i class="fa fa-paper-plane"></i>Save</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                        </div>    
                    </form>
                    <??>
                </div>
            </div>
        </div>
    </div>
</section>
</div>