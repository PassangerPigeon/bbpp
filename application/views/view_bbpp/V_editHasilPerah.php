<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Form Edit Hasil Perah</h1>
            <br>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-header">
                        <?php foreach ($tampil as $key) : ?>
                            <a href="<?php echo base_url() ?>c_hasilperah/tampilHasilPerah/<?php echo $key['idSapi']?>" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
                        </div>

                        <div class="card-body">
                            
                                <form action="<?php echo base_url() ?>C_hasilperah/editHasilPerah/<?php echo $key['idPerah'] ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="idSapi" name="idSapi" class="form-control" value="<?php echo $key['idSapi'] ?>" readonly>
                                    <div class="form-group">
                                        <label for="namaSapi">Nama Sapi</label>
                                        <input type="text" id="namaSapi" name="namaSapi" class="form-control" value="<?php echo $key['namaSapi'] ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="tglPerah">Tanggal Perah</label>
                                        <input type="date" id="tglPerah" name="tglPerah" class="form-control" value="<?php echo $key['tglPerah'] ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="hasilPerahPagi">Hasil Perah Pagi</label>
                                        <input type="text" id="hasilPerahPagi" name="hasilPerahPagi" class="form-control" value="<?php echo $key['hasilPerahPagi'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="hasilPerahSore">Hasil Perah Sore</label>
                                        <input type="text" name="hasilPerahSore" id="hasilPerahSore" class="form-control" value="<?php echo $key['hasilPerahSore'] ?>">
                                    </div>
                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"> Simpan</i></button>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>