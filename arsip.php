<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <h1 class="h3 mb-2 text-gray-800">
        Dokumen Arsip 
        <?php if($_SESSION['user']['level']=='admin') : ?>
        <a href="?page=tambah-arsip" class="btn btn-sm btn-success">
          <span class="fa fa-fw fa-edit"></span> 
          Tambah Arsip
        </a>
        <a href="?page=filter" class="btn btn-sm btn-success">
          <span class="fa fa-fw fa-edit"></span> 
          Riport
        </a>
        <a>
        <form method="POST">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <br>
                        <div class="input-group">
                            <input type="date" name="dari" class="form-control">
                            <input type="date" name="ke" class="form-control ml-3">
                        </div>
                        <br>
                        <button type="submit" value="filter" class="btn btn-primary">Filter</button>
                      </div>
                  </div>
            </div>
        </form>
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
              <th>Tipe Dokumen</th>
              <th>Kategori</th>
              <th>Bulan</th>
              <th>Tanggal</th>
              <?php if($_SESSION['user']['level']=='admin') : ?>
              <th>Opsi</th>
              <?php else : ?>
                <div></div>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
      <?php
            //jika tanggal dari dan tanggal ke ada maka
            if (isset($_tanggal['tanggal'])) {
              $awal = $_POST['dari'];
              $akhir = $_POST['ke'];
              $query = $koneksi->query("SELECT * FROM dokumen JOIN tanggal  WHERE nama LIKE '%".$cari."%' OR tanggal LIKE '%".$cari."%'");
              $_tanggal = $query->fetch_assoc();

            }  else {$no = 1;
              $query = $koneksi->query("SELECT * FROM dokumen JOIN bulanan ON dokumen.id_bulanan = bulanan.id_bulanan ORDER BY id DESC");
            }
              while ($data = $query->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['supplier']; ?></td>
              <td>
                <?php  
                  $file = explode(".", $data["file"]);
                  echo strtoupper($file[1]);
                ?>
              </td>
              <td><?php echo $data['kategori']; ?></td>
              <<td><?php echo $data['bulan']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <?php if($_SESSION['user']['level']=='admin') : ?>
              <td>
                <a href="page/arsip/file/<?php echo $data['file']; ?>" class="btn btn-sm btn-info"><span class="fa fa-fw fa-print"></span></a>
                <a href="?page=ubah-arsip&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-primary"><span class="fa fa-fw fa-edit"></span></a>
                <a href="?page=hapus-arsip&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="fa fa-fw fa-trash"></span></a>
              </td>
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
