<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <div class="section-header">
            <h1>Form Tambah Sapi</h1>
            <br>
          </div>

          <div class="section-body">

          <?php echo $this->session->flashdata('success'); ?>
            
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    
                     <div class="card-header">                 
                        <a href="<?php echo base_url() ?>c_sapi" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
                    </div>

                    <div class="card-body">
                      
                        <form action="<?php echo base_url()?>C_sapi/tambahSapi" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="nama_sapi">Nama Sapi</label>
                              <input type="text" id="nama_sapi" name="nama_sapi" class="form-control" >
                          </div>

                          <div class="form-group">
                              <label for="tanggal_lahir">Tanggal Lahir</label> 
                              <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                          </div>

                         <div class="form-group">
                              <label for="usia">Usia</label>
                              <input type="number" id="usia" name="usia" class="form-control">
                         </div>

                          <div class="form-group">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Betina">Betina</option>
                                <option value="Jantan">Jantan</option>
                              </select>
                         </div>

                         <div class="form-group">
                              <label for="berat">Berat</label>
                              <input type="number" name="berat" id="berat" class="form-control">      
                         </div>

                         <div class="form-group">
                              <label for="jumlahLaktasi">Jumlah Laktasi</label>
                              <input type="number" name="jumlahLaktasi" id="jumlahLaktasi" class="form-control">      
                         </div>

                        <div class="form-group">
                              <label for="statLact">Status Laktasi</label>
                                <select name="statLact" id="statLact" class="form-control">
                                  <option value="">-- Pilih Status Laktasi --</option>
                                  <option value="iya">Iya</option>
                                  <option value="tidak">Tidak</option>
                                </select>
                        </div>

                        <div class="form-group">
                              <label for="gambar">Gambar</label>
                              <input type="file" name="foto_sapi" placeholder="masukkan gambar" class="form-control" required id="gambar">
                        </div>

                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"> Simpan</i></button>  

                    </div>  

                </div>
              </div>
            </div>

          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>