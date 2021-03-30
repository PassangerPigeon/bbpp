<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Jours Moyen Retard</h1>
            <br>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <a href="<?php echo base_url() ?>c_sapi" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
                        </div>

                        <?php print_r($tglBeranak) ?>

                        <div class="card-body">
                            <table class="table table-striped table-sm">

                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Nama Sapi</th>
                                        <th>Laktasi</th>
                                        <th>VP (Hari)</th>
                                        <th>Tanggal Beranak Terakhir</th>
                                        <th colspan="2">IB</th>
                                        <th>Total IB</th>
                                        <th>Nilai Kebuntingan</th>
                                        <th>Days</th>
                                        <th>Nilai JMR</th>
                                        <th colspan="2">Jarak Waktu</th>
                                        <th>Tanggal Kering</th>
                                        <th>Prediksi Kelahiran Berikutnya</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr align="center">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Pertama</th>
                                        <th>Terakhir</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Partus ke IB</th>
                                        <th>Days Open</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($tampil as $key) : ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $key['namaSapi'] ?></td>
                                            <td><?php echo $key['jumlahLaktasi'] ?></td>
                                            <td><?php echo ($key['jumlahLaktasi'] == 1 ? '80' : ($key['jumlahLaktasi'] > 1) ? '60' : '-') ?></td>
                                            <?php foreach ($tglBeranak as $lahir) : ?>
                                                <td><?php echo $lahir['tglBeranak'] ?></td> <!-- bug gaming -->
                                            <?php endforeach; ?>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                            <td><?php ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>