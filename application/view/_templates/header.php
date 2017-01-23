<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zoo de Bougenais</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="<?php echo URL ?>plugins/almasaeed2010/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL ?>plugins/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo URL ?>plugins/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo URL ?>css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo URL ?>" class="logo" >
            <p class="titre_logo" ><span class="lettre_logo" >Z</span>oo de <span  class="lettre_logo">B</span>ougenais</p>
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- logo for regular state and mobile devices -->
            <!--<span class="logo-lg"> <img class="img img-responsive center-block" src="<?php echo URL?>img/zoo_bermal.jpg" style="max-height: 50px"></span>-->
        </a>


        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if (!empty($utilisateur)){ ?>
                    <li>
                        <form id="logout" method="post" action="<?php echo URL ?>auth/post_logout"></form>
                        <a onclick="document.getElementById('logout').submit();" class="btn btn-flat"><i class="fa fa-sign-out"></i> Se deconnecter</a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="<?php echo URL ?>auth/login" class="btn btn-flat"><i class="fa fa-sign-in"></i> Se connecter</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>