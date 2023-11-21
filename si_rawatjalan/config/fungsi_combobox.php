<?php
function combotgl($awal, $akhir, $var, $terpilih){
  echo "<select name=$var class=\"selection\">";
  for ($i=$awal; $i<=$akhir; $i++){
    $lebar=strlen($i);
    switch($lebar){
      case 1:
      {
        $g="0".$i;
        break;     
      }
      case 2:
      {
        $g=$i;
        break;     
      }      
    }  
    if ($i==$terpilih)
      echo "<option value=$g selected>$g</option>";
    else
      echo "<option value=$g>$g</option>";
  }
  echo "</select> ";
}

function combobln($awal, $akhir, $var, $terpilih){
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
         echo "<option value=$b selected>$b</option>";
      else
        echo "<option value=$b>$b</option>";
  }
  echo "</select> ";
}


function combothn($awal, $akhir, $var, $terpilih){
  echo "<select name=$var class=\"selection\" id=$var>";
  for ($i=$awal; $i<=$akhir; $i++){
    if ($i==$terpilih)
      echo "<option value=$i>$i</option>
	  <option value='' selected>- Pilih -</option>";
    else
      echo "<option value=$i>$i</option>";
  }
  echo "</select> ";
}
function combothn2($awal, $akhir, $var, $terpilih){
if($terpilih==''){
  echo "<select name=$var class=\"selection\">";
  for ($i=$awal; $i<=$akhir; $i++){
      echo "<option value=$i>$i</option>";
  }
      echo "<option value='' selected>- Pilih -</option>";
  echo "</select> ";
}else{
  echo "<select name=$var class=\"selection\">";
  for ($i=$awal; $i<=$akhir; $i++){
    if ($i==$terpilih)
      echo "<option value=$i selected>$i</option>";
    else
      echo "<option value=$i>$i</option>";
  }
      echo "<option value=''>- Pilih -</option>";
  echo "</select> ";
}
}
?>
