<?php

	@$halaman = $_GET['halaman'];

	if($halaman== "admin")
	{
		//tampilakan halaman siswa
		//echo "Tampil Halaman Modul Siswa";
		include "modul/admin/admin.php";
	}
	elseif ($halaman == 'owner') {
		//tampilkan halmaan petugas
		include "modul/data_owner/data_owner.php";
	}
	elseif ($halaman =="pelanggan")
	{
	 	//tampilkan halaman SPP
	 	include "modul/data_pelanggan/data_pelanggan.php";
	}
	elseif ($halaman =='pelanggan')
	{
		//tampilkan halaman Laporan
		if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus"){
			include "modul/data_pelanggan/form.php";
		}else{
			include "modul/pelanggan/data.php";
		}
	}
	else
	{
		//echo "Tampil Halaman Home";
		include "modul/home.php";
	}
?>