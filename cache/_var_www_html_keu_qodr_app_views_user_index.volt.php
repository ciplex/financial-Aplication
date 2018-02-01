<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="data_user" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Cabang</th>
                        <th>Username</th>
                        <th>Password</th>

                     </tr>
                  </thead>
                  <tbody id="listUser">

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
      $('#data_user').DataTable({
         "processing" : true,
         "serverside": true,
         "ajax": {
            url: "user/getAjax"
         }
      })
   })
</script>
