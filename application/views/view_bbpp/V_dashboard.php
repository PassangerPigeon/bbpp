<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <div class="section-header">
            <h1>Dashboard</h1>
            <br>
          </div>

          <p hidden><?php print_r($this->m_hasilperah->perahSapiTotal())?></p>

          <div class="section-body">
            
            <div class="row">
              <div class="col-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">

                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                                <div class="font-weight-bold text-uppercase mb-1">Total Sapi</div>
                                    <div class="h5 mb-0 font-weight-bold"><?php echo $tampilJumlahSapi ?> Ekor</div>
                                    
                           </div>
                                <div class="col-auto">
                                    <i class="fa fa-paw fa-3x"></i>
                                </div>
                      </div>
          
                    </div>  
                </div>
              </div>

              <div class="col-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">


                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                                <div class="font-weight-bold text-uppercase mb-1">Total Hasil Perah</div>
                                    <div class="h5 mb-0 font-weight-bold"><?php echo $tampilJumlahPerah ?> Liter</div>
                           </div>
                                <div class="col-auto">
                                    <i class="fa fa-wine-bottle fa-3x"></i>
                                </div>
                      </div>
          
                    </div>  
                </div>
              </div>

              <div class="col-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">


                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                                <div class="font-weight-bold text-uppercase mb-1">Total User</div>
                                    <div class="h5 mb-0 font-weight-bold"><?php echo $tampilUser ?> Orang</div>
                           </div>
                                <div class="col-auto">
                                    <i class="fa fa-users fa-3x"></i>
                                </div>
                      </div>
          
                    </div>  
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                     <div class="card-header">
                        <h4>Daftar Sapi</h4>
                    </div>

                    <div class="card-body">
                      <table class="table table-striped" id="halaman_dashboard">
                    
                      <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sapi</th>
                    <th>Tanggal Lahir Sapi</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Berat (Kilogram)</th>
                    <th>Status Laktasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($tampilSapi as $key) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key['namaSapi'] ?></td>
                      <td><?php echo $key['tglLahir'] ?></td>
                      <td><?php echo $key['usia'] ?></td>
                      <td><?php echo $key['sex'] ?></td>
                      <td><?php echo $key['berat'] ?></td>
                      <td><?php echo $key['statLact'] ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>c_sapi/detail_sapi/<?php echo $key['idSapi'] ?>" class="btn btn-success">Lihat Detail</a>
                        <a href="<?php echo base_url() ?>c_hasilperah/tampilHasilPerah/<?php echo $key['idSapi'] ?>" class="btn btn-warning">Hasil Perah</a>
                        <a href="<?php echo base_url() ?>c_inseminasi/lihatInseminasi/<?php echo $key['idSapi'] ?>" class="btn btn-primary">Inseminasi</a>
                        <a href="<?php echo base_url() ?>C_sapi/hapusSapi/<?php echo $key['idSapi'] ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                      </table>
                       <a href="<?php echo base_url() ?>pemesanan">Lihat Daftar Sapi Selengkapnya ............</a>  
                    </div>    
                </div>
                
              </div>
            </div>

            


          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>