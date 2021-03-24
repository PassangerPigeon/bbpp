<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <div class="section-header">
            <h1>Form Tambah Inseminsasi</h1>
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
                      
                        <form action="<?php echo base_url()?>c_inseminasi/tambahInseminasi" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <input type="hidden" id="idSapi" name="idSapi" class="form-control" value="<?php echo $idSapi?>" >
                          </div>
                        <?php foreach ($tampil as $key):?>
                          <div class="form-group">
                              <label for="namaSapi">Nama Sapi</label>
                              <input type="text" id="namaSapi" name="namaSapi" class="form-control" value="<?php echo $key ['namaSapi']?>">
                         </div>
                         <?php endforeach ?>

                          <div class="form-group">
                              <label for="asalSperma">Asal Sperma</label> 
                              <input type="text" id="asalSperma" name="asalSperma" class="form-control">
                          </div>

                          <div class="form-group">
                              <label for="tglInseminasi">Tanggal Inseminasi</label>
                              <input type="date" name="tglInseminasi" id="tglInseminasi" class="form-control">      
                         </div>

                         <div class="form-group">
                              <label for="statInseminasi">Status Inseminasi</label>
                              <select name="statInseminasi" id="statInseminasi" class="form-control">
                                  <option value="">-- Pilih Status Inseminasi --</option>
                                  <option value="berhasil">Berhasil</option>
                                  <option value="tidak berhasil">Tidak Berhasil</option>
                                </select>
                         </div>

                         <div class="form-group">
                              <label for="tglPositif">Tanggal Positif</label>
                              <input type="date" name="tglPositif" id="tglPositif" class="form-control">      
                         </div>

                         <div class="form-group">
                              <label for="tglBeranak">Tanggal Beranak</label>
                              <input type="date" name="tglBeranak" id="tglBeranak" class="form-control">      
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