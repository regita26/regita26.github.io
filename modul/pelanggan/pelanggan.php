<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE pelanggan SET 
											nama = '$_POST[nama]',
											alamat = '$_POST[alamat]',
											no_hp = '$_POST[no_hp]'
											where kode_pelanggan = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=pelanggan';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=pelanggan';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO pelanggan
											  VALUES (	'', 
											  		  	'$_POST[nama]', 
											  		  	'$_POST[alamat]',
											  		  	'$_POST[no_hp]'
											  		  ) ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=pelanggan';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=pelanggan';
					  </script>";
			}

		}


		
	}

	//Uji Jika klik tombol edit / hapus
	if(isset($_GET['hal']))
	{

		if($_GET['hal'] == "edit")
		{

			//tampilkan data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM pelanggan where kode_pelanggan ='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vno_hp = $data['no_hp'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE kode_pelanggan ='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=pelanggan';
					  </script>";
			}

		}

		

	}

?>


<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    FORM DATA PELANGGAN
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="nama">Nama</label>
	    <input type="text" class="form-control" id="nama" name="nama" value="<?=@$vnama?>">
	  </div>
	  <div class="form-group">
	    <label for="alamat">Alamat</label>
	    <input type="text" class="form-control" id="alamat" name="alamat" value="<?=@$valamat?>">
	  </div>
	  <div class="form-group">
	    <label for="no_hp">NO HP</label>
	    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=@$vno_hp?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>
