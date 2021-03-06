<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemilihan Pakan Ayam Broiler Kualitas Terbaik Desa Mutihan Klaten)</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<style type="text/css">
    body {
        background-image: url("../assets/images/ayam.jpg");
        background-size: cover;
    }
</style>

<body>
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="<?php echo base_url('assets/images/LOGO_KABUPATEN_KLATEN.png'); ?>" style="width: 100px; margin-left: 120px" class="center">
                <div class="text-center"><b>
                        <h3>Peternak Ayam Broiler Desa Mutihan Klaten</h3>
                    </b></div>
                <form action="<?php echo site_url('Login/proses'); ?>" method="POST">
                    <div class="panel panel-dark Login-box">
                        <div class="panel-heading">
                            <h3 class="text-center">LOGIN PETERNAK</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-dark raised btn-block">Login</button>
                            <br>
                            <p class="text-center">Mutihan Gantiwarno Klaten</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <?php if (isset($msg)) : ?>
        <script type="text/javascript">
            swal({
                title: "Maaf Password Salah!",
                type: "error",
                timer: 2000,
                confirmButtonColor: "#556bf"
            })
        </script>
    <?php endif; ?>
</body>

</html>