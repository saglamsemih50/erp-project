@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="d-block d-lg-flex d-md-flex justify-content-between">
                <h5 class="card-title">Görüntüle</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Name</div>
                        <div class="col-md-9"> Lorem, ipsum. </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Kategori</div>
                        <div class="col-md-9"> Lorem, ipsum. </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Tedarikçi</div>
                        <div class="col-md-9"> Lorem, ipsum. </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Satış Fiyatı</div>
                        <div class="col-md-9">Lorem, ipsum.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Maliyet Fiyatı</div>
                        <div class="col-md-9">Lorem, ipsum.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Stok</div>
                        <div class="col-md-9">Lorem, ipsum dolor.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Ürün Açıklaması</div>
                        <div class="col-md-9">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta atque fugiat
                            in, ullam excepturi explicabo.</div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('purchase-product.index') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('purchase-product.delete', 1) }}"
                            class="btn btn-danger btn-sm delete-product-table" data-title="">
                            <i class="fa fa-trash"></i> Sil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.delete-product-table').forEach(function(button) {
            button.addEventListener('click', function(event) {
                const title = button.getAttribute('data-title');
                const confirmed = confirm(title + '  silmek istediğinize emin misiniz?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
