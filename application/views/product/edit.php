<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Form Ubah Data Produk</h6>
                    <a href="<?= base_url('product'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart(''); ?>
                    <?= form_hidden('id', $product->id); ?>
                    <div class="form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" name="product_name" class="form-control <?= (form_error('product_name')) ? 'is-invalid' : ''; ?>" id="product_name" aria-describedby="textHelp" value="<?= (set_value('product_name', $product->product_name)); ?>" autofocus>
                        <?= form_error('product_name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="product_description">Deskripsi Produk</label>
                        <textarea class="form-control" id="product_description" rows="6" name="product_description"><?= $product->product_description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="text" name="stock" class="form-control <?= (form_error('stock')) ? 'is-invalid' : ''; ?>" id="stock" aria-describedby="textHelp" value="<?= set_value('stock', $product->stock); ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="custom-select mr-sm-2 <?= (form_error('category')) ? 'is-invalid' : ''; ?>" id="category" name="category">
                            <option value="0">- Pilih -</option>
                            <?php foreach ($categories as $c) : ?>
                                <option value="<?= $c->id; ?>" <?= ($c->id == $product->category_id) ? 'selected' : ''; ?>><?= $c->category_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('category'); ?>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Harga</label>
                        <input type="text" name="unit_price" class="form-control <?= (form_error('unit_price')) ? 'is-invalid' : ''; ?>" id="unit_price" aria-describedby="textHelp" value="<?= set_value('unit_price', $product->unit_price); ?>">
                        <?= form_error('unit_price'); ?>
                    </div>
                    <div class="form-group">
                        <label for="discount">Diskon</label>
                        <input type="text" name="discount" class="form-control <?= (form_error('discount')) ? 'is-invalid' : ''; ?>" id="discount" aria-describedby="textHelp" value="<?= set_value('stock', $product->discount); ?>">
                        <?= form_error('discount'); ?>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-9">
                                <label for="discount">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($error) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previewImage()">
                                    <label class="custom-file-label" for="picture"><?= $product->picture; ?></label>
                                    <div class="invalid-feedback"><?= $error; ?></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <img src="<?= base_url('assets/img/products/' . $product->picture); ?>" alt="" class="img-thumbnail w-75 img-preview">
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