<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header py-3 bg-primary justify-content-between align-items-center d-flex">
                    <h6 class="m-0 font-weight-bold text-white">Ubah Kategori Produk</h6>
                    <a href="<?= base_url('category'); ?>" class="d-none d-sm-inline-block btn btn-sm text-white"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?= form_open_multipart() ?>
                    <div class="form-group">
                        <label for="category_name">Kategori</label>
                        <input type="text" name="category_name" class="form-control <?= (form_error('category_name')) ? 'is-invalid' : ''; ?>" id="category_name" aria-describedby="textHelp" autofocus value="<?= (set_value('category_name') ? set_value('category_name') : $category->category_name); ?>">
                        <?= form_error('category_name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="category_description">Deskripsi</label>
                        <textarea class="form-control <?= (form_error('category_description')) ? 'is-invalid' : ''; ?>" id="category_description" rows="3" name="category_description"><?= (set_value('category_description') ? set_value('category_description') : $category->category_description); ?></textarea>
                        <?= form_error('category_description'); ?>
                    </div>
                    <div class="form-group">
                        <label for="picture">Gambar</label>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($error) ? 'is-invalid' : ''; ?>" id="picture" name="picture" onchange="previewImage()">
                                    <label class="custom-file-label" for="picture"><?= ($category->picture) ? $category->picture : 'Pilih file'; ?></label>
                                    <div class="invalid-feedback mt-3"><?= $error; ?></div>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <img src="<?= base_url('assets/img/products/categories/' . $category->picture); ?>" alt="<?= ($category->category_description) ? $category->category_description : '...'; ?>" class="img-thumbnail w-75 img-preview d-inline-block">
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