
<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE pelanggan SET 
											tanggal_booking = '$_POST[tanggal_booking]',
											nama = '$_POST[nama]',
											alamat = '$_POST[alamat]',
											no_hp = '$_POST[no_hp]',
											treatment = '$_POST[treatment]',
											harga = '$_POST[harga]',
											pembayaran = '$_POST[pembayaran]'
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
											  		  	'$_POST[tanggal_booking]', 
											  		  	'$_POST[nama]', 
											  		  	'$_POST[alamat]',
											  		  	'$_POST[no_hp]',
											  		  	'$_POST[treatment]',
											  		  	'$_POST[harga]',
											  		  	'$_POST[pembayaran]'  
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
				$vtanggal_booking = $data['tanggal_booking'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vno_hp = $data['no_hp'];
				$vtreatment = $data['treatment'];
				$vharga = $data['harga'];
				$vpembayaran = $data['pembayaran'];

			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE kode_pelanggan='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=admin';
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
	    <label for="tanggal_booking">Tanggal Booking </label>
	    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" value="<?=@$vtanggal_booking?>">
	  </div>
	  <div class="form-group">
	    <label for="nama">Nama </label>
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
	  <div class="form-group">
	    <label for="treatment">Treatment </label>
	    <input type="text" class="form-control" id="treatment" name="treatment" value="<?=@$vtreatment?>">
	  </div>
	  <div class="form-group">
	    <label for="harga">Harga </label>
	    <input type="text" class="form-control" id="harga" name="harga" value="<?=@$vharga?>">
	  </div>
	  <div class="form-group">
	    <label for="pembayaran">Pembayaran </label>
	    <input type="text" class="form-control" id="pembayaran" name="pembayaran" value="<?=@$vpembayaran?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div><div class="card mt-3">
  <div class="card-header bg-info text-white ">
    DATA PELANGGAN
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>Kode Pelanggan</th>
    		<th>Tanggal Booking</th>
    		<th>Nama</th>
    		<th>Alamat</th>
    		<th>NO HP</th>
    		<th>Treatment</th>
    		<th>Harga</th>
    		<th>Pembayaran</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from pelanggan order by kode_pelanggan desc");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['tanggal_booking']?></td>
    		<td><?=$data['nama']?></td>
    		<td><?=$data['alamat']?></td>
    		<td><?=$data['no_hp']?></td>
    		<td><?=$data['treatment']?></td>
    		<td><?=$data['harga']?></td>
    		<td><?=$data['pembayaran']?></td>
    		<td>
    			<a href="?halaman=pelanggan&hal=edit&id=<?=$data['kode_pelanggan']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=pelanggan&hal=hapus&id=<?=$data['kode_pelanggan']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>