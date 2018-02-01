<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box box-success collapsed-box">
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
                  <div class="col-xs-6">
                     <select name="Bulan" id="Bulan" class="form-control">
                        <?= $this->Helpers->dataBulan() ?>
                     </select>
                  </div>
                  <div class="col-xs-6">
                     <select name="Tahun" id="Tahun" class="form-control">
                        <?= $this->Helpers->dataTahun() ?>
                     </select>
                  </div>
               </div>
               <!-- /.form group -->

            </div>
            <!-- /.box-body -->
         </div>

         <div class="box box-primary">
            <div class="box-header">
               <h3 class="box-title">Data Table Rekap Akun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="data_akun" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nama</th>
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
