<?php $price = $product->unit_price ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Produk</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('product/c/' . $product->category_name); ?>"><?= $product->category_name; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product->product_name; ?></li>
        </ol>
    </nav>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow-sm mb-3 d-relative">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="position-relative">
                            <img src="<?= base_url('/assets/img/products/' . $product->picture); ?>" class="card-img p-2" alt="...">
                            <?php if ($product->discount > 0) : ?>
                                <p class="badge badge-danger position-absolute p-2" style="bottom: 5px; left: 20px;"><span class="fa fa-fire-alt"></span> Diskon <?= $product->discount; ?>%</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= $product->product_name; ?></h5>
                            <?php if ($product->discount > 0) : ?>
                                <span class="card-text mr-1 text-black-50"><s>Rp. <?= number_format($price, 0, ',', '.'); ?></s></span>
                                <h6 class="d-inline"><span class="badge badge-pill badge-primary">Rp. <?= number_format($price - $price * ($product->discount / 100), 0, ',', '.'); ?></span></h6>
                            <?php else : ?>
                                <h6 class="d-inline">
                                    <span class="badge badge-pill badge-primary">
                                        Rp. <?= number_format($price, 0, ',', '.'); ?>
                                    </span>
                                </h6>
                            <?php endif; ?>
                            <div class="col-md-12 p-0">
                                <?= form_open('customer/add_to_cart', 'class="d-inline" id="formAddToCart"'); ?>
                                <?= form_hidden('slug', $product->slug); ?>
                                <?= form_hidden('user_id', ($this->session->has_userdata('email')) ? $user->id : ''); ?>
                                <?= form_close(); ?>
                                <label class="sr-only" for="qty">Quantity</label>
                                <div class="input-group w-auto d-inline-flex mt-3 mb-4">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" id="qty" name="qty" value="1" style="max-width: 60px;">
                                    <div class="input-group-append">
                                        <button class="input-group-text">+</button>
                                    </div>
                                </div>
                                <p class="d-inline ml-2">Tersedia <?= $product->stock; ?> buah</p>
                            </div>
                            <button type="submit" form="formAddToCart" class="btn btn-primary" id="addToCart"><span class="fa fa-cart-plus mr-1"></span> Masukan Keranjang</button>
                            <a href="#" class="btn btn-success"> Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Deskripsi Produk</h6>
                </div>
                <div class="card-body">
                    <p class="card-text" style="white-space: pre-wrap;"><?= $product->product_description; ?><p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const btnAddToCart = document.querySelector("#addToCart");
    const btnAddToOrder = document.querySelector("#addToOrder");
    const qty = document.querySelector("#qty");
    btnAddToCart.addEventListener("click", function() {
        qty.setAttribute("form", "formAddToCart");
    })
</script>