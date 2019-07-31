<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>SISTEMA DE ENTREGA</title>

    <!-- Favicons -->
    <link href="<?=base_url()?>img/favicon.png" rel="icon">
    <link href="<?=base_url()?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/buttons.dataTables.min.css"/>

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?=base_url()?>Main" class="logo"><b>RETRA<span>SO</span></b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="<?=base_url()?>Welcome/logout">Salir</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="<?=base_url()?>Main"><img src="<?=base_url()?>img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                <h5 class="centered"><?=$_SESSION['nombre']?></h5>
                <h6 class="centered">Tipo= <?=$_SESSION['tipo']?></h6>
                <?php if ($_SESSION['tipo']=="VENDEDOR"):?>
                    <li>
                        <a href="<?=base_url()?>Clients">
                            <i class="fa fa-user"></i>
                            <span>Controlar clientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>Ciudad">
                            <i class="fa fa-map"></i>
                            <span>Controlar Ciudad</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>Paquetes">
                            <i class="fa fa-plus-circle"></i>
                            <span>Insertar paquetes</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>Seguimiento">
                            <i class="fa fa-pagelines"></i>
                            <span>Realizar seguimiento</span>
                        </a>
                    </li>
                <?php endif;?>
                <?php if ($_SESSION['tipo']=="ADMIN"):?>
                    <li>
                        <a href="<?=base_url()?>Usuarios">
                            <i class="fa fa-users"></i>
                            <span>Controlar usuarios</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>Report">
                            <i class="fa fa-file"></i>
                            <span>Reportes de paquetes</span>
                        </a>
                    </li>
                <?php endif;?>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> <?=$title?></h3>
