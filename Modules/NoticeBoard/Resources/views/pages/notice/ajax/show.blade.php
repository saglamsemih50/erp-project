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
                        <div class="col-md-3 font-weight-bold">Başlık</div>
                        <div class="col-md-9">Başlık verisi</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Oluşturma Tarihi:</div>
                        <div class="col-md-9">8/2024</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Departman</div>
                        <div class="col-md-9">Yazılımcılar</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Çalışanlar</div>
                        <div class="col-md-9">Ahmet Mehmet Gökhan</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Not</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('notice') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('notice.delete', 1) }}" class="btn btn-danger btn-sm delete-notice-table"
                            data-title="">
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
        document.querySelectorAll('.delete-notice-table').forEach(function(button) {
            button.addEventListener('click', function(event) {
                const title = button.getAttribute('data-title');
                const confirmed = confirm(title + ' Bu öğeyi silmek istediğinize emin misiniz?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
