
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Produk</h1>
        <a href="<?= base_url('customer'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left fa-sw text-white"></i> Kembali</a>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card mb-3 d-relative">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('/assets/img/user_picture/' . $users->picture); ?>" class="card-img p-2" alt="...">
                      
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= $users->name; ?></h5>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white">Deskripsi Produk</h6>
                </div>
                <div class="card-body">
                    <p class="card-text" style="white-space: pre-wrap;"><?= $product->product_description; ?><p>
                </div>
            </div>
        </div> -->
    </div>
</div>