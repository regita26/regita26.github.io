<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE tbl_owner SET 
											atas_nama = '$_POST[atas_nama]',
											alamat = '$_POST[alamat]',
											no_hp = '$_POST[no_hp]'
											where id = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=owner';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=owner';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_owner 
											  VALUES (	'', 
											  		  	'$_POST[atas_nama]', 
											  		  	'$_POST[alamat]',
											  		  	'$_POST[no_hp]'
											  		  ) ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=owner';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=owner';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_owner where id='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vatas_nama = $data['atas_nama'];
				$valamat = $data['alamat'];
				$vno_hp = $data['no_hp'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM tbl_owner WHERE id ='$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=owner';
					  </script>";
			}

		}

		

	}

?>


<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    FORM DATA OWNER
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="atas_nama">Nama</label>
	    <input type="text" class="form-control" id="atas_nama" name="atas_nama" value="<?=@$vatas_nama?>">
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

<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    DATA OWNER
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>Id</th>
    		<th>Nama</th>
    		<th>Alamat</th>
    		<th>NO HP</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from tbl_owner order by id desc");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['atas_nama']?></td>
    		<td><?=$data['alamat']?></td>
    		<td><?=$data['no_hp']?></td>
    		<td>
    			<a href="?halaman=owner&hal=edit&id=<?=$data['id']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=owner&hal=hapus&id=<?=$data['id']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>