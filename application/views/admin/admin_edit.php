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
    <?php foreach($admin as $data)?>
      <h1>
       List Admin
        <small>Data Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('Page')?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Edit data admin</li>
        </ol>
</section>

    <!-- Main content -->
<section class="content">
<div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data admin</h3>
            <div class="pull-right">
                <a href="<?=base_url('Admin')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back</a>
            </div>
        </div>
        <div class="box-body table-responsive">

            <div class="row"> 
                <div class="col-md-4 col-md-offset-4">
                    
                    <form action="<?=base_url().'Admin/update';?>" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="hidden" name="id" class="form-control" value="<?=$this->input->post('id')??$data->id?>">
                            <input type="text" name="username" class="form-control" placeholder=" User Name" value="<?=$this->input->post('username')??$data->username?>">
                            <?= form_error('username','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?=$this->input->post('name')??$data->name?>">
                            <?= form_error('name','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password" value="<?=$this->input->post('password')??$data->password?>">
                            <?= form_error('password','<small class="text-danger">','</small>');?>
                        </div>    
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?=$this->input->post('keterangan')??$data->keterangan?>">
                            <?= form_error('keterangan','<small class="text-danger">','</small>');?>
                        </div>
                            <div class="form-group">
                                <label >Role Id</label>
                                    <select name="role_id" class="form-control" value="<?=$this->input->post('role_id')??$data->role_id?>">
                                         <option value="<?=$this->input->post('roleid')??$data->role_id?>">Admin</option>
                                         <option value="2">Admin</option>
                                         <option value="3">Fisher</option>
                                    </select>
                                    <?= form_error('roleid','<small class="text-danger">','</small>');?>
                            </div>
                           
                        <div class="form-group">
                            <label>Is Active</label>
                            <select name="is_active" class="form-control" placeholder="<?=$this->input->post('isactive')??$data->is_active?>">
                                         <option value="<?=$this->input->post('is_active')??$data->is_active?>">Active</option>n>
                                         <option value="0">Not Active</option>
                                    </select>
                            <?= form_error('isactive','<small class="text-danger">','</small>');?>
                        </div>    
                        <!--<div class="form-group">
                            <label>Role</label>
                            <select name="password" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="3">Fisher/Nelayan</option>
                            </select>
                        </div>-->
                        
                        <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat" onclick="return confirm('Are you Sure to Input this Data?')">
                        <i class="fa fa-paper-plane"></i>Save</button>
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