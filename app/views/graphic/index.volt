<section class="content">
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
          {{ Helper.dataKodeTab()}}
          
          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
    </div>

    <div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Area Chart</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body chart-responsive">
        <div class="chart tab-pane" id="revenue-chart"></div>
    <div class="chart tab-pane" id="sales-chart"></div>
    </div>
    <!-- /.box-body -->
    </div>
</section>

<script>
    /* Morris.js Charts */
  // Sales chart
   /*var area = new Morris.Area({
     element   : 'revenue-chart',
     resize    : true,
     data      : [
       { y: '2011 Q1', item1: 2666, item2: 2666 },
       { y: '2011 Q2', item1: 2778, item2: 2294 },
       { y: '2011 Q3', item1: 4912, item2: 1969 },
       { y: '2011 Q4', item1: 3767, item2: 3597 },
       { y: '2012 Q1', item1: 6810, item2: 1914 },
       { y: '2012 Q2', item1: 5670, item2: 4293 },
       { y: '2012 Q3', item1: 4820, item2: 3795 },
       { y: '2012 Q4', item1: 15073, item2: 5967 },
       { y: '2013 Q1', item1: 10687, item2: 4460 },
       { y: '2013 Q2', item1: 8432, item2: 5713 }
     ],
     xkey      : 'y',
     ykeys     : ['item1', 'item2'],
     labels    : ['Item 1', 'Item 2'],
     lineColors: ['#a0d0e0', '#3c8dbc'],
    hideHover : 'auto'
   });*/
   $.ajax({
        method: "POST",
        dataType: "html",
        url: "{{url('Graphic/getGraphic')}}",
        data: {
           "Kode": $(this).data("id"), "Tahun": $('#Tahun_Perbulan').val()
        },
        success: function(result){
            console.log(result);
            var area = new Morris.Area({
            element: 'revenue-chart',
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
    $('#revenue-chart').empty();
     $.ajax({
          method: "POST",
          dataType: "html",
          url: "{{url('Graphic/getGraphicFilter')}}",
          data: {
             "Kode": $(this).data("id"), "Tahun": $('#Tahun_Perbulan').val()
          },
          success: function(result){
              console.log(result);
              var area = new Morris.Area({
              element: 'revenue-chart',
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
</script>