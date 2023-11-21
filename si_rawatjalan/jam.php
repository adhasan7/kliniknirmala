<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
</style>
</head>

<body>
<div align="right">
  <script type="text/javascript">
	var hari= new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
	var bulan= new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	var t=new Date();
	var hari_ini=hari[t.getDay()];
	var tanggal=t.getDate();
	var bulan_ini=bulan[t.getMonth()];
	var tahun=t.getFullYear();
	var jam=t.getHours();
	var menit=t.getMinutes();
	var detik=t.getSeconds();
	document.write(hari_ini+","+tanggal +" "+ bulan_ini+" "+tahun+" | ");
	document.write(jam+":"+menit+":"+detik);
	</script>
</div>
</body>
</html>
