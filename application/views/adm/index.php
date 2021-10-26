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

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background: radial-gradient(circle at top left, #7FFF00,#00FFFF 60%);">
		<div class="profile-sidebar">

			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $nama ?></div>

			</div>
			<div class="clear"></div>
		</div>


		<ul class="nav menu">
			<li><a href="<?php echo site_url('Admin'); ?>"><em class="fa fa-home">&nbsp;</em>Home <span class="sr-only">(current)</span></a></li>



			<li><a href="<?php echo site_url('Login/logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>



	</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
	</nav>


	<style type="text/css">
		body {
			<?php echo $url; ?>
		}
	</style>
	<!-- modal -->
	<div class="modal fade bs-example-modal-lg" id="modaledit" role="dialog" aria-labelledby="myLargeModalLabel">

		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Update Alternatif</h4>
				</div>
				<div class="row">
					<div class="col-lg-1">
					</div>
					<div class="col-lg-10">
						<div class="fetched-data"></div>
					</div>
					<div class="col-lg-1">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-lg" id="myModaltambah" role="dialog" aria-labelledby="myLargeModalLabel">

		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah User</h4>
				</div>
				<div class="row">
					<div class="col-lg-1">
					</div>
					<div class="col-lg-10">
						<?php
						$att_input = array(
							'nama_lengkap' => array(
								'class' => 'form-control',
								'placeholder' => 'Nama Lengkap',
								'required' => 'required',
							),
							'username' => array(
								'class' => 'form-control',
								'placeholder' => 'Username',
								'required' => 'required',
							),
							'pw' => array(
								'class' => 'form-control',
								'placeholder' => 'password',
								'required' => 'required',
							)
						);

						echo form_open('Admin/add_user');
						echo form_label('Nama Lengkap', 'nama_lengkap');
						echo form_input('nama_lengkap', '', $att_input['nama_lengkap']);
						echo form_hidden('role', 'peternakayam');
						/*echo form_label('Role', 'role');
                    echo "<select class='form-control' name='role' >";
                    		foreach ($role as $key => $value) {
                    			echo "<option value='$value'>$value</option>";
                    		}
                   	echo "</select>";*/
						echo form_label('Username', 'username');
						echo form_input('username', '', $att_input['username']);
						echo form_label('Password', 'password');
						echo form_password('password', '', $att_input['pw']);
						echo "<input type='submit' class='btn btn-success' value='Tambah'>";
						echo form_close();
						?>
					</div>
					<div class="col-lg-1">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal-->

	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

	<div class="container">
		<div class="row">
			<div class="panel panel-info">
				<div class="panel panel-heading">
					<h3>Info User</h3>
				</div>
				<div class="panel panel-body">
					<div class="col-md-6 text-left">
					</div>
					<div class="col-md-6 text-right">
						<div class="btn-group">
							<a href="#" data-target="#myModaltambah" data-toggle="modal" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</a>
						</div>
					</div>
					<br><br><br>
					<div class="col-lg-12">
						<table width="100%" class="table table-striped table-bordered" id="tabeldata">
							<thead>
								<tr>
									<th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Role</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th><input type="checkbox" name="select-all2" id="select-all2" /></th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Role</th>
									<th>Aksi</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								foreach ($user as $key => $value) {
									$key = $key + 1;
									echo "<tr>
		          				<td></td>
		          				<td>$key</td>
		          				<td>$value->nama_lengkap</td>
		          				<td>$value->role</td>
		          				<td>
		          				<a href='#' data-target='#modaledit' data-toggle='modal' data-id='$value->id' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
                      <a href='" . site_url('Admin/del/' . $value->id . '') . "' onclick='return confirm('Yakin ingin menghapus data')' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
		          				</td>
		          			</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.toastmessage.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#modaledit').on('show.bs.modal', function(e) {
				var rowid = $(e.relatedTarget).data('id');
				//ambil data
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('Admin/get_edit'); ?>',
					data: 'rowid=' + rowid,
					success: function(data) {
						$('.fetched-data').html(data); //tampil data di modal.
					}

				});
			});
		});
	</script>
</body>

</html>