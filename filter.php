<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <h1 class="h3 mb-2 text-gray-800">
       Filter Dokumen Arsip 
        <?php if($_SESSION['user']['level']=='admin') : ?>
        <div style="padding: 15px;">
        <h3 style="margin-top: 0;"><b>Laporan Filter Periode Tanggal</b></h3>
        <hr />
        <form method="GET">
			<label>PILIH TANGGAL</label>
			<input type="date" name="dokumen">
			<input type="submit" value="FILTER">
		</form>
          </form>
                 <br>
         <?php else : ?>
                 <div></div>
              <?php endif; ?>
              </h1>
            </div>
    <div class="card-body">
      <div class="table-responsive">
        <table style="font-size: 14px;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Arsip</th>
              <th>Supplier</th>
              <th>Kategori</th>
              <th>Tanggal</th>
             </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
      
            if(isset($_GET['dokumen'])){
              $tgl = $_GET['dokumen'];
              $sql = mysqli_query($koneksi,"select * from dokumen where tanggal='$tgl'");
            }else{
              $sql = mysqli_query($koneksi,"select * from dokumen");
            }
            
            while($data = mysqli_fetch_array($sql)){
		      ?>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['supplier']; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <?php if($_SESSION['user']['level']=='admin') :?>
               </tr>
      
            <?php else : ?>
                <div></div>
              <?php endif; ?>
            </tr>
            <?php $no++; ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>
<!-- /.container-fluid -->
