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
                        <div class="col-md-3 font-weight-bold">İsim</div>
                        <div class="col-md-9">{{ $purchaseVendor->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Şirket Adı</div>
                        <div class="col-md-9">{{ $purchaseVendor->company_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Email</div>
                        <div class="col-md-9">{{ $purchaseVendor->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Telefon</div>
                        <div class="col-md-9">{{ $purchaseVendor->phone }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Fatura Adresi</div>
                        <div class="col-md-9">{{ $purchaseVendor->billing_address }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Gönderi Adresi</div>
                        <div class="col-md-9">{{ $purchaseVendor->shipping_address }}</div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('vendor.index') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('vendor.delete', $purchaseVendor->id) }}"
                            class="btn btn-danger btn-sm delete-vendor-table" data-title="{{ $purchaseVendor->name }}">
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
        document.querySelectorAll('.delete-vendor-table').forEach(function(button) {
            button.addEventListener('click', function(event) {
                const title = button.getAttribute('data-title');
                const confirmed = confirm(title + ' silmek istediğinize emin misiniz?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
