@extends('components.app')
@section('content')
    <style>
        .table th img,
        .jsgrid .jsgrid-table th img,
        .table td img,
        .jsgrid .jsgrid-table td img {
            width: 100px;
            height: 100px;
            border-radius: 0;
            margin-right: 15px
        }
    </style>
    <h5 class="card-title">Employees</h5>
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <a href="{{ route('employee.create') }}" class="btn btn-primary ml-auto">Çalışan Ekle</a>

            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>

                        <td><img src="{{ asset('storage/' . $employee->img) }}" alt="">{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>AktifOrPasif</td>
                        <td>
                            <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Show
                            </a>
                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('employee.delete', $employee->id) }}"
                                class="btn btn-danger btn-sm delete-employee-table" data-title="{{ $employee->name }}">
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
        document.querySelectorAll('.delete-employee-table').forEach(function(button) {
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
