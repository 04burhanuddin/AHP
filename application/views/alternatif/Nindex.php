<?php
if (($this->input->post('hapus-contengan')) > 0) {
  //echo '<script>alert("ada")</script>';
?>
  <script type="text/javascript">
    window.onload = function() {
      showSuccessToast();
      setTimeout(function() {
        window.location.reload(1);
        history.go(0)
        location.href = location.href
      }, 5000);
    };
  </script>
<?php
}
?>

<!-- modal -->
<style type="text/css">
		body {
			<?php echo $url; ?>
		}
	</style>
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

<div class="modal fade bs-example-modal-lg" id="myModalb" role="dialog" aria-labelledby="myLargeModalLabel">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Alternatif / Pakan Ayam Broiler</h4>
      </div>


      <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <form action="<?php echo site_url('alternatif/ins_alternatif'); ?>" method="post" enctype="multipart/form-data">

            <table class="table table-bordered table-resposive">
              <tr>
                <td>No Pakan</td>
                <td> <input type="number" min="1" max="9999999999999999" maxlength="19" name="id" id='idi' required="" class="form-control" placeholder="No Pakan"></td>
              </tr>
              <tr>
                <td>Nama Pakan</td>
                <td> <input type="text" name="nama" required="" class="form-control" placeholder="Nama Pakan"></td>
              </tr>
              <tr>
                <td>Kemasan</td>
                <td><input type="text" name="kemasan" required="" class="form-control" placeholder="Kemasan"></td>
              </tr>
              <tr>
                <td>Asal Barang</td>
                <td><input type="text" name="asal" required class="form-control" placeholder="Asal"></td>
              </tr>
              <tr>
                <td>Jenis Pakan</td>
                <td><input type="text" name="jenis" required class="form-control" placeholder="Jenis Pakan"></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td> <input type="text" name="kategori" required="" class="form-control" placeholder="Kategori"></td>
              </tr>


            </table>
            <input type="submit" name="" class="btn btn-success" value="Tambah">
            </?>
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

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('peternakayam'); ?>">Beranda</a></li>
      <li class="active">Tambah Alternatif / Pakan Ayam Broiler</li>
    </ol>

    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

    <form method="post">
      <div class="row">
        <div class="col-md-6 text-left">
          <strong style="font-size:18pt;"><span class="fa fa-modx"></span> Data Alternatif / Pakan Ayam Broiler</strong>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group">
            <a href="#" data-target="#myModalb" data-toggle="modal" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</a>
          </div>
        </div>
      </div>
      <br />
      <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
          <tr>
            <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
            <th>No Pakan</th>
            <th>Nama Pakan</th>
            <th>Kemasan</th>
            <th>Asal Barang</th>
            <th>Jenis Pakan</th>
            <th>Kategori</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $key => $value) {




            #echo json_encode($date_lahir);

            #              die;


            echo '<tr>
                    <td style="vertical-align:middle;"><input type="checkbox" value="' . $value->id . '" name="checkbox[]" /></td>
                    <td>' . $value->id . '</td>
                    <td>' . $value->nama . '</td>
                    <td>' . $value->kemasan . '</td>
                    <td>' . $value->asal . '</td>
                    <td>' . $value->jenis . '</td>
                    <td>' . $value->kategori . '</td>
                    
                    <td style="text-align:center;vertical-align:middle;">
                   
                      <a href="#" data-target="#modaledit" data-toggle="modal" data-id="' . $value->id . '" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      <a href="' . site_url('alternatif/del_alternatif/' . $value->id) . '" onclick="return confirm("Yakin ingin menghapus data")" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                      

                    </td>
                    </tr>';
          }
          ?>
        </tbody>
      </table>
    </form>
  </div>
</div>

<!-- Default bootstrap modal example -->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nilai Detail</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#modaledit').on('show.bs.modal', function(e) {
      var rowid = $(e.relatedTarget).data('id');
      //ambil data
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('alternatif/get_edit'); ?>',
        data: 'rowid=' + rowid,
        success: function(data) {
          $('.fetched-data').html(data); //tampil data di modal.
        }

      });
    });
  });
</script>