<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin-ikanku.net</title>
  <link rel="icon" type="image/png" href="<?base_url()?>Assets\dist\img/logoikanku.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/dist/css/skins/_all-skins.min.css">
  <!--for Qr Code-->
  <script src="<?=base_url()?>Assets/assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>Assets/assets/js/bootstrap.min.js"></script>
  <!--manifest-->
    <link rel="manifest" href="/manifest.json">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font
  <link rel="stylesheet" href="<//?=base_url()?>Assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('Page/admin')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?=base_url()?>Assets/dist/img/logoikanku.png" alt="image" height="47" weight="47"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ikanku</b>.net</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
              <!--<i class="fa fa-envelope-o"></i>-->
              <!--<span class="label label-success">4</span>-->
            </a>
            <ul class="dropdown-menu">
              <!--<li class="header">You have 4 messages</li>-->
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <!--<a href="#">-->
                      <div class="pull-left">
                        <img src="<?=base_url()?>Assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!--<h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
              <!--<i class="fa fa-bell-o"></i>-->
              <!--<span class="label label-warning">10</span>-->
            </a>
            <ul class="dropdown-menu">
              <!--<li class="header">You have 10 notifications</li>-->
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <!--<i class="fa fa-users text-aqua"></i> 5 new members joined today-->
                    </a>
                  </li>
                </ul>
              </li>
              <!--<li class="footer"><a href="#">View all</a></li>-->
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
              <!--<i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>-->
            </a>
            <ul class="dropdown-menu">
              <!--<li class="header">You have 9 tasks</li>-->
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!--<li><!-- Task item 
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <!--<li class="footer">
                <a href="#">View all tasks</a>-->
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>Assets/dist/img/default-50x50.gif" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->fungsi->user_login()->username?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>Assets/dist/img/default-50x50.gif" class="img-circle" alt="User Image">

                <p><?= $this->fungsi->user_login()->name?>
                
                  <small><?= $this->fungsi->user_login()->keterangan?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url()."profile"?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url()."Auth/logout"?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>