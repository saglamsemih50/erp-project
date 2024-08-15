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
                        <div class="col-md-3 font-weight-bold">Görev Kategorisi</div>
                        <div class="col-md-9"> Lorem, ipsum dolor.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Görev</div>
                        <div class="col-md-9">Lorem, ipsum dolor.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Atandı</div>
                        <div class="col-md-9">Mehmet ahmet</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Atayan</div>
                        <div class="col-md-9">Semih</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Başlama Tarihi</div>
                        <div class="col-md-9">12/05/2024</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Bitiş Tarihi</div>
                        <div class="col-md-9">12/05/2024</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Açıklama</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Durumu</div>
                        <div class="col-md-9">Tamamlanmadı</div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('tasks.delete', 1) }}" class="btn btn-danger btn-sm delete-task-table"
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
        document.querySelectorAll('.delete-task-table').forEach(function(button) {
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
