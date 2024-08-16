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
                        <div class="col-md-9"> {{ $task->taskCategory->category_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Görev</div>
                        <div class="col-md-9">{{ $task->title }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Atandı</div>
                        <div class="col-md-9">
                            @foreach ($task->employees as $employee)
                                {{ $employee->name }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Atayan</div>
                        <div class="col-md-9">{{ $task->user->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Başlama Tarihi</div>
                        <div class="col-md-9">{{ $task->start_date }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Bitiş Tarihi</div>
                        <div class="col-md-9">{{ $task->end_date }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Açıklama</div>
                        <div class="col-md-9">{{ $task->description }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold">Durumu</div>
                        <div class="col-md-9">{{ $task->status }}</div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mr-3">
                            Geri Dön
                        </a>
                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger btn-sm delete-task-table"
                            data-title="{{ $task->title }}">
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
                const confirmed = confirm(title + ' silmek istediğinize emin misiniz?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
