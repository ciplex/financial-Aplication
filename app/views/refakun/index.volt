  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default" onclick="return send_data_add();">
      Add Akun
    </button>
    <br>
    <br>
    <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data_Akun" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Periode</th>
                <th>Nominal</th>
                
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody id="listAkun">
              <!-- <?php
              $data_RefAkun = RefAkun::find();
              foreach($data_RefAkun as $k=>$v){
                $sql = "SELECT sum(total_harga) as total FROM KeuHarian 
                    Where tanggal like '2017-10-%' and akun_id='$v->id'"; 
                $query = $this->modelsManager->createQuery($sql);
                $nominal  = $query->execute()->toArray();     
                echo "$v->id | $v->nama | ".$nominal[0]['total']."<br>";
              }
              ?> -->
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      {# new #}
      <form class="addAkun" action="Akun/addAkun" method="post">
        <div class="modal-header">
          <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Akun</h4>
          </div>
          <div class="modal-body">
            <div class="input-group-id">
              <input type="hidden" name="id" class="form-control id"> {# di tambahkan #}
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-Akun-o"></i></span>
              <input type="text" name="cabang_id" class="form-control" placeholder="Cabang ID">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-Akun-o"></i></span>
              <input type="text" name="Akunname" class="form-control" placeholder="Akunname">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="text" name="password" class="form-control" placeholder="Pasword">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-Akun-circle "></i></span>
              <input type="text" name="type" class="form-control" placeholder="type">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btnAction" onclick="return addAkun();">Add Akun</button>
          </div>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content -->
</div>

{#       new   #}
<div class="modal modal-danger" id="modal-delete">
  <div class="modal-dialog">
    <di
 v class="modal-content">
      {# new #}
      <form class="deleteAkun" action="Akun/deleteAkun" method="post">
        <div class="modal-header">
          <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Akun</h4>
          </div>
          <div class="modal-body">
            <div class="input-group-id">
              <input type="hidden" name="id" class="form-control id"> {# di tambahkan #}
            </div>
            Apakah Anda ingin Menghapus Ini ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline btnAction" onclick="return deleteAkun();">Delete Akun</button>
          </div>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<script>
    $(document).ready(function() {
        var dataTable = $('#data_Akun').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "Refakun/getAjax",
                type: "post",
            },
        });
    });
</script>