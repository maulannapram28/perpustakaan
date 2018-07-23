<?php
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin/dasbor') ?>">SI Perpus</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo date ('d M Y') ?> &nbsp; 

<a hrefphp="<? echo base_url('admin/dasbor/profile') ?>" class="btn btn-success square-btn-adjust"><i class="fa fa-user"></i> <?php echo $user_aktif->nama ?> (<?php echo $user_aktif->akses_level ?> - <?php echo $user_aktif->email ?>)</a> 

<a href="<?php echo base_url() ?>" class="btn btn-primary square-btn-adjust" target="_blank"><i class="fa fa-home"></i> homepage </a> 
<a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> 

</div>
        </nav>   
           <!-- /. NAV TOP  -->
