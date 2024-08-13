@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="d-block d-lg-flex d-md-flex justify-content-between">
                <h5 class="card-title">Görüntüle </h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Fotoğraf</div>
                        <div class="col-md-9"><img src="{{ asset('storage/' . $employee->img) }}" width="100"
                                height="100" alt=""></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Name</div>
                        <div class="col-md-9">{{ $employee->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Email</div>
                        <div class="col-md-9">{{ $employee->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Departman</div>
                        <div class="col-md-9"> {{ $employee->department ? $employee->department->name : 'Departmanı Yok' }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Ülke</div>
                        <div class="col-md-9">{{ $employee->country }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Numara</div>
                        <div class="col-md-9">{{ $employee->mobile }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Dogum Tarihi</div>
                        <div class="col-md-9">
                            {{ $employee->date_of_birth ? $employee->date_of_birth->format('d/m/Y') : 'Tarih Yok' }}</div>

                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Cinsiyet</div>
                        <div class="col-md-9">{{ $employee->gender }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Katılım Tarihi</div>
                        <div class="col-md-9">
                            {{ $employee->joining_date ? $employee->joining_date->format('d/m/Y') : 'Tarih Yok' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Medeni Hal</div>
                        <div class="col-md-9">{{ $employee->martial_status }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Hakkında</div>
                        <div class="col-md-9">{{ $employee->about }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Adres</div>
                        <div class="col-md-9">{{ $employee->address }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Yöneten</div>
                        <div class="col-md-9">{{ $employee->user->name }}</div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('employee.index') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('employee.delete', $employee->id) }}"
                            class="btn btn-danger btn-sm delete-notice-table" data-title="{{ $employee->name }}">
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
        document.querySelectorAll('.delete-notice-table').forEach(function(button) {
            button.addEventListener('click', function(event) {
                const title = button.getAttribute('data-title');
                const confirmed = confirm(title + '  silmek istediğinize emin misiniz?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
