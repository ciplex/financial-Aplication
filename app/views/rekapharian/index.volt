<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="data_keu_harian" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Cabang</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Akun</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Satuan</th>
                        <th>Satuan Barang</th>
                        <th>Total Harga</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Keterangan</th>
                        <th>Pelaku</th>

                     </tr>
                  </thead>
                  <tbody id="listKeuHarian">

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
      $('#data_keu_harian').DataTable({
         "processing" : false,
         "serverside": true,
         "ajax": {
            url: "rekapharian/getAjax"
         }
      })
   })
</script>
