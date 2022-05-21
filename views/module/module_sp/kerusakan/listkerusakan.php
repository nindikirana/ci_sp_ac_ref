<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                  <?php echo $this->session->flashdata('tambah');?>
                   <?php echo $this->session->flashdata('ubah');?>
                  <?php echo $this->session->flashdata('hapus');?>
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Tabel Data Kerusakan</div>
                  <div class="card-body">
                    <nav>
                      <form method="post">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url('index.php/data_kerusakan/index?tambah=form_tambah'); ?>">Tambah</a>
                        </li>&nbsp;&nbsp;
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan id atau nama" name="kunci">
                        </li>
                      </ul>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ID KERUSAKAN</th>
                          <th>NAMA KERUSAKAN</th>
                          <th>SOLUSI</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  foreach ($rows as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->id_kerusakan; ?></td>
                          <td><?php echo $row->nama_kerusakan; ?></td>
                          <td><?php echo $row->solusi;?></td>
                          <td>
                            <span class="badge badge-warning"><a href="<?php echo base_url('index.php/data_kerusakan/detail?id_kerusakan='.$row->id_kerusakan); ?>">Detail</a></span>
                            <span class="badge badge-warning"><a href="<?php echo base_url('index.php/data_kerusakan/update?id_kerusakan='.$row->id_kerusakan); ?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="<?php echo base_url('index.php/data_kerusakan/delete?id_kerusakan='.$row->id_kerusakan); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
     <?php 
      } ?>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
      </main>
</body>
</html>