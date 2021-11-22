<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>Assets/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->fungsi->user_login()->name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <!--<input type="text" name="q" class="form-control" placeholder="Search...">
          <!--<span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>-->
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <!--set the href to view tangkapan ikan-->
            <li><a href="<?=base_url('Data_tangkapan_ikan')?>"><i class="fa fa-book"></i> Data Tangkapan Ikan</a></li>
            <li><a href="<?=base_url('Data_perjalanan_kapal')?>"><i class="fa fa-book"></i> Data Perjalanan Kapal</a></li>
            <li><a href="<?=base_url('Data_tangkapan_kapal')?>"><i class="fa fa-book"></i> Data Hasil Tangkapan Kapal</a></li>
           
            <!--<li><a href="<?=base_url()?>Assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
          </ul>
        </li>

        <!-- FOR LAYOUT
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>-->

        <!-- CHARTS
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>-->      
                
        <!--FOR REGISTRATION-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i> <span>Data Kapal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--form data kapal-->
             <li><a href="<?= base_url('Vessel') ?>"><i class="fa fa-ship"></i> Data Kapal</a></li>
              <!--form register kapal
            <li><a href="<//?=base_url('vessel_add')?>"><i class="fa fa-pencil-square"></i>Vessels Register</a></li>-->
          </ul>
        </li>

        <!--FOR Admin Data-->
        <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Data Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!--form data admin-->
              <li><a href="<?= base_url('Admin') ?>"><i class="fa fa-user"></i>Data Admin</a></li>
               <!--form register admin-->
              <!--<li><a href="<//?=base_url('admin/add')?>"><i class="fa fa-pencil-square"></i>Admin Register</a></li>-->
            </ul>
          </li>

        <!--FOR QRCODE-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-qrcode"></i> <span>Print QR Code</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--form print qr code-->
            <li><a href="<?=base_url('Make_qr')?>"><i class="fa fa-print"></i> Print QR Code</a></li>
          </ul>
        </li>
    </ul>
    <!--
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Signout</li>
          <li class="treeview">
          <!--logout
          <li><a href="<?= base_url('Auth/logout') ?>"><i class="fa fa-sign-out"></i>Signout</a></li>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          </li>  
      </ul>
    </section>-->

  </aside>