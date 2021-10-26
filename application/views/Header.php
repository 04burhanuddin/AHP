<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemilihan Pakan Ayam Broiler</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.toastmessage.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>
    <nav class="navbar navbar-light navbar-fixed-top" style="background-color: #000000;" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#">Desa Mutihan</a>

            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background: radial-gradient(circle at top left, #7FFF00,#00FFFF 70%);">
        <div class="profile-sidebar">

            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?php echo $nama ?></div>

            </div>
            <div class="clear"></div>
        </div>


        <ul class="nav menu">
            <li><a href="<?php echo site_url('peternakayam'); ?>"><em class="fa fa-home">&nbsp;</em>Home <span class="sr-only">(current)</span></a></li>


            <?php if ($role == "peternakayam") : ?>
                <li role="presentation"><a href="<?php echo site_url('kriteria'); ?>"><em class="fa fa-table">&nbsp;</em>Kriteria</a></li>
                <li role="presentation"><a href="<?php echo site_url('alternatif'); ?>"><em class="fa fa-modx">&nbsp;</em>Alternatif</a></li>

            <?php endif; ?>

            <?php if ($role == "peternakayam") : ?>
                <li class="parent "><a data-toggle="collapse" href="#item-1">
                        <em class="fa fa-navicon">&nbsp;</em> Perbandingan <span data-toggle="collapse" href="#item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse " id="item-1">
                        <li role=" presentation"><a href="<?php echo site_url('kriteria/analisa'); ?>">Kriteria</a> </li>
                        <li role="presentation"><a href="<?php echo site_url('alternatif/analisa'); ?>">Alternatif</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($role == "peternakayam") : ?>
                <li class="parent "><a data-toggle="collapse" href="#item-2">
                        <em class="fa fa-navicon">&nbsp;</em> Laporan <span data-toggle="collapse" href="#item-2" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
                    <ul class="children collapse" id="item-2">
                        <li role="presentation"><a href="<?php echo site_url('alternatif/perbandingan_alternatif'); ?>">Hasil Semua Analisa Alternatif</a></li>
                        <li role="presentation"><a href="<?php echo site_url('kriteria/hasil_perhitungan'); ?>">Hasil Akhir</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li><a href="<?php echo site_url('Login/logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
    </nav>

    <div class="container" style="padding: 100px;">
        <div class=" col-lg-12 col-lg-offset-1 ">