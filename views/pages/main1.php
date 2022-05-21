<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
   <li class="breadcrumb-item" align="center"><a href="#" >Sistem Pakar Diagnosa kerusakan Air Conditioner</a></li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                    </div>
                    <div class="text-value"><?php echo $model->jumlah_kerusakan; ?></div>
                    <div>Data Kerusakan</div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                  <div class="card-body pb-0">
                    <div class="text-value"><?php echo $model->jumlah_gejala; ?></div>
                    <div>Data Gejala</div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                    </div>
                    <div class="text-value"><?php echo $model->jumlah_pengetahuan; ?></div>
                    <div>Data Pengetahuan</div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                    </div>
                    <div class="text-value"><?php echo $model->jumlah_pengguna; ?></div>
                    <div>Data Pengguna</div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
            <div class="card">
              <div class="card-body">
                <div class="row">
      <div class="col-sm-12 col-xl-6">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Informasi Bantuan
                   
                  </div>
                  <div class="card-body">
                    <div id="accordion" role="tablist">
                     <div class="card">
                        <div class="card-header" id="headingOne" role="tab">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Langkah Menggunakan Sistem Pakar</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body"></div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingSix" role="tab">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">Langkah Mengolah Data kerusakan</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseSix" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion">
                          <div class="card-body">
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo" role="tab">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Langkah Mengolah Data Gejala</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body"></div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree" role="tab">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Langkah Mengolah Data Pengetahuan</a>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body"></div>
                        </div>
                      </div>
   

                    </div>
                  </div>
                </div>
              </div>

                </div>
                <!-- /.row-->
      
              </div>
   
            </div>

           
          </div>
        </div>
      </main>
</body>
</html>