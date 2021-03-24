<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Form Edit User</h1>
            <br>
        </div>

        <div class="section-body">

            <?php echo $this->session->flashdata('success'); ?>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <a href="<?php echo base_url() ?>c_user" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>
                        </div>

                        <div class="card-body">
                            <?php foreach ($tampil as $key) { ?>
                                <form action="<?php echo base_url() ?>C_user/editUser/<?php echo $key['idUser'] ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="namaUser">Nama User</label>
                                        <input type="text" id="namaUser" name="namaUser" class="form-control" value="<?php echo $key['namaUser'] ?>">
                                    </div>

                                    <div class="form-group <?php echo form_error('username') ? 'has-error' : null ?>">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $key['username'] ?>">
                                        <span class="help-block" style="color: red"><?php echo form_error('username') ?></span>
                                    </div>

                                    <div class="form-group <?php echo form_error('password') ? 'has-error' : null ?>">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="pass" class="form-control">
                                        <span class="help-block" style="color: red"><?php echo form_error('pass') ?></span>
                                    </div>

                                    <div class="form-group <?php echo form_error('konfirmasi_password') ? 'has-error' : null ?>">
                                        <label for="konfirmasi_password">Konfirmasi Password</label>
                                        <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control">
                                        <span class="help-block" style="color: red"><?php echo form_error('konfirmasi_password') ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <option value="kepala kandang" <?php echo $key['jabatan'] == "kepala kandang" ? "selected" : null ?>>Kepala Kandang</option>
                                            <option value="pegawai kandang" <?php echo $key['jabatan'] == "pegawai kandang" ? "selected" : null ?>>Pegawai Kandang</option>
                                            <option value="admin" <?php echo $key['jabatan'] == "admin" ? "selected" : null ?>>Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group <?php echo form_error('nomorTelp') ? 'has-error' : null ?>">
                                        <label for="nomorTelp">Nomor Telepon</label>
                                        <input type="number" name="nomorTelp" id="nomorTelp" class="form-control" value="<?php echo $key['nomorTelp'] ?>">
                                        <span class="help-block" style="color: red"><?php echo form_error('nomorTelp') ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="alamat" value="<?php echo $key['alamat'] ?>"></textarea>
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