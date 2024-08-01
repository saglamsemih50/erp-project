@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">QRCode Oluştur</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form id="save-qrcode-data-form" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Başlık<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Türü<span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control select-picker"
                                    data-live-search="true" required>
                                    @foreach (\Modules\QRCode\Enums\Type::cases() as $type)
                                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0">
                            <div class="card d-flex justify-content-center w-100 qr-preview">
                                @include('qrcode::pages.qrcode.qr-placeholder')
                                <img src="" class="w-100">
                            </div>
                            <button type="button" class="btn-primary rounded f-14 p-2 mr-3 mt-2 w-100 generate-qr">
                                QR Önizlemesi Oluştur
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
