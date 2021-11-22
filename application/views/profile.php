<div class="content-wrapper">
<section class="content-header">
      <h1>
       Profile
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('Page')?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Profile</li>
        </ol>
</section>  
<!-- Main content -->
   <section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>Assets/dist/img/default-50x50.gif" alt="User profile picture">

        <h3 class="profile-username text-center"><?= $this->fungsi->user_login()->name?></h3>

        <p class="text-muted text-center"><?= $this->fungsi->user_login()->keterangan?></p>

</section>
<!-- /.content -->
</div>