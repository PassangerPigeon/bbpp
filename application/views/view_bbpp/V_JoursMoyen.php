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
                                        <th>Penalty</th>
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
                                        <?php
                                        $vp = ($key['jumlahLaktasi'] == 1) ? '80' : (($key['jumlahLaktasi'] > 1) ? '60' : '0');
                                        $nilaiBunting = ($key['statPositif'] == 'Negatif') ? '0' : (($key['statPositif'] == 'Belum dikonfirmasi') ? '1' : (($key['statPositif'] == 'Positif' ? '2' : '-')));
                                        $partus = new DateTime($key['tglBeranakTerakhir']);
                                        $firstIB = new DateTime($key['firstIB']);
                                        $lastIB = new DateTime($key['lastIB']);
                                        $diff = $partus->diff($lastIB)->format('%a');
                                        $days = $diff - $vp;
                                        $serviceD = $firstIB->diff($partus)->format('%a');
                                        $daysOpen = $firstIB->diff($lastIB)->format('%a');
                                        if ($nilaiBunting == '2' || $days < '0') {
                                            $penalty = 0;
                                        } else {
                                            $penalty = $days;
                                        };
                                        $countPredict = $lastIB->add(new DateInterval('P283D'));
                                        $predict = $countPredict->format('Y-m-d');
                                        $kering = $countPredict->sub(new DateInterval('P60D'))->format('Y-m-d') ?>

                                        <tr align="center">
                                            <td><?php echo $no++; ?></td>
                                            <td align="left"><?php echo $key['namaSapi'] ?></td>
                                            <td><?php echo $key['jumlahLaktasi'] ?></td>
                                            <td><?php echo $vp ?></td>
                                            <td><?php echo $key['tglBeranakTerakhir'] ?></td>
                                            <td><?php echo $key['firstIB'] ?></td>
                                            <td><?php echo $key['lastIB'] ?></td>
                                            <td><?php echo $key['jumlahIB'] ?></td>
                                            <td><?php echo $nilaiBunting ?></td>
                                            <td><?php echo $days ?></td>
                                            <td><?php echo $penalty ?></td>
                                            <td><?php echo $serviceD ?></td>
                                            <td><?php echo $daysOpen ?></td>
                                            <td><?php echo $kering ?></td>
                                            <td><?php echo $predict ?></td>
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