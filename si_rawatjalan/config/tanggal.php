<?php
$NAMA_BULAN = array ("","Januari", "Pebruari", "Maret", 
                     "April","Mei","Juni",
	                 "Juli","Agustus","September", 
			  	     "Oktober", "November", "Desember");

function pilihan_tanggal($nama_tg, $nama_bl, $nama_th,
    $th_awal, $th_akhir,
    $tg_bawaan, $bl_bawaan, $th_bawaan)
{
   global $NAMA_BULAN;
					
   // Tanggal
   print("<select name=\"$nama_tg\">\n");
	
   $ada_selected = FALSE;
   for ($tg=1; $tg <= 31; $tg++)
   {
      if ($tg_bawaan == $tg)
	  {
         $selected = "selected";
	     $ada_selected = TRUE;  
	  }   
	  else
	     $selected = "";  
		  
      print("<option value=\"$tg\" $selected>$tg</option>\n");
		
   }		
	
   if ($ada_selected == FALSE)
	  print("<option value=\"0\" selected></option>\n");

   print("</select>\n");
	
   // Bulan
   print("<select name=\"$nama_bl\">\n");
	
   $ada_selected = FALSE;
   for ($bl=1; $bl <= 12; $bl++)
   {
      if ($bl_bawaan == $bl)
	  {
	     $selected = "selected";
		 $ada_selected = TRUE;
	  }  
	  else
	     $selected = "";  
		  
      print("<option value=\"$bl\" $selected>$NAMA_BULAN[$bl]</option>\n");
   }		
	
   if ($ada_selected == FALSE)
	  print("<option value=\"0\" selected></option>\n");

   print("</select>\n");	
   
   // Tahun
   print("<select name=\"$nama_th\">\n");
	
   $ada_selected = FALSE;
   for ($th=$th_awal; $th <= $th_akhir; $th++)
   {
      if ($th_bawaan == $th)
	  {
	     $selected = "selected";
         $ada_selected = TRUE;
	  }   
	  else
	     $selected = "";  
		  
      print("<option value=\"$th\" $selected>$th</option>\n");
   }		
	
   if ($ada_selected == FALSE)
      print("<option value=\"0\" selected></option>\n");

   print("</select>\n");
}

function my_ke_tgl($tanggal)
// Mengubah format yyyy-mm-dd (format MYSQL) 
//          menjadi dd/mm/yyyy
{
   $y = substr($tanggal,0,4);
   $m = substr($tanggal,5,2);
   $d = substr($tanggal,8,2);
   
   return "$d/$m/$y";
}

function my_ke_tgl2($tanggal)
// Mengubah format yyyy-mm-dd (format MYSQL) 
//          menjadi dd  nama_bulan yyyy
{
   global $NAMA_BULAN;
   
   $y = (integer) substr($tanggal,0,4);
   $m = (integer) substr($tanggal,5,2);
   $d = (integer) substr($tanggal,8,2);
   
   return "$d $NAMA_BULAN[$m] $y";
}

function tgl_ke_my($tg, $bl, $th)
{
   $y = (int) $th;
   $m = (int) $bl;
   $d = (int) $tg;
   
   return sprintf("%04d-%02d-%02d", $y, $m, $d);
}

?>