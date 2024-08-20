@extends('components.app')
@section('content')
    <h5 class="card-title">Satıcı</h5>
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <a href="{{ route('vendor.create') }}" class="btn btn-primary ml-auto">Yeni Satıcı Oluştur</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>İşlem</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseVendors as $purchaseVendor)
                    <tr>
                        <td>{{ $purchaseVendor->name }}</td>
                        <td>{{ $purchaseVendor->company_name }}</td>
                        <td>{{ $purchaseVendor->email }}</td>
                        <td>{{ $purchaseVendor->phone }}</td>
                        <td>
                            <a href="{{ route('vendor.show', $purchaseVendor->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Show
                            </a>
                            <a href=" {{ route('vendor.edit', $purchaseVendor->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('vendor.delete', $purchaseVendor->id) }}"
                                class="btn btn-danger btn-sm delete-vendor-table" data-title="{{ $purchaseVendor->name }}">
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
        document.querySelectorAll('.delete-vendor-table').forEach(function(button) {
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
