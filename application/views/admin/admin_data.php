<div class="content-wrapper">
    <section class="content-header">
        <h1>
            List Admin
            <small>Data Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Page') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Admin</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Admin & Pengguna aplikasi Ikanku</h3>
                <div class="pull-right">
                    <a href="<//?= base_url('admin/add') ?>" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-user-plus"></i>Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Keterangan</th>
                            <th>Role Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--tampilkan data sesuai dengan db-->
                        <?php $no = 1;
                        foreach ($admin->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <!--<td><//?= $data->id ?></td>-->
                                <td><?= $data->username ?></td>
                                <td><?= $data->name ?></td>
                                <td><?= $data->password ?></td>
                                <td><?= $data->keterangan ?></td>
                                <td><?= $data->role_id ?></td>
                                <td><?= $data->is_active ?></td>
                                <td class="text-center" width="160px">
                                    <!--update button-->
                                    <div onclick="javascript:return confirm('Are you Sure to Update this data?')"> <?= anchor('Admin/edit/'.$data->id,'<div class="btn btn-primary btn-xs">
                                    <i class="fa fa-edit"></i>Update</div>')?> </div>
                                    <!--delete button-->
                                    <div onclick="javascript:return confirm('Are you Sure to Delete this data?')"><?= anchor('Admin/del/'.$data->id,'<div class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>Delete</div>')?></div>
                                </td>
                            </tr>
                        <?php }
                        ?>

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
                    <h4 class="modal-title" id="exampleModalLabel">Admin Registration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url() . 'Admin/add' ?>" method="post">
                        <div class="form-group">
                            <label>User Name*</label>
                            <input type="text" name="username" class="form-control" placeholder="User Name" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="text" name="password" class="form-control" placeholder="Password" value="">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Keterangan*</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>">
                            <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Role Id*</label>
                            <select name="role_id" class="form-control" value="<?= set_value('role_id'); ?>">
                                <option value="">-Pilih-</option>
                                <option value="2">Admin</option>
                                <option value="3">Fisher</option>
                            </select>
                            <?= form_error('roleid', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Is Active*</label>
                            <select name="is_active" class="form-control" placeholder="<?= set_value('is_active'); ?>">
                                <option value="">-Pilih-</option>
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
                            <?= form_error('isactive', '<small class="text-danger">', '</small>'); ?>
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