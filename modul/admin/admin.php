<?php
	
	//uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		
		//pengujian apakah data akan diedit / simpan baru
		if(@$_GET['hal'] == "edit"){
			//perintah edit data
			//ubah data
			$ubah = mysqli_query($koneksi, "UPDATE tbl_admin SET 
											nama_lengkap = '$_POST[nama_lengkap]',
											username = '$_POST[username]',
											password = '$_POST[password]'
											where id_admin = '$_GET[id]' ");
			if($ubah)
			{
				echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=admin';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=admin';
					  </script>";
			}
		}
		else
		{
			//perintah simpan data baru
			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_admin 
											  VALUES (	'', 
											  		  	'$_POST[nama_lengkap]', 
											  		  	'$_POST[username]',
											  		  	'$_POST[password]'
											  		  ) ");
			if($simpan)
			{
				echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=admin';
					  </script>";
			}else
			{
				echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=admin';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_admin where id_admin='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama_lengkap = $data['nama_lengkap'];
				$vusername = $data['username'];
				$vpassword = $data['password'];
			}

		}else{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM tbl_admin WHERE id_admin='$_GET[id]'");
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
    FORM DATA ADMIN
  </div>
  <div class="card-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="nama_lengkap">Nama Lengkap</label>
	    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?=@$vnama_lengkap?>">
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" class="form-control" id="username" name="username" value="<?=@$vusername?>">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="text" class="form-control" id="password" name="password" value="<?=@$vpassword?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    DATA ADMIN
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>Nama Lengkap</th>
    		<th>Username</th>
    		<th>Password</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "SELECT * from tbl_admin order by id_admin desc");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['nama_lengkap']?></td>
    		<td><?=$data['username']?></td>
    		<td><?=$data['password']?></td>
    		<td>
    			<a href="?halaman=admin&hal=edit&id=<?=$data['id_admin']?>" class="btn btn-success" >Edit </a>
    			<a href="?halaman=admin&hal=hapus&id=<?=$data['id_admin']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>