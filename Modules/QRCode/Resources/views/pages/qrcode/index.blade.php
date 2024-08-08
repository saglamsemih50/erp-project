@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
@endsection
@extends('components.app')
@section('content')
    <style>
        .table th img,
        .jsgrid .jsgrid-table th img,
        .table td img,
        .jsgrid .jsgrid-table td img {
            width: 100px;
            height: 100px;
            border-radius: 0;
        }
    </style>
    <h5 class="card-title">{{ __('QRCode') }}</h5>
    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-3 f-14 text-dark-grey d-flex align-items-center">Tür</p>
        <div class="select-status">
            <select class="form-control select-picker" name="type" id="filter_type" data-container="body"
                data-live-search="true" data-size="8">
                <option value="all">Tümü</option>
                @foreach (\Modules\QRCode\Enums\Type::cases() as $status)
                    <option value="{{ $status->value }}">{{ __($status->label()) }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <a href="{{ route('create') }}" class="btn btn-primary ml-auto">{{ __('QR Kodu Oluştur') }}</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>QR Code</th>
                    <th>Başlık</th>
                    <th>Türü</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @include('qrcode::pages.qrcode.partials.table')
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".popup-image").magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            })
        })
    </script>
    <script>
        document.querySelectorAll(".delete-qr-table").forEach(function(button) {
            button.addEventListener("click", function(event) {
                const title = button.getAttribute('data-title');
                const confirmed = confirm(title + " silmek istediğine emin misin ?");
                if (!confirmed) {
                    event.preventDefault();
                }

            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#filter_type').on('change', function() {
                var type = $(this).val();
                $.ajax({
                    'url': '{{ route('qrcode.filter') }}',
                    'method': 'GET',
                    'data': {

                        'type': type
                    },
                    success: function(data) {

                        $('table tbody').html(data)
                    },
                    error: function(xhr) {
                        console.log("Hata");
                    }
                });

            })
        })
    </script>
@endsection
