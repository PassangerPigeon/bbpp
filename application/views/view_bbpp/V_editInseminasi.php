<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Form Edit Inseminasi</h1>
            <br>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <?php foreach ($tampil as $key) : ?>
                                <a href="<?php echo base_url() ?>C_inseminasi/lihatInseminasi/<?php echo $key['idSapi'] ?>" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
                        </div>

                        <div class="card-body">

                            <form action="<?php echo base_url() ?>C_Inseminasi/editInseminasi/<?php echo $key['idInseminasi'] ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="idSapi" name="idSapi" class="form-control" value="<?php echo $key['idSapi'] ?>" readonly>
                                <div class="form-group">
                                    <label for="namaSapi">Nama Sapi</label>
                                    <input type="text" id="namaSapi" name="namaSapi" class="form-control" value="<?php echo $key['namaSapi'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="asalSperma">Asal Sperma</label>
                                    <input type="text" id="asalSperma" name="asalSperma" class="form-control" value="<?php echo $key['asalSperma'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tglBeranak">Tanggal Beranak Terakhir</label>
                                    <input type="date" name="tglBeranak" id="tglBeranak" class="form-control" value="<?php echo $key['tglBeranak'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="statInseminasi">Status Inseminasi</label>
                                    <select name="statInseminasi" id="statInseminasi" class="form-control">
                                        <option value="Positif" <?php echo $key['statInseminasi'] == "Positif" ? "selected" : null ?>>Positif</option>
                                        <option value="Negatif" <?php echo $key['statInseminasi'] == "Negatif" ? "selected" : null ?>>Negatif</option>
                                        <option value="Belum dikonfirmasi" <?php echo $key['statInseminasi'] == "Belum dikonfirmasi" ? "selected" : null ?>>Sudah Inseminasi, Belum Dikonfirmasi</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tglInseminasi">Tanggal Inseminasi</label>
                                    <input type="date" name="tglInseminasi" id="tglInseminasi" class="form-control" value="<?php echo $key['tglInseminasi'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tglPositif">Tanggal Positif</label>
                                    <input type="date" name="tglPositif" id="tglPositif" class="form-control" value="<?php echo $key['tglPositif'] ?>">
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