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
    <div class="nav-tabs-custom">
      <div>
      <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Perhari</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Perbulan</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Pertahun</a></li>
          
          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      </div>
      <div class="box collapsed-box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Filter</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <form method="post" action="pemasukan/filterBulan">
          <div class="box-body">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>Filter akun</h3>

                <div class="form-group">
                  <label>Date range button:</label>

                  <div class="input-group">
                      <select name="bulan" class="form-control">
                          <option selected="selected">Pilih Bulan</option>
                          {{ Helper.bulan()}}
                      </select> 
                  </div>
                </div>
                <!-- form bulan -->
              </div>
              <div class="icon">
                <i class="fa fa-search"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a> -->
              <button type="submit" class="btn btn-primary btn-block btn-flat">Skuy</button>
            </div>
          </div>
        </form>
        <!-- /.box-body -->
      </div>

    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
         <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Rekap Data Perbulan</h3>
                    </div>

                  <div class="box-body">
                    <table id="data_Akun" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Bulan</th>
                          <th>Kode</th>
                          <th>Kategori</th>
                          <th>Nominal</th>
                          
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody id="">
                        <!-- ?php
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
                </div>
            </div>
         </div>  
      </div>
      <!-- /.row -->

      <div class="tab-pane" id="tab_2">
         <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Rekap Data Perbulan</h3>
                    </div>

                  <div class="box-body">
                    <table id="data_Akun_Perbulan" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Bulan</th>
                          <th>Kode</th>
                          <th>Kategori</th>
                          <th>Nominal</th>
                          
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody id="">
                        <!-- ?php
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
                </div>
            </div>
         </div>  
      </div>
      <!-- /.row -->

      <div class="tab-pane" id="tab_3">
         <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Rekap Data Pertahun</h3>
                    </div>

                  <div class="box-body">
                    <table id="data_Akun_Pertahun" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Bulan</th>
                          <th>Kode</th>
                          <th>Kategori</th>
                          <th>Nominal</th>
                          
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody id="">
                        <!-- ?php
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
                </div>
            </div>
         </div>  
      </div>
      <!-- /.row -->

    </div>
  </div>
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

<!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        var dataTable = $('#data_Akun').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "Rekaphistory/getAjax",
                type: "post",
            },
        });

        var dataTable2 = $('#data_Akun_Perbulan').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "Rekaphistory/getAjaxPerbulan",
                type: "post",
            },
        });

        var dataTable3 = $('#data_Akun_Pertahun').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "Rekaphistory/getAjax",
                type: "post",
            },
        });
    });
</script>