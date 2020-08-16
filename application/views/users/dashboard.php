<style type="text/css">
.small-box {
    /* Padding for the whole card */
    padding: 40px !important;
}

.small-box>.inner {
    /* Padding inside the inner contents */
    padding: 20px !important;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        </h1>
    </section>
    <section class="content" style="min-height: 50px !important">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <a href="<?php echo base_url('users?role=all'); ?>">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $totalUsers ?></h3>
                            <h3>All Users</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-6">
                <a href="<?php echo base_url('users?role=admins'); ?>">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $admins; ?></h3>
                            <h3>Admins</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-6">
                <a href="<?php echo base_url('users?role=teachers'); ?>">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $teachers; ?></h3>
                            <h3>Teachers</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-6">
                <a href="<?php echo base_url('users?role=managers'); ?>">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $managers; ?></h3>
                            <h3>Store Keepers</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-6">
                <a href="<?php echo base_url('users?role=students'); ?>">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo $students ?></h3>
                            <h3>Students</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>