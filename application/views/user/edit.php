<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Form Ubah Data User</h6>
                    <a href="<?= base_url('user'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart(''); ?>
                    <?= form_hidden('id', $user_edit->id); ?>
                    <div class="form-group">
                        <label for="name">Nama <sup>*</sup></label>
                        <input type="text" name="name" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" aria-describedby="textHelp" value="<?= (set_value('name', $user_edit->name)); ?>" autofocus>
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <sup>*</sup></label>
                        <input type="text" name="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="textHelp" value="<?= set_value('email', $user_edit->email); ?>">
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <div class="input-group">
                            <input type="password" name="old_password" class="form-control border-right-0 <?= (form_error('old_password')) ? 'is-invalid' : ''; ?>" id="old_password" aria-describedby="oldPasswordHelp" value="<?= set_value('old_password'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text bg-white border-left-0 <?= (form_error('old_password')) ? 'border-danger rounded-right' : ''; ?>">
                                    <a role="button" onclick="previewPassword(this, 'old_password')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                                </div>
                            </div>
                            <?= form_error('old_password'); ?>
                        </div>
                        <small id="oldPasswordHelp" class="form-text text-muted">Biarkan tetap kosong jika tidak akan mengubah password akun anda!</small>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password" class="form-control border-right-0 <?= (form_error('new_password')) ? 'is-invalid' : ''; ?>" id="new_password" value="<?= set_value('new_password'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text bg-white border-left-0 <?= (form_error('new_password')) ? 'border-danger rounded-right' : ''; ?>">
                                    <a role="button" onclick="previewPassword(this, 'new_password')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                                </div>
                            </div>
                            <?= form_error('new_password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role <sup>*</sup></label>
                        <select class="custom-select mr-sm-2<?= (form_error('role')) ? 'is-invalid' : ''; ?>" id="role" name="role">
                            <option value="0">- Pilih -</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r->id; ?>" <?= ($r->id == $user_edit->role_id) ? 'selected' : ''; ?>><?= ucfirst($r->role); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="discount">Gambar</label>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($error) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previewImage()">
                                    <label class="custom-file-label" for="picture"><?= $user_edit->picture; ?></label>
                                    <div class="invalid-feedback"><?= $error; ?></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <img src="<?= base_url('assets/img/user_picture/' . $user_edit->picture); ?>" alt="" class="img-thumbnail img-preview w-75">
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