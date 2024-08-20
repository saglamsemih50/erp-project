@extends('components.app')
@section('content')
    <h5 class="card-title">Kategoriler</h5>
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                <a href="{{ route('purchase-category-product.create') }}" class="btn btn-primary ml-auto"> Ürün Kategorisi
                    Oluştur
                </a>
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
                @foreach ($productCategories as $productCategory)
                    <tr>
                        <td>{{ $productCategory->category_name }}</td>
                        <td style="text-align: right;">
                            <a href="{{ route('purchase-category-product.show', $productCategory->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Show
                            </a>
                            <a href=" {{ route('purchase-category-product.edit', $productCategory->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('purchase-category-product.delete', $productCategory->id) }}"
                                class="btn btn-danger btn-sm delete-category-table"
                                data-title="{{ $productCategory->category_name }}">
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
        document.querySelectorAll('.delete-category-table').forEach(function(button) {
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
