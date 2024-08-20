@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Kategori Oluştur</h5>
        </div>
        <div class="card mt-4 col-lg-9">
            <div class="card-body ">
                <form action="{{ route('purchase-category-product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category_name">Kategori<span class="text-danger">*</span></label>
                                        <input type="text" name="category_name" id="category_name" class="form-control"
                                            required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary mr-3">
                            Kaydet
                        </button>
                        <a href="{{ route('purchase-category-product.index') }}" class="btn btn-secondary">
                            Geri Dön
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
