<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <div class="section-header">
            <h1>Form Tambah Hasil Perah</h1>
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
                      
                        <form action="<?php echo base_url()?>c_hasilperah/tambahHasilPerah" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <input type="hidden" id="idSapi" name="idSapi" class="form-control" value="<?php echo $idSapi?>" >
                          </div>
                        <?php foreach ($tampil as $key):?>
                          <div class="form-group">
                              <label for="namaSapi">Nama Sapi</label>
                              <input type="text" id="namaSapi" name="namaSapi" class="form-control" value="<?php echo $key ['namaSapi']?>" readonly>
                         </div>
                         <?php endforeach ?>

                          <div class="form-group">
                              <label for="tglPerah">Tanggal Perah</label> 
                              <input type="date" id="tglPerah" name="tglPerah" class="form-control">
                          </div>

                         <div class="form-group">
                              <label for="hasilPerahPagi">Hasil Perah Pagi</label>
                              <input type="number" id="hasilPerahPagi" name="hasilPerahPagi" class="form-control">
                         </div>


                         <div class="form-group">
                              <label for="hasilPerahSore">Hasil Perah Sore</label>
                              <input type="number" name="hasilPerahSore" id="hasilPerahSore" class="form-control">      
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