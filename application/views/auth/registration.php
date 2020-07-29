<div class="container">

    <div class="row justify-content-center mt-4">
        <div class="col-lg-5 text-center">
            <img src="<?= base_url('assets/img/favicon/android-chrome-192x192.png'); ?>" alt="" class="rounded-circle mb-3 shadow-sm" style="width: 85px;">
            <h1 class="h4 text-gray-900 mb-4 text-uppercase">Daftar Akun Baru</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div class="card o-hidden">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <?= form_open('auth/registration', 'class="user"'); ?>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" placeholder="Nama Lengkap" name="name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" inputmode="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                        <?= form_error('password'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="repeatPassword" name="repeatPassword" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Lupa password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-sm-12 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="text-center small">
                        Sudah punya akun? <a href="<?= base_url('login'); ?>">Login.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>