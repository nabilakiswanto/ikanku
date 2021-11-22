<!DOCTYPE html>
<html lang="en">

<head>
   
    <link rel="manifest" href="manifest.json">
    <link rel="canonical" href="https://ikanku.net/Auth">
    <link rel="apple-touch-icon" href="images/icons/maskable_icon1.png">
    <meta name="theme-color" content="#3367D6">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="login-ikanku">
    <meta name="author" content="nabila">

    <title>ikanku.net </title> <!--<//?= $title?>-->
    <link rel="icon" type="image/png" href="images/icons/logoikanku.webp">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('Assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('Assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                
                                <img src="<?=base_url()?>Assets/dist/img/logoikan1.png" class="img-circle" alt="logo ikanku.net" style="width:160px;height:160px;">
                                <br></br>    
                                <h1 class="h4 text-gray-900 mb-4">Welcome to ikanku.net</h1>
                                </div>
                                <!--</?= $this->session->flashdata('message'); ?>-->
                                <!--echo message congratulation-->
                                <!--input form-->
                                <?php
                                    if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message');
                                    }//tampilkan flash data 'message'
                                ?>
                                <form class="user" method="post" action="<?=base_url('Auth/process')?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username" value="">
                                        <!--<//?= form_error('username','<//small class="text-danger">','</small>');?>-->
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password" >
                                        
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <!--button to install-->
                                    <script
                                          type="module"
                                          src="https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall">
                                    </script>
                                        <pwa-install>Click the button to install</pwa-install> 
                                    

                                    
                                </form>
                             
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!--register sw-->
<script>
// Check that service workers are supported
if ('serviceWorker' in navigator) {
  // Use the window load event to keep the page load performant
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/pwabuilder-sw.js');
  });
}
</script>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('Assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('Assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('Assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('Assets/'); ?>js/sb-admin-2.min.js"></script>
   


</script>
<script type="module">
    import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

const el = document.createElement('pwa-update');
document.body.appendChild(el);
</script>
</body>

</html>