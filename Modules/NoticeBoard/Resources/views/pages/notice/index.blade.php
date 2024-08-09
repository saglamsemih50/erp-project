@extends('components.app')
@section('content')
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
                    <th>Çalışan</th>
                    <th>Tarih</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Veri1</td>
                    <td>Veri2</td>
                    <td>Veri3</td>
                    <td>
                        <a href="{{ route('notice.show', 1) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Show
                        </a>
                        <a href=" {{ route('notice.edit', 1) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('notice.delete', 1) }}" class="btn btn-danger btn-sm delete-notice-table"
                            data-title="">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
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
