@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Satıcı Oluştur</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('vendor.update', $purchaseVendor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">İsim<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $purchaseVendor->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="company_name">Şirket Adı</label>
                                        <input type="text" name="company_name" id="company_name"
                                            class="form-control"value="{{ $purchaseVendor->company_name }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $purchaseVendor->email }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">Telefon</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ $purchaseVendor->phone }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="padding-top:20px">
                        Adres
                        </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="billing_address">Fatura Adresi</label>
                                <textarea id="billing_address" name="billing_address" class="form-control"cols="10" rows="5">{{ $purchaseVendor->billing_address }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="shipping_address">Gönderi Adresi</label>
                                <textarea id="shipping_address" name="shipping_address" class="form-control" cols="10" rows="5">{{ $purchaseVendor->shipping_address }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary mr-3 ">
                                Kaydet
                            </button>
                            <a href="{{ route('vendor.index') }}" class="btn btn-secondary">
                                Geri Dön
                            </a>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
