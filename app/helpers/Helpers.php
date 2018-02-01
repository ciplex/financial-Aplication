<?php

class Helpers
{
   public function dataKode($selected =  null)
   {
      $dataKode = RefAkun::find();

      $Kodebarang = '<option value="">All Kode</option>';
      foreach ($dataKode as $key => $value) {
         if($selected == $value->id){
            $Kodebarang.='<option value="'.$value->id.'" selected>'.$value->id.'</option>';

         }else{
            $Kodebarang.='<option value="'.$value->id.'">'.$value->id.'</option>';

         }

      }

      return $Kodebarang;

   }

   public function dataBulan($selected =  null)
   {
      $Bulan = KeuHarian::find([
         'columns' => 'DATE_FORMAT(tanggal, "%Y-%m") AS Bulan',
         'group' => 'Bulan'
      ]);
      $dataBulan = '<option value="">- Pilih Bulan -</option>';
      foreach ($Bulan as $key => $value) {
         if ($selected == date("m", strtotime($value->Bulan))) {
            $dataBulan.='<option value="'.date("m", strtotime($value->Bulan)).'" selected>'.date('F', strtotime($value->Bulan)).'</option>';
         } else {
            $dataBulan.='<option value="'.date('m',strtotime($value->Bulan)).'" >'.date('F',strtotime($value->Bulan)).'</option>';
            
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
}
?>
