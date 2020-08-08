<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Ubah Jasa Pengiriman</h6>
                    <a href="<?= base_url('shippers'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                    <div class="form-group">
                        <label for="company_name">Perusahaan Jasa Pengiriman</label>
                        <input type="text" name="company_name" class="form-control <?= (form_error('company_name')) ? 'is-invalid' : ''; ?>" id="company_name" aria-describedby="textHelp" autofocus value="<?= (set_value('company_name') ? set_value('company_name') : $shippers->company_name); ?>">
                        <?= form_error('company_name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <textarea class="form-control <?= (form_error('phone')) ? 'is-invalid' : ''; ?>" id="phone" rows="3" name="phone"><?= (set_value('phone') ? set_value('phone') : $shippers->phone); ?></textarea>
                        <?= form_error('phone'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>