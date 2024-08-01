@extends('components.app')
@section('content')
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
                    <th>İd</th>
                    <th>Başlık</th>
                    <th>Türü</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Veri1</td>
                    <td>Veri2</td>
                    <td>Veri3</td>
                    <td>Veri4</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
