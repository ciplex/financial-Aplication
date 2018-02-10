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
        <ul class="nav nav-tabs" id="Kode_tab">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Periode <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li class="Kode_tab1"><a href="#" id="Perhari">Perhari</a></li>
                  <li><a href="#" id="Perbulan">Perbulan</a></li>
                  <li><a href="#" id="Pertahun">Pertahun</a></li>
                </ul>
              </li>
            <?= $this->Helper->dataKodeTab() ?>
            
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
        <form method="post" action="#">
          <div class="box-body">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>Filter akun</h3>

                <div class="form-group">
                  <label>Filter Berdasarkan :</label>

                  <div class="row">
                      <div class="col-lg-4 class_periode">
                        <select name="Kode" id="Kode" class="form-control ubah_Kode">
                            <?= $this->Helper->dataKode() ?>
                        </select> 
                      </div>

                      <div class="col-lg-4 class_periode">
                        <select name="Bulan" id="Bulan" class="form-control ubah_Bulan">
                            <?= $this->Helper->dataBulan() ?>
                        </select> 
                      </div>

                      <div class="col-lg-4 class_periode">
                        <select name="Tahun" id="Tahun" class="form-control ubah_Tahun">
                            <?= $this->Helper->dataTahun() ?>
                        </select> 
                      </div>
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
              <button type="submit" class="btn btn-primary btn-block btn-flat">Show me</button>
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
                      <h3 class="box-title" id="ubah_Title">Rekap Data</h3>
                    </div>

                  <div class="box-body">
                    <table id="data_Akun" class="ubah_data_Akun table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th id="ubah_periode">Periode</th>
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

      <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">History Chart</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart tab-pane ubah_grafik" id="revenue_chart"></div>
        <div class="chart tab-pane" id="sales-chart"></div>
        </div>
        <!-- /.box-body -->
        </div>

    </div>
 </section>

<?= $this->tag->javascriptInclude('js/allDataTable.js') ?>

<script>
 $(document).ready(function(){
  $("#Perhari").click(function(){
    $(".ubah_grafik").attr("id","revenue_chart");
    $('#revenue_chart').empty();
  });
  $.ajax({
        method: "POST",
        dataType: "html",
        url: "<?= $this->url->get('Graphic/getGraphic') ?>",
        data: {
           "Kode": $(this).data("id")
        },
        success: function(result){
            console.log(result);
            var area = new Morris.Area({
            element: 'revenue_chart',
            resize: true,
            data: JSON.parse(result),
            xkey: 'tanggal',
            ykeys: ['nominal'],
            labels: ['nominal'],
            parseTime: false,
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
            });
        }
    });
   
   $( '.Kode_tab1', document.li ).click(function() {
    $('#revenue_chart').empty();
     $.ajax({
          method: "POST",
          dataType: "html",
          url: "<?= $this->url->get('Graphic/getGraphicFilter') ?>",
          data: {
             "Kode": $(this).data("id")
          },
          success: function(result){
              console.log(result);
              var area = new Morris.Area({
              element: 'revenue_chart',
              resize: true,
              data: JSON.parse(result),
              xkey: 'tanggal',
              ykeys: ['nominal'],
              labels: ['nominal'],
              parseTime: false,
              lineColors: ['#3c8dbc'],
              hideHover: 'auto'
              });
          }
      });
    });

    $('#Kode').change(function() {
      $('#revenue_chart').empty();
         $.ajax({
              method: "POST",
              dataType: "html",
              url: "<?= $this->url->get('Graphic/getGraphicFilter') ?>",
              data: {
                 "Kode": $('#Kode').val()
              },
              success: function(result){
                  console.log(result);
                  var area = new Morris.Area({
                  element: 'revenue_chart',
                  resize: true,
                  data: JSON.parse(result),
                  xkey: 'tanggal',
                  ykeys: ['nominal'],
                  labels: ['nominal'],
                  parseTime: false,
                  lineColors: ['#3c8dbc'],
                  hideHover: 'auto'
                  });
              }
          });
    });

    $("#Perbulan").click(function(){
      $(".ubah_grafik").attr("id","revenue_chart_perbulan");
        $('#revenue_chart_perbulan').empty();
            $.ajax({
            method: "POST",
            dataType: "html",
            url: "<?= $this->url->get('Graphic/getGraphicPerbulan') ?>",
            data: {
               "Kode": $(this).data("id")
            },
            success: function(result){
                console.log(result);
                var area = new Morris.Area({
                element: 'revenue_chart_perbulan',
                resize: true,
                data: JSON.parse(result),
                xkey: 'tanggal',
                ykeys: ['nominal'],
                labels: ['nominal'],
                parseTime: false,
                lineColors: ['#3c8dbc'],
                hideHover: 'auto'
                });
            }
        });
       
       $( '.Kode_tab1', document.li ).click(function() {
        $('#revenue_chart_perbulan').empty();
         $.ajax({
              method: "POST",
              dataType: "html",
              url: "<?= $this->url->get('Graphic/getGraphicFilterPerbulan') ?>",
              data: {
                 "Kode": $(this).data("id")
              },
              success: function(result){
                  console.log(result);
                  var area = new Morris.Area({
                  element: 'revenue_chart_perbulan',
                  resize: true,
                  data: JSON.parse(result),
                  xkey: 'tanggal',
                  ykeys: ['nominal'],
                  labels: ['nominal'],
                  parseTime: false,
                  lineColors: ['#3c8dbc'],
                  hideHover: 'auto'
                  });
              }
          });
        });

        $('#Kode_Perbulan').change(function() {
          $('#revenue_chart_perbulan').empty();
             $.ajax({
                  method: "POST",
                  dataType: "html",
                  url: "<?= $this->url->get('Graphic/getGraphicFilterPerbulan') ?>",
                  data: {
                     "Kode": $('#Kode_Perbulan').val()
                  },
                  success: function(result){
                      console.log(result);
                      var area = new Morris.Area({
                      element: 'revenue_chart_perbulan',
                      resize: true,
                      data: JSON.parse(result),
                      xkey: 'tanggal',
                      ykeys: ['nominal'],
                      labels: ['nominal'],
                      parseTime: false,
                      lineColors: ['#3c8dbc'],
                      hideHover: 'auto'
                      });
                  }
              });
        });
    });

    $("#Pertahun").click(function(){
      $(".ubah_grafik").attr("id","revenue_chart_pertahun");
        $('#revenue_chart_pertahun').empty();
            $.ajax({
            method: "POST",
            dataType: "html",
            url: "<?= $this->url->get('Graphic/getGraphicPertahun') ?>",
            data: {
               "Kode": $(this).data("id")
            },
            success: function(result){
                console.log(result);
                var area = new Morris.Area({
                element: 'revenue_chart_pertahun',
                resize: true,
                data: JSON.parse(result),
                xkey: 'tanggal',
                ykeys: ['nominal'],
                labels: ['nominal'],
                parseTime: false,
                lineColors: ['#3c8dbc'],
                hideHover: 'auto'
                });
            }
        });
       
       $( '.Kode_tab1', document.li ).click(function() {
        $('#revenue_chart_pertahun').empty();
         $.ajax({
              method: "POST",
              dataType: "html",
              url: "<?= $this->url->get('Graphic/getGraphicFilterPertahun') ?>",
              data: {
                 "Kode": $(this).data("id")
              },
              success: function(result){
                  console.log(result);
                  var area = new Morris.Area({
                  element: 'revenue_chart_pertahun',
                  resize: true,
                  data: JSON.parse(result),
                  xkey: 'tanggal',
                  ykeys: ['nominal'],
                  labels: ['nominal'],
                  parseTime: false,
                  lineColors: ['#3c8dbc'],
                  hideHover: 'auto'
                  });
              }
          });
        });

        $('#Kode_Pertahun').change(function() {
          $('#revenue_chart_pertahun').empty();
             $.ajax({
                  method: "POST",
                  dataType: "html",
                  url: "<?= $this->url->get('Graphic/getGraphicFilterPertahun') ?>",
                  data: {
                     "Kode": $('#Kode_Pertahun').val()
                  },
                  success: function(result){
                      console.log(result);
                      var area = new Morris.Area({
                      element: 'revenue_chart_pertahun',
                      resize: true,
                      data: JSON.parse(result),
                      xkey: 'tanggal',
                      ykeys: ['nominal'],
                      labels: ['nominal'],
                      parseTime: false,
                      lineColors: ['#3c8dbc'],
                      hideHover: 'auto'
                      });
                  }
              });
        });
    });

  });
</script>