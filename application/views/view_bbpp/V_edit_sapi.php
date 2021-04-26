<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Form Edit Sapi</h1>
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
                            <?php foreach ($tampil as $key) { ?>
                                <form action="<?php echo base_url() ?>C_sapi/editSapi/<?php echo $key['idSapi'] ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama_sapi">Nama Sapi</label>
                                        <input type="text" id="nama_sapi" name="nama_sapi" class="form-control" value="<?php echo $key['namaSapi'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?php echo $key['tglLahir'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="usia">Usia</label>
                                        <input type="number" id="usia" name="usia" class="form-control" value="<?php echo $key['usia'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="Betina" <?php echo $key['sex'] == "Betina" ? "selected" : null ?>>Betina</option>
                                            <option value="Jantan" <?php echo $key['sex'] == "Jantan" ? "selected" : null ?>>Jantan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="berat">Berat</label>
                                        <input type="number" name="berat" id="berat" class="form-control" value="<?php echo $key['berat'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="statLact">Status Laktasi</label>
                                        <select name="statLact" id="statLact" class="form-control">
                                            <option value="iya" <?php echo $key['statLact'] == "iya" ? "selected" : null ?>>Iya</option>
                                            <option value="tidak" <?php echo $key['statLact'] == "tidak" ? "selected" : null ?>>Tidak</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlahLaktasi">Jumlah Laktasi</label>
                                        <input type="number" name="jumlahLaktasi" id="jumlahLaktasi" class="form-control" value="<?php echo $key['jumlahLaktasi'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="fotoSapi">Foto Sapi</label>
                                        <div>
                                            <img src="<?php echo base_url() ?>upload/<?php echo $key['fotoSapi'] ?>" width="120px" style="margin-bottom: 5px">
                                        </div>
                                        <sub>Note : Format Gambar JPG & PNG , Ukuran Max 2 MB </sub>
                                        <input type="file" name="foto_sapi" placeholder="masukkan gambar" class="form-control" id="fotoSapi">
                                        <input type="hidden" name="fotoSapiLama" value="<?php echo $key['fotoSapi'] ?>">
                                    </div>

                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"> Simpan</i></button>

                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>