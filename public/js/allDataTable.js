 $(document).ready(function() {

        $('#data_Akun').DataTable().destroy();
        $('#data_Akun').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "Rekaphistory/getAjax",
                type: "post",
            }
        }),

         $('#Kode, #Bulan, #Tahun').change(function() {
            $('#data_Akun').DataTable().destroy();
            $('#data_Akun').DataTable({
               "ajax": {
                  url: "Rekaphistory/getAjaxFilter",
                  type: "POST",
                  data: {
                     "Kode": $('#Kode').val(), "Bulan": $('#Bulan').val(), "Tahun": $('#Tahun').val()
                  }
               }
            })
         }),
   

        $( '.Kode_tab1', document.li ).click(function() {
          $('#data_Akun').DataTable().destroy();
            $('#data_Akun').DataTable({
               "ajax": {
                  url: "Rekaphistory/getAjaxFilter",
                  type: "POST",
                  data: {
                     "Kode": $(this).data("id"), "Bulan": $('#Bulan').val(), "Tahun": $('#Tahun').val()
                  }
               }
            })
        });

    $("#Perhari").click(function(){
          $("#ubah_periode").text("Hari");
          $("#ubah_Title").text("Rekap Data Perhari");
          $(".ubah_Bulan").show();
          $(".ubah_Tahun").show();
          $('div .class_periode').attr("class","class_periode col-lg-4");
          $(".ubah_data_Akun").attr("id","data_Akun");

          $(".ubah_Kode").attr("id","Kode");
          $(".ubah_Bulan").attr("id","Bulan");
          $(".ubah_Tahun").attr("id","Tahun");
    });

    $("#Perbulan").click(function(){
          $("#ubah_periode").text("Bulan");
          $("#ubah_Title").text("Rekap Data Perbulan");
          $(".ubah_Bulan").hide();
          $(".ubah_Tahun").show();
          $('div .class_periode').attr("class","class_periode col-lg-6");
          $(".ubah_data_Akun").attr("id","data_Akun_Perbulan");

          $('#data_Akun_Perbulan').DataTable().destroy();
          $('#data_Akun_Perbulan').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": {
                  url: "Rekaphistory/getAjaxPerbulan",
                  type: "post",
              }
          }),

          $(".ubah_Kode").attr("id","Kode_Perbulan");
          $(".ubah_Bulan").attr("id","Bulan_Perbulan");
          $(".ubah_Tahun").attr("id","Tahun_Perbulan");
          $('#Kode_Perbulan, #Bulan_Perbulan, #Tahun_Perbulan').change(function() {
            $('#data_Akun_Perbulan').DataTable().destroy();
            $('#data_Akun_Perbulan').DataTable({
               "ajax": {
                  url: "Rekaphistory/getAjaxFilterPerbulan",
                  type: "POST",
                  data: {
                     "Kode": $('#Kode_Perbulan').val(), "Tahun": $('#Tahun_Perbulan').val()
                  }
               }
            })
         });

          $( '.Kode_tab1', document.li ).click(function() {
            $('#data_Akun_Perbulan').DataTable().destroy();
              $('#data_Akun_Perbulan').DataTable({
                 "ajax": {
                    url: "Rekaphistory/getAjaxFilterPerbulan",
                    type: "POST",
                    data: {
                       "Kode": $(this).data("id"), "Tahun": $('#Tahun_Perbulan').val()
                    }
                 }
              })
          });

      });

       $("#Pertahun").click(function(){
          $("#ubah_periode").text("Bulan");
          $("#ubah_Title").text("Rekap Data Pertahun");
          $(".ubah_Bulan").hide();
          $(".ubah_Tahun").hide();
          $('div .class_periode').attr("class","class_periode col-lg-12");
          $(".ubah_data_Akun").attr("id","data_Akun_Pertahun");

          $('#data_Akun_Pertahun').DataTable().destroy();
          $('#data_Akun_Pertahun').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": {
                  url: "Rekaphistory/getAjaxPertahun",
                  type: "post",
              }
          }),

          $(".ubah_Kode").attr("id","Kode_Pertahun");
          $(".ubah_Bulan").attr("id","Bulan_Pertahun");
          $(".ubah_Tahun").attr("id","Tahun_Pertahun");
          $('#Kode_Pertahun, #Bulan_Pertahun, #Tahun_Pertahun').change(function() {
            $('#data_Akun_Pertahun').DataTable().destroy();
            $('#data_Akun_Pertahun').DataTable({
               "ajax": {
                  url: "Rekaphistory/getAjaxFilterPertahun",
                  type: "POST",
                  data: {
                     "Kode": $('#Kode_Pertahun').val()
                  }
               }
            })
         });

          $( '.Kode_tab1', document.li ).click(function() {
            $('#data_Akun_Pertahun').DataTable().destroy();
              $('#data_Akun_Pertahun').DataTable({
                 "ajax": {
                    url: "Rekaphistory/getAjaxFilterPertahun",
                    type: "POST",
                    data: {
                       "Kode": $(this).data("id")
                    }
                 }
              })
          });

      });
});