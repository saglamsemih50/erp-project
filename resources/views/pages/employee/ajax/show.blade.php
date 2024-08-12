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
                        <div class="col-md-3 font-weight-bold">Name</div>
                        <div class="col-md-9">Semih</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Email</div>
                        <div class="col-md-9">semih5@gmail.com</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Departman</div>
                        <div class="col-md-9">Yazılımcılar</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Ülke</div>
                        <div class="col-md-9">Turkey</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Numara</div>
                        <div class="col-md-9">537445645</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Dogum Tarihi</div>
                        <div class="col-md-9">1995</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Cinsiyet</div>
                        <div class="col-md-9">Erkek</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Katılım Tarihi</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Medeni Hal</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Hakkında</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Adres</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('employee.index') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('employee.delete', 1) }}" class="btn btn-danger btn-sm delete-employee-table"
                            data-title="">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.delete-employee-table').forEach(function(button) {
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
