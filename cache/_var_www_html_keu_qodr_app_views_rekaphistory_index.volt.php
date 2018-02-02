<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Rekap History
      <small>Bulan & Tahun</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Keuangan</a></li>
      <li class="active">Rekap History</li>
    </ol>
</section>
<section class="content">
  <div class="row">
     <div class="col-xs-12">
        <div class="box box-success collapsed-box callout callout-info">
           <div class="box-header with-border">
              <h3 class="box-title">Filter</h3>

              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                 </button>
                 <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
              </div>
           </div>
           <div class="box-body">
              <!-- Date -->
              <div class="row">
                 <div class="col-md-4">
                   <div class="callout callout-success">
                          <select name="Bulan" id="Bulan" class="form-control">
                              <?= $this->Helpers->dataBulan() ?>
                           </select>
                   </div>
                 </div>
                 <div class="col-md-4">
                    <div class="callout callout-success">
                            <select name="Kode" id="Kode" class="form-control">
                       
                              </select>
                          </div>
                      </div>
                 <div class="col-md-4">
                   <div class="callout callout-success">
                          <select name="Tahun" id="Tahun" class="form-control">
                              <?= $this->Helpers->dataTahun() ?>
                           </select>
                        </div>  
                    
                    </div>
                 <!-- end row -->
              </div>
              <!-- /.form group -->

           </div>
           <!-- /.box-body -->
        </div>

        <div class="box box-primary">
           <div class="box-header">
              <h3 class="box-title">Data Table Rekap History</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
              <table id="data_akun" class="table table-bordered table-striped">
                 <thead>
                    <tr>
                       <th>No.</th>
                       <th>Bulan</th>
                       <th>Kode</th>
                       <th>Nominal</th>

                    </tr>
                 </thead>
                 <tbody id="listAkun">

                 </tbody>
              </table>
           </div>
           <!-- /.box-body -->
        </div>
     </div>
  </div>

</section>

<section class="content">
  <div class="box box-info">
      <div class="box-header with-border">
          <h3 class="box-title">Line Chart</h3>

          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body chart-responsive">
          <div class="chart" id="line-chart" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
  </div>
</section>

<script>

  $(document).ready(function() {
     $('#data_akun').DataTable({
        "processing" : false,
        "serverside": true,
        "pageLength": 25,
        "ajax": {
           url: "rekapakun/getAjax",
           type: 'post'
        }
     }),

        $('#Bulan, #Tahun').change(function() {
           $('#data_akun').DataTable().destroy();
           $('#data_akun').DataTable({
              "pageLength": 25,
              "ajax": {
                 url: "rekapakun/getAjax",
                 type: "POST",
                 data: {
                    "Bulan": $('#Bulan').val(), "Tahun": $('#Tahun').val()
                 }
              }
           })

        }),

        $('#data_akun tbody').on( 'click', 'tr', function () {
           var table = $('#data_akun').DataTable();
           console.log( table.row( this  ).data()  );

        }  );
  })
</script>
