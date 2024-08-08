 @section('links')
@endsection
@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Düzenle</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form  id="save-qrcode-data-form" action="{{ route("qrcode.update",['id'=>$qrCode->id]) }}"  enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-9">
                            <div class="row">
                                <!-- QR Kod Başlığı -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qrTitle">Başlık<span class="text-danger">*</span></label>
                                        <input type="text" name="qrTitle" id="qrTitle" class="form-control"
                                            value="{{ $qrCode->title }}" required>
                                    </div>
                                </div>

                                <!-- QR Kod Tipi -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Tür<span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control select-picker"
                                            data-live-search="true" required>
                                            @foreach (\Modules\QRCode\Enums\Type::cases() as $type)
                                                <option value="{{ $type->value }}"
                                                    {{ $type->value == $qrCode->type->value ? 'selected' : '' }}>
                                                    {{ $type->label() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="qr-fields">
                                @include('qrcode::pages.fields.' . $qrCode->type->value)
                            </div>
                        </div>
                        <div class="col-lg-3 p-0">
                            <div class="card d-flex justify-content-center w-100 qr-preview">
                                @include('qrcode::pages.qrcode.qr-placeholder')
                                <img src="{{ $qrCode->data }}" class="w-100 qr-preview-img">
                            </div>
                            <button type="button" class="btn-primary rounded f-14 p-2 mr-3 mt-2 w-100 generate-qr">
                                QR Önizlemesi Oluştur
                            </button>
                        </div>
                    </div>
                    <h3 style="padding-bottom: 10px">
                        Tasarım
                    </h3>
                    <div class="row">
                        <!-- QR Kod Boyutu -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="size">Boyut</label>
                                <input type="number" name="size" id="size" class="form-control"
                                    value="{{ $qrCode->size }}" min="200" required>
                            </div>
                        </div>

                        <!-- QR Kod Margin -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="margin">Margin</label>
                                <input type="number" name="margin" id="margin" class="form-control"
                                    value="{{ $qrCode->margin }}" min="10" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foreground_color">Foreground Color</label>
                                <div class="input-group color-picker">
                                    <input type="text" name="foreground_color" id="foreground_color"
                                        class="form-control height-35" value="{{ $qrCode->foreground_color }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text height-35 colorpicker-input-addon"
                                            id="foreground-color-addon">
                                            <i style="background-color: #000000;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Background Color Picker -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="background_color">Background Color</label>
                                <div class="input-group color-picker ">
                                    <input type="text" name="background_color" id="background_color"
                                        class="form-control height-35" value="{{ $qrCode->background_color }}" required>
                                    <div class="input-group-append  ">
                                        <span class="input-group-text height-35 colorpicker-input-addon"
                                            id="background-color-addon">
                                            <i style="background-color: #ffffff;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary mr-3">
                            Kaydet
                        </button>
                        <a href="{{ route('qrcode') }}" class="btn btn-secondary">
                            Geri
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '#type', function() {
                let type = $(this).val(); //seçilen tip
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
                        ;
                        $.unblockUI('.qr-preview');
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax request failed:', status,
                            error);
                    }
                });

            });

            function displayQrPlaceholder() {
                console.log("img üstündesin");

                $('.qr-preview img').addClass('d-none');
                $('.qr-placeholder').removeClass('d-none');
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.color-picker').colorpicker({
                format: 'hex',
                useAlpha: false,
                container: true,
                inline: false
            })
        });
    </script>

    <script>
        $('body').on('click', '.generate-qr', function($e) {
            generateQr();
        });

        function generateQr() {

            let form = $('#save-qrcode-data-form');
            $.ajax({
                url: '{{ route('qrcode.preview') }}',
                type: 'POST',
                data: form.serialize(),
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(response) {
                    setQrPerview(response);
                },
                complete: function() {
                    $('#loading').hide();
                    console.log("Başarılı");
                },
                error: function(xhr, status, error) {
                    console.error("Hata:", error);
                }
            });
        }

        function setQrPerview(image) {
            $('.qr-preview img').attr('src', image.qr);
            displayQr();
        }

        function clearFromErrors() {
            $('#save-qrcode-data-form').find(".invalid-feedback").remove();
            $('#save-qrcode-data-form').find(".is-invalid").each(function() {
                $(this).removeClass("is-invalid");
            });
        }

        function displayQr() {
            console.log('Displaying QR image');
            $('.qr-preview img').removeClass('d-none');
            $('.qr-placeholder').addClass('d-none');
        }
        $('.qr-placeholder').addClass('d-none');
    </script>
@endsection

