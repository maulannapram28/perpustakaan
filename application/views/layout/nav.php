<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
			
            <li>
                <a  href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
           
                
            </li>	
			                   
            <li><a href="#"><i class="fa fa-user"></i> User/Admin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url('admin/dasbor') ?>">Data User</a></li>
                     <li><a href="<?php echo base_url('admin/user/tambah') ?>">Tambah User</a></li>
                        </ul>
                    </li>
                </ul>
              </li>  
        
        </ul>
       
    </div>
    
</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2><?php echo $title ?></h2>   
               
            </div>
        </div>
         <!-- /. ROW  -->
         <hr />
       
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <?php echo $title ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
