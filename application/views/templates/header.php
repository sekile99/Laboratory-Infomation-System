<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $pageTitle; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>"
            rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>"
            rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet"
            type="text/css" />
        <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet"
            type="text/css" />
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico');  ?>">
        <style>
        .error {
            color: red;
            font-weight: normal;
        }
        </style>
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
        </script>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url('dashboard'); ?>" class="logo">
                    <span class="logo-mini"><b>LIS</b></span>
                    <span class="logo-lg"><b>Lab Information</b></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-history"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header"> Last Login : <i class="fa fa-clock-o"></i>
                                        <?= empty($last_login) ? "First Time Login" : date('d/m/Y H:i:s', strtotime($last_login)); ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" class="user-image"
                                        alt="User Image" />
                                    <span class="hidden-xs"><?php echo $name; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">

                                        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>"
                                            class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $name; ?>
                                            <small><?php echo $role_text; ?></small>
                                        </p>

                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url('profile'); ?>"
                                                class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i>
                                                Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('logout'); ?>"
                                                class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign
                                                out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li>
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('inventory'); ?>">
                                <i class="fa fa-table"></i>
                                <span>Inventory</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('experiments'); ?>">
                                <i class="fa fa-flask"></i>
                                <span>Experiments Guide</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('elearning'); ?>">
                                <i class="fa fa-book"></i>
                                <span>E-learning</span>
                            </a>
                        </li>
                        <?php
                    if ($role == ROLE_ADMIN) {
                    ?>
                        <li>
                            <a href="<?php echo base_url('users'); ?>">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                        <li>
                            <a href="<?php echo base_url('reports'); ?>">
                                <i class="fa fa-files-o"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('links'); ?>">
                                <i class="fa fa-link"></i>
                                <span>Useful Links</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('chat'); ?>">
                                <i class="fa fa-inbox"></i>
                                <span>Chat</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('logout'); ?>">
                                <i class="fa fa-sign-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>