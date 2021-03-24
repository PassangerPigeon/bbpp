<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            
            <a href="<?php echo base_url(); ?>dist/index"><img src="<?php echo base_url(); ?>assets/img/banner.png" alt="logo" width="150"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
           <a href="<?php echo base_url(); ?>dist/index"><img src="<?php echo base_url(); ?>assets/img/banner.png" alt="logo" width="50"></a>
          </div>
          <ul class="sidebar-menu">

            <li><a class="nav-link" href="<?php echo base_url(); ?>c_dashboard"><i class="far fa-circle"></i> <span>Dashboard</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url(); ?>c_sapi"><i class="far fa-circle"></i> <span>Daftar Sapi</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url(); ?>c_kesehatan"><i class="far fa-circle"></i> <span>Cek Kesehatan</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url(); ?>c_log"><i class="far fa-circle"></i> <span>Laporan Harian</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url(); ?>c_joursmoyen"><i class="far fa-circle"></i> <span>Lihat JMR</span></a></li>

            <li><a class="nav-link" href="<?php echo base_url(); ?>c_user"><i class="far fa-circle"></i> <span>Daftar User</span></a></li>



            <li class="menu-header">Pages</li>
             <li><a class="nav-link" href="<?php echo base_url(); ?>c_user/logout" style="background-color: #db4f40; color: white"><i class="far fa-circle"></i> <span>Logout</span></a></li>
          
          </ul>

          
        </aside>
      </div>
