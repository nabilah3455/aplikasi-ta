<style>
    .brand-logo{
        color: white;
        text-align: center;
        font-size: 23px;
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header" style="background-color: white; background-color: #617be3;">
    <div class="brand-logo">
                LAUNDRY & DRY CLEAN
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header" style="background-color: #617be3;">
    <div class="header-content clearfix">
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown" style="color: white;">
                    <?php if($foto == ''){?>
                        <img src="<?= base_url('assets/'); ?>images/user/no-image.png" height="40" width="40" alt="">
                    <?php }else{?>
                        <img src="<?= base_url('assets/'); ?>images/profile/{foto}" height="40" width="40" alt="">
                    <?php }?>
                        {nama}
                    </div>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <!-- <li>
                                    <a href="<?= base_url('user/profil'); ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                </li> -->
                                <li><a href="<?= base_url('login/logout') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->