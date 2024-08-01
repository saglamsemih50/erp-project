@section('links')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
@endsection
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
                    <div class="row p-20">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Başlık<span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Tür<span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control select-picker"
                                            data-live-search="true" required>
                                            @foreach (\Modules\QRCode\Enums\Type::cases() as $type)
                                                <option @selected($type->value == 'text') value="{{ $type->value }}">
                                                    {{ $type->label() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="qr-fields">
                                @include('qrcode::pages.fields.text')
                            </div>
                        </div>
                        <div class="col-lg-3 p-0">
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('change', '#type', function() {
                let type = $(this).val();
                console.log(type);
                let url = '{{ route('qrcode.fields', ':type') }}';
                url = url.replace(':type', type);

                $('.qr-preview img').attr('src', '');
                displayQrPlaceholder();
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        $('#qr-fields').html(response);
                        $('.select-picker').selectpicker('refresh');
                    },
                    complete: function() {
                        $.unblockUI('.qr-preview');
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax request failed:', status,
                            error);
                    }
                });
            });

            function displayQrPlaceholder() {

                $('.qr-preview img').addClass('d-none');
                $('.qr-placeholder').removeClass('d-none');
            }
        });
    </script>
@endsection
