<div class="modal fade" id="detailModalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header title-block">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title text-center" id="exampleModalLabel">
                    <em class="fa fa-info-circle" style="font-size:20px;"></em> Detail Produk
                </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="load-detail-produk">
                                <em class="fa fa-spin fa-spinner"></em> Loading...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logModalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header title-block">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title text-center" id="exampleModalLabel">
                    <em class="fa fa-info-circle" style="font-size:20px;"></em> Log Stok Produk
                </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="load-log-stok-produk">
                                <em class="fa fa-spin fa-spinner"></em> Loading...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header title-block">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title text-center" id="exampleModalLabel">
                    <em class="fa fa-info-circle" style="font-size:20px;"></em> Update Stok Produk
                </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="/admin/produk/stock/opname" method="POST" id="form-up-stok-opname"></form>
                            <div class="load-form-stok-opname-produk">
                                <em class="fa fa-spin fa-spinner"></em> Loading...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>