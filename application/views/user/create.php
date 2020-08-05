<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Form Tambah Data User</h6>
                    <a href="<?= base_url('user'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart() ?>
                    <div class="form-group">
                        <label for="product_name">Nama</label>
                        <input type="text" name="name" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" autofocus value="<?= set_value('name'); ?>">
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">Email</label>
                        <input type="text" name="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="stock">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control border-right-0 <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" value="<?= set_value('password'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text bg-white border-left-0 <?= (form_error('password')) ? 'border-danger rounded-right' : ''; ?>">
                                    <a role="button" onclick="previewPassword(this, 'password')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                                </div>
                            </div>
                            <?= form_error('password'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="custom-select mr-sm-2 <?= (form_error('role')) ? 'is-invalid' : ''; ?>" id="role" name="role">
                            <option value="0">- Pilih -</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r->id; ?>" <?= ($r->id == set_value('role')) ? 'selected' : ''; ?>><?= ucfirst($r->role); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('role'); ?>
                    </div>
                    <div class="form-group">
                        <label for="picture">Gambar</label>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($error) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previewImage()">
                                    <label class="custom-file-label" for="picture">Pilih file</label>
                                    <div class="invalid-feedback"><?= ($error) ? $error : ''; ?></div>
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