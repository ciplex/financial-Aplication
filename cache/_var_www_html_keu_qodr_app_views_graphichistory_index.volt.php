

<section class="content">
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
      </div>
</section>

<script>
    //  // LINE CHART
    //  $.ajax({
    //      method : "GET",
    //      dataType: "html",
    //      url : "<?= $this->url->get('Graphichistory/getGraphicHistory') ?>",
    //      success: function(result){
    //         var line = new Morris.Line({
    //             element: 'line-chart',
    //             resize: true,
    //             data: JSON.parse(result),
    //             xkey: 'tanggal',
    //             ykeys: ['nominal'],
    //             labels: ['nominal'],
    //             parseTime: false,
    //             lineColors: ['#3c8dbc'],
    //             hideHover: 'auto'
    //         });
    //      }
    //  });
    
  /* Morris.js Charts */
  // Sales chart
  var area = new Morris.Area({
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
  });

</script>