<body>
<div class="content-wrapper">
<section class="content-header">
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
            <h3 class="box-title">Data kapal</h3>
            <div class="pull-right">
                <a href="<//?=base_url('vessel_add')?>" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-user-plus"></i>Create</a>
            </div>
        </div>
        <div class="box-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id vessel</th>
                        <th>No. reg kapal</th>
                        <th>Nama kapal</th>
                        <th>Perusahaan</th>
                        <th>Alat tangkap</th>
                        <th>Ukuran kapal(GT)</th>
                        <th>Tanggal reg</th>
                        <th>Tanggal reg berakhir</th>
                        <th>Nama nahkoda</th>
                        <th>Username kapal</th>
                        <th>Fishing ground</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!--tampilkan data sesuai dengan db-->
                    <?php $no=1;
                    foreach($vessel->result() as $key=>$data){?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->id_vessel?></td>
                        <td><?=$data->vessel_number_reg?></td>
                        <td><?=$data->vessel_name?></td>
                        <td><?=$data->company?></td>
                        <td><?=$data->fishing_gear?></td>
                        <td><?=$data->gt?></td>
                        <td><?=$data->date_reg?></td>
                        <td><?=$data->date_reg_end?></td>
                        <td><?=$data->nakhoda?></td>
                        <td><?=$data->username?></td>
                        <td><?=$data->fishing_ground?></td>
                        <td class="text-center" width="160px">
                            <!--update button-->
                            <div onclick="javascript:return confirm('Are you Sure to Update this data?')"> <?= anchor('Vessel/edit/'.$data->id_vessel,'<div class="btn btn-primary btn-xs">
                            <i class="fa fa-edit"></i>Update</div>')?> </div>
                            <!--delete button-->
                            <div onclick="javascript:return confirm('Are you Sure to Delete this data?')"><?= anchor('Vessel/del/'.$data->id_vessel,'<div class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>Delete</div>')?></div>
                        </td>
                    </tr>
                    <?php
                    }?>
                    
                </tbody>
            </table>
        </div>
    </div>
</section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Vessel Registration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url() . 'Vessel/add' ?>" method="post">
                    <div class="form-group row row-no-gutters">
                            <div class="col-xs-6 col-sm-3">
                            <label>No. Reg. Kapal*</label>
                            <input type="text" name="vessel_number_reg" class="form-control" placeholder="No. Registrasi Kapal" value="<?=set_value('vessel_number_reg');?>">
                            <?= form_error('vessel_number_reg','<small class="text-danger">','</small>');?>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label>Nama Kapal*</label>
                            <input type="text" name="vessel_name" class="form-control" placeholder="Nama Kapal" value="<?=set_value('vessel_name');?>">
                            <?= form_error('vessel_name','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Perusahaan*</label>
                            <input type="text" name="company" class="form-control" placeholder="Nama Perusahaan" value="<?=set_value('company');?>">
                            <?= form_error('company','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Alat Tangkap*</label>
                            <input type="text" name="fishing_gear" class="form-control" placeholder="Nama Alat Tangkap" value="<?=set_value('fishing_gear');?>">
                            <?= form_error('fishing_gear','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Ukuran Kapal (GT)*</label>
                            <input type="text" name="gt" class="form-control" placeholder="Ukuran Kapasitas Kapal" value="<?=set_value('gt');?>">
                            <?= form_error('gt','<small class="text-danger">','</small>');?>
                        </div>
                            <div class="form-group">
                                <label >Tanggal Reg.*</label>
                                    <input type="type" id="date_reg"name="date_reg" id="datereg" class="form-control"  placeholder="YYYY/MM/DD" value="<?=set_value('date_reg');?>">
                                    <?= form_error('date_reg','<small class="text-danger">','</small>');?>
                            </div>
                           
                        <div class="form-group">
                            <label>Tanggal Reg. Berakhir*</label>
                            <input type="text" id="date_reg_end" name="date_reg_end" class="form-control" placeholder="YYYY/MM/DD" value="<?=set_value('date_reg_end');?>">
                            <?= form_error('date_reg_end','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Nama Nahkoda*</label>
                            <input type="text" name="nakhoda" class="form-control" placeholder="Nama Nahkoda" value="<?=set_value('nakhoda');?>">
                            <?= form_error('nakhoda','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="row row-no-gutters">
                            <div class="col-xs-6 col-sm-3">
                                <label>Username Kapal</label>
                                <input type="text" name="username" class="form-control" placeholder="Username Kapal" value="<?=set_value('username');?>">
                                <?= form_error('username','<small class="text-danger">','</small>');?>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <label>Password Kapal</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" value="<?=set_value('password');?>">
                                <?= form_error('password','<small class="text-danger">','</small>');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fishing Ground*</label>
                            <textarea name="fishing_ground" class="form-control"placeholder="Area Penangkapan" value="<?=set_value('fishing_ground');?>"></textarea>
                            <?= form_error('fishing_ground','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelabuhan*</label>
                            <input type="text" name="port_name" class="form-control" placeholder="Nama Pelabuhan" value="<?=set_value('port_name');?>">
                            <?= form_error('port_name','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="form-group">
                            <label>Id FMA</label>
                            <input type="text" name="fma_id" class="form-control" placeholder="Id FMA" value="<?=set_value('fma_id');?>">
                            <?= form_error('fma_id','<small class="text-danger">','</small>');?>
                        </div>
                        <div class="form-group">
                            <label>Nama FMA</label>
                            <input type="text" name="fma" class="form-control" placeholder="Nama FMA" value="<?=set_value('fma');?>">
                            <?= form_error('fma','<small class="text-danger">','</small>');?>
                        </div>
                        <!--button form-->
                        <button type="submit" class="btn btn-success btn-flat" onclick="return confirm('Are you Sure to Input this Data?')"><i class="fa fa-paper-plane"></i>Save</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>