<?php
function combotgl1($awal, $akhir, $var, $terpilih){
  echo "<select name=$var class=\"selection\">";
  for ($i=$awal; $i<=$akhir; $i++){
    if ($i==$terpilih)
      echo "<option value=$i selected>$i</option>";
    else
      echo "<option value=$i>$i</option>";
  }
  echo "</select> ";
}

function combobln1($awal, $akhir, $var, $terpilih){
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name=$var class=\"selection\">";
  for ($bln=$awal; $bln<=$akhir; $bln++){
    $lebar=strlen($bln);
    switch($lebar){
      case 1:
      {
        $b="0".$bln;
        break;     
      }
      case 2:
      {
        $b=$bln;
        break;     
      }      
    }  
      if ($bln==$terpilih)
         echo "<option value=$b selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$b>$nama_bln[$bln]</option>";
  }
  echo "</select> ";
}

function combobln3($awal, $akhir, $var, $terpilih){
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name=$var class=\"selection\">
           <option value='' selected>-Pilih-</option>";
  for ($bln=$awal; $bln<=$akhir; $bln++){
    $lebar=strlen($bln);
    switch($lebar){
      case 1:
      {
        $b="0".$bln;
        break;     
      }
      case 2:
      {
        $b=$bln;
        break;     
      }      
    }  
      if ($bln==$terpilih)
         echo "<option value=$b >$nama_bln[$bln]</option>";
      else
        echo "<option value=$b>$nama_bln[$bln]</option>";
  }
  echo "</select> ";
}

function combotgl2($awal, $akhir, $var, $terpilih){
echo "<select name=$var class=\"selection\">";
for ($i=$awal; $i<=$akhir; $i++){
if ($i==$terpilih)
  echo "<option value=$i selected>$i</option>";
else
  echo "<option value=$i>$i</option>";
}
echo "</select> ";
}

function combobln2($awal, $akhir, $var, $terpilih){
include "../config/library.php";
echo "<select name=$var class=\"styledselect-day\">";
for ($bln=$awal; $bln<=$akhir; $bln++){
      if ($bln==$terpilih)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
}
echo "</select> ";
}


function goldar($var){
  $gol=array(1=> "A", "B", "AB", "O", "Other");
  echo "<select name=$var class=\"selection\">";
  echo "<option value=0 >- Pilih -</option>";
  for ($i=0; $i<=4; $i++){
        echo "<option value=$i>$gol[$i]</option>";
  }
  echo "</select> ";
}

?>
