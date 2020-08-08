<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Jasa Pengiriman</h1>
        <a href="<?= base_url('shipper/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sw text-white"></i> Tambah Baru </a>
    </div>

    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">List Jasa Pengiriman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Perusahaan Jasa Pengiriman</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Perusahaan Jasa Pengiriman</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($shippers as $s) :
                        ?>
                            <tr>
                                <td class="align-middle w-25"><?= $s->company_name; ?></td>
                                <td class="align-middle"><?= $s->phone; ?></td>
                                <td class="align-middle text-center">
                                    <button type="button" data-toggle="modal" data-target="#deleteModal" data-id="<?= $s->id; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'shipper/delete')"><span class="fa fa-sm  fa-fw fa-trash-alt"></span> Hapus </button>
                                    <a href="<?= base_url('shipper/edit/' . $s->id); ?>" class="btn btn-sm btn-primary" role="button" title="Ubah"><span class="fa fa-sm fa-fw fa-pencil-alt"></span> Ubah </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>