<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Form Ubah Data Produk</h6>
                    <a href="<?= base_url('admin'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart(''); ?>
                    <?= form_hidden('id', $admin->id); ?>
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" aria-describedby="textHelp" value="<?= (set_value('name', $admin->name)); ?>" autofocus>
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">No HP</label>
                        <input type="text" name="phone" class="form-control <?= (form_error('phone')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="textHelp" value="<?= set_value('phone', $admin->phone); ?>">
                        <?= form_error('phone'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">Email</label>
                        <input type="text" name="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="textHelp" value="<?= set_value('email', $admin->email); ?>">
                        <?= form_error('email'); ?>
                    </div>

                    <div class="form-group">
                        <label for="product_description">Alamat</label>
                        <textarea class="form-control" id="address" rows="3" name="address"><?= set_value('address, $admin->address'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-9">
                                <label for="discount">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($error) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previewImage()">
                                    <label class="custom-file-label" for="picture"><?= $admin->picture; ?></label>
                                    <div class="invalid-feedback"><?= $error; ?></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <img src="<?= base_url('assets/img/user_picture/' . $admin->picture); ?>" alt="" class="img-thumbnail w-75 img-preview">
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