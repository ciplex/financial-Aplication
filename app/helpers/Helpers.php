<?php
class Helpers
{
    public function dataSatuanBarang($selected = null)
    {
        $dataSatuanBarang = RefSatuanBarang::find();
        $satuanBarang = '<option value="">Pilih Satuan Barang</option>';
        foreach ($dataSatuanBarang as $key => $value) {
            if ($selected == $value->id) {
                $satuanBarang .= '<option value="'.$value->id.'" selected>'.$value->id.' ('.$value->nama.')'.'</option>'; 
            }else{
                $satuanBarang .= '<option value="'.$value->id.'">'.$value->id.' ('.$value->nama.')'.'</option>'; 
            }
        }
        return $satuanBarang;
    }
    public function dataAkun($selected = null)
    {
        $dataRefAkun = RefAkun::find();
       
        $dataAkun = '<option value="">Pilih Data Akun</option>';
        foreach ($dataRefAkun as $key => $value) {
            if ($selected == $value->id) {
                $dataAkun .= '<option value="'.$value->id.'" selected>'.$value->id.' ('.$value->nama.')'.'</option>'; 
            }else{
                $dataAkun .= '<option value="'.$value->id.'" >'.$value->id.' ('.$value->nama.')'.'</option>'; 
            }
        }
        return $dataAkun;
    }

    public function bulan()
    {
    	$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    	for ($i=0; $i < 12; $i++) {
    		echo "<option value=$bulan[$i]>$bulan[$i] </option>";
    	}
    }

    public function dataKode($selected =  null)
   {
      $dataKode = RefAkun::find();

      $Kodebarang = '<option value="">All Kode</option>';
      foreach ($dataKode as $key => $value) {
         if($selected == $value->id){
            $Kodebarang.='<option value="'.$value->id.'" selected>'.$value->nama.'</option>';

         }else{
            $Kodebarang.='<option value="'.$value->id.'">'.$value->nama.'</option>';

         }

      }

      return $Kodebarang;

   }

   

   public function dataKodeTab($selected =  null)
   {
      $dataKode = RefAkun::find();

      foreach ($dataKode as $key => $value) {
         if($selected == $value->id){
            $KodeTab.='<li class="Kode_tab1" data-id="'.$value->id.'" id="'.$value->id.'"><a href="#tab_'.$value->id.'" data-toggle="tab" aria-expanded="false">'.$value->nama.'</a></li>';

         }else{
            $KodeTab.='<li class="Kode_tab1" data-id="'.$value->id.'" id="'.$value->id.'"><a href="#tab_'.$value->id.'" data-toggle="tab" aria-expanded="false">'.$value->nama.'</a></li>';

         }

      }

      return $KodeTab;

   }

   public function dataBulan($selected =  null)
   {
      $Bulan = KeuHarian::find([
         'columns' => 'DATE_FORMAT(tanggal, "%M-%Y") AS Bulan',
         'group' => 'Bulan'
      ]);
      $dataBulan = '<option value="">- Pilih Bulan -</option>';
      foreach ($Bulan as $key => $value) {
         if ($selected == date("M", strtotime($value->Bulan))) {
            $dataBulan.='<option value="'.date("M", strtotime($value->Bulan)).'" selected>'.date('F', strtotime($value->Bulan)).'</option>';
         } else {
            $dataBulan.='<option value="'.date('M',strtotime($value->Bulan)).'" >'.date('F',strtotime($value->Bulan)).'</option>';
            
         }
      }
      return $dataBulan;

   }
   
   public function dataTahun($selected =  null)
   {
      $Bulan = KeuHarian::find([
         'columns' => 'DATE_FORMAT(tanggal, "%Y") AS Tahun',
         'group' => 'Tahun'
      ]);
      $dataBulan = '<option value="">- Pilih Tahun -</option>';
      foreach ($Bulan as $key => $value) {
         if ($selected == $value->Tahun) {
            $dataBulan.='<option value="'.$value->Tahun.'" selected>'.$value->Tahun.'</option>';
         } else {
            $dataBulan.='<option value="'.$value->Tahun.'" >'.$value->Tahun.'</option>';
            
         }
      }
      return $dataBulan;

   }

   public function curlget($url)
    {
        $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url
            ));
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
}
 
