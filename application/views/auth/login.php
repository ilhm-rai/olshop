<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-5 text-center">
            <img src="<?= base_url('assets/img/favicon/android-chrome-192x192.png'); ?>" alt="" class="rounded-circle mb-3 shadow-sm" style="width: 85px;">
            <h1 class="h4 text-gray-900 mb-4 text-uppercase">Masuk ke DalyRasya</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div class="card o-hidden mb-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('login'); ?>">
                                    <div class="form-group">
                                        <input type="text" inputmode="email" class="form-control form-control-user <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan Alamat Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                        <?= form_error('password'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
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
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="text-center small">
                        Belum punya akun? <a href="<?= base_url('registration'); ?>">
                            Daftar.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>