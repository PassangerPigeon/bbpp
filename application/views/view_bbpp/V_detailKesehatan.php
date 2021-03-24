<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Detail Pengecekan Kesehatan Sapi</h1>
            <br>


        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="row">
                            <div class="card-header col-10">
                                <a href="<?php echo base_url() ?>c_kesehatan" class="btn btn-primary"><i class="fas fas-caret_left"></i> Kembali</a>
                            </div>
                            <?php foreach ($tampil as $key) : ?>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-6 col-md-6 col-lg-6">
                                    <img src="<?php echo base_url() ?>upload/sapi.png" height="350" width="350" class="card-img-top">
                                </div>

                                <div class="col-6 col-md-6 col-lg-6">
                                    <table class="table">

                                        <tr>
                                            <td>Nama Sapi</td>
                                            <td>:</td>
                                            <td><?php echo $key['namaSapi'] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Tanggal Pengecekan Kesehatan</td>
                                            <td>:</td>
                                            <td><?php echo $key['tglCek'] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?php echo $key['statusCek'] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Detail Penyakit</td>
                                            <td>:</td>
                                            <td><?php echo $key['detilCekKesehatan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                   <a href="<?php echo base_url() ?>c_kesehatan" class="btn btn-primary" onclick="return confirm('apakah perlu kedokter')">Verifikasi</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php $this->load->view('dist/_partials/footer'); ?>