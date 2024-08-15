@extends('components.app')
@section('content')
    <h5 class="card-title">Görev Kategorisi</h5>
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <a href="{{ route('task-category.create') }}" class="btn btn-primary ml-auto">Görev Kategorisi Oluştur</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Adı</th>
                    <th style="text-align: right;">İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskCategories as $taskCategory)
                    <tr>
                        <td>{{ $taskCategory->category_name }}</td>
                        <td style="text-align: right;">
                            <a href="{{ route('task-category.show', $taskCategory->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Show
                            </a>
                            <a href=" {{ route('task-category.edit', $taskCategory->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('task-category.delete', $taskCategory->id) }}"
                                class="btn btn-danger btn-sm delete-task_category-table"
                                data-title="{{ $taskCategory->category_name }}">
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
        document.querySelectorAll('.delete-task_category-table').forEach(function(button) {
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
