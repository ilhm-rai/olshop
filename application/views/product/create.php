<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Form Tambah Data Produk</h6>
                    <a href="<?= base_url('product'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart() ?>
                    <div class="form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" name="product_name" class="form-control <?= (form_error('product_name')) ? 'is-invalid' : ''; ?>" id="product_name" aria-describedby="textHelp" autofocus value="<?= set_value('product_name'); ?>">
                        <?= form_error('product_name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="product_description">Deskripsi</label>
                        <textarea class="form-control" id="product_description" rows="3" name="product_description"><?= set_value('product_description'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="text" name="stock" class="form-control <?= (form_error('stock')) ? 'is-invalid' : ''; ?>" id="stock" aria-describedby="textHelp" value="<?= set_value('stock', 0); ?>">
                        <?= form_error('stock'); ?>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="custom-select mr-sm-2 <?= (form_error('category')) ? 'is-invalid' : ''; ?>" id="category" name="category">
                            <option value="0" selected>- Pilih -</option>
                            <?php foreach ($categories as $c) : ?>
                                <option value="<?= $c->id; ?>" <?php
                                                                if (set_value('category')) {
                                                                    echo ($c->id == set_value('category')) ? 'selected' : '';
                                                                }
                                                                ?>>
                                    <?= $c->category_name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('category'); ?>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Harga</label>
                        <input type="text" name="unit_price" class="form-control <?= (form_error('unit_price')) ? 'is-invalid' : ''; ?>" id="unit_price" aria-describedby="textHelp" value="<?= set_value('unit_price', 0); ?>">
                        <?= form_error('unit_price'); ?>
                    </div>
                    <div class="form-group">
                        <label for="discount">Diskon</label>
                        <input type="text" name="discount" class="form-control <?= (form_error('discount')) ? 'is-invalid' : ''; ?>" id="discount" aria-describedby="textHelp" value="<?= set_value('discount', 0); ?>">
                        <?= form_error('discount'); ?>
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
                                <img src="<?= base_url('assets/img/products/default.png'); ?>" alt="" class="img-thumbnail w-75 img-preview">
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