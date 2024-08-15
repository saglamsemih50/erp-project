@extends('components.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="show-message">
            {{ session('message') }}
        </div>
        @php
            session()->forget('message');
        @endphp
    @endif
    <h5 class="card-title">Duyuru Panosu</h5>
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <a href="{{ route('notice.create') }}" class="btn btn-primary ml-auto">Yeni Bildirim Oluştur</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Departman</th>
                    <th>Konu</th>
                    <th>İçerik</th>
                    <th>Oluşturulma Zamanı</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notices as $notice)
                    <tr>
                        <td>{{ $notice->department->name ?? 'Departman Yok' }}</td>
                        <td>{{ $notice->title }}</td>
                        <td>{{ $notice->description }}</td>
                        <td>{{ $notice->created_at }}</td>
                        <td>
                            <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Show
                            </a>
                            <a href=" {{ route('notice.edit', $notice->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('notice.delete', $notice->id) }}"
                                class="btn btn-danger btn-sm delete-notice-table" data-title="{{ $notice->title }}">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var showMessage = document.getElementById('show-message');
            if (showMessage) {
                setTimeout(function() {
                    showMessage.classList.remove('show');
                    showMessage.classList.add('fade');
                    setTimeout(function() {
                        showMessage.remove();
                    },500);
                },5000);
            }
        });
    </script>
@endsection
