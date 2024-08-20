@section('links')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
@endsection
@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Ürün Düzenle</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('purchase-product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">İsim<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $product->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Ürün Kategorisi</label>
                                        <select name="category_id" id="category_id" class="form-control selectpicker"
                                            data-live-search="true">
                                            <option value="">Seçiniz</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="vendor_id">Tedarikçi</label>
                                        <select name="vendor_id" id="vendor_id" class="form-control selectpicker"
                                            data-live-search="true">
                                            <option value="">Seçiniz</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}"
                                                    {{ $vendor->id == $product->vendor_id ? 'selected' : '' }}>
                                                    {{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selling_price">Satış Fiyatı</label>
                                        <input type="number" name="selling_price" id="selling_price" class="form-control"
                                            value="{{ $product->selling_price }}" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cost_price">Maliyet Fiyatı</label>
                                        <input type="number" name="cost_price" id="cost_price" class="form-control"
                                            value="{{ $product->cost_price }}" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="stock">Stok</label>
                                        <input type="number" name="stock" id="stock" class="form-control"
                                            value="{{ $product->stock }}" step="1">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="padding-top:20px">
                        Ürün Açıklaması
                        </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Açıklama</label>
                                <textarea id="description" name="description" class="form-control"cols="10" rows="5">{{ $product->description }}</textarea>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary mr-3 ">
                                Kaydet
                            </button>
                            <a href="{{ route('purchase-product.index') }}" class="btn btn-secondary">
                                Geri Dön
                            </a>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
@endsection
