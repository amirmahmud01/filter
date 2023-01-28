<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="container">

    <!-- Default Card Example -->
    <?php  
    	error_reporting(0);
      $id_bulanan = $_GET['id_bulanan'];
      $query = $koneksi->query("SELECT * FROM dokumen JOIN bulanan ON dokumen.id_bulanan = bulanan.id_bulanan WHERE dokumen.id_bulanan = bulanan.id_bulanan AND dokumen.id_bulanan = $id_bulanan");
      $data = $query->fetch_assoc();
    ?>
	<h3>Arsip Bulan <?php echo $data['bulan']; ?></h3>
    <div class="row">
    	<?php  
	      $id_bulanan = $_GET['id_bulanan'];
	      $query = $koneksi->query("SELECT * FROM dokumen JOIN bulanan ON dokumen.id_bulanan = bulanan.id_bulanan WHERE dokumen.id_bulanan = bulanan.id_bulanan AND dokumen.id_bulanan = $id_bulanan");
	      while ($data = $query->fetch_assoc()) {
	    ?>
		<div class="card mb-4 col-md-4">
		    <div class="card-header">
		      <?php echo $data['nama']; ?>
		    </div>
		    <div class="card-body">
		    	<?php echo $data['file']; ?>
		    	<p><?php echo $data['tanggal']; ?></p>
		    	<?php if($_SESSION['user']['level']=='admin') : ?>
		    	<a target="_blank" href="page/arsip/file/<?php echo $data['file']; ?>" class="btn btn-sm btn-info"><span class="fa fa-fw fa-print"></span> Cetak</a>
                <a href="?page=ubah-arsip&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-primary"><span class="fa fa-fw fa-edit"></span> Ubah</a>
                <a href="?page=hapus-arsip&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="fa fa-fw fa-trash"></span> Hapus</a>
                <?php else : ?>
                	<div></div>
                <?php endif; ?>
		    </div>
		</div>
		<?php } ?>

    </div>
  </div>
</div>
<!-- /.container-fluid -->
