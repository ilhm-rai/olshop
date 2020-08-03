<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Form Tambah Data Admin</h6>
                    <a href="<?= base_url('admin'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart() ?>
                    <div class="form-group">
                        <label for="product_name">Nama Admin</label>
                        <input type="text" name="name" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" aria-describedby="textHelp" autofocus value="<?= set_value('name'); ?>">
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">No HP</label>
                        <input type="text" name="phone" class="form-control <?= (form_error('phone')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="textHelp" value="<?= set_value('phone'); ?>">
                        <?= form_error('phone'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">Email</label>
                        <input type="text" name="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="textHelp" value="<?= set_value('email'); ?>">
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">Passoword</label>
                        <input type="password" name="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="textHelp" value="<?= set_value('password'); ?>">
                        <?= form_error('password'); ?>
                    </div>

                    <div class="form-group">
                        <label for="product_description">Alamat</label>
                        <textarea class="form-control" id="address" rows="3" name="address"><?= set_value('address'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="picture">Gambar</label>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($error) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previewImage()">
                                    <label class="custom-file-label" for="picture">Pilih file</label>
                                    <div class="invalid-feedback"><?= $error; ?></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <img src="<?= base_url('assets/img/user_picture/default.png'); ?>" alt="" class="img-thumbnail w-75 img-preview">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>