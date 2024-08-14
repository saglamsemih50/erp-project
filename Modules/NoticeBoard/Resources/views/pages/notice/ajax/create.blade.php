@section('links')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
@endsection

@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Bildirim Oluştur</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Başlık<span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="departman_id">Departman<span class="text-danger">*</span></label>
                                        <select name="departman_id" id="notice_type" class="form-control"
                                            data-live-search="true" required>
                                            <option value="">Seçiniz</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="noticeOption">
                                    <div class="form-group">
                                        <label for="employee_id">Çalışan<span class="text-danger">*</span></label>
                                        <select name="employee_id[]" multiple id="employee_id" class="form-control"
                                            data-live-search="true" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="padding-top:20px">
                        Bildirim İçeriği
                        </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Note</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary mr-3">
                                Kaydet
                            </button>
                            <a href="{{ route('notice') }}" class="btn btn-secondary">
                                Geri Dön
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script>
          $(document).ready(function() {
            $('#noticeOption').hide();
            $('#notice_type').change(function() {
                var departmentId = $(this).val();
                if (departmentId) {
                    $.ajax({
                        url: '{{ route('notice.employees.fetch') }}',
                        method: 'GET',
                        data: {
                            department_id: departmentId
                        },
                        success: function(response) {
                            console.log(response);

                            var options = '';
                            if (response.employees.length > 0) {

                                $.each(response.employees, function(index, employee) {
                                    options += '<option value="' + employee.id + '">' +
                                        employee.name + '</option>';
                                });
                                $('#employee_id').html(options);
                                $('#employee_id').selectpicker(
                                    'refresh');
                                $('#noticeOption').show();
                            } else {

                                $('#employee_id').html(
                                    '<option value="">Seçilecek çalışan yok</option>');
                                $('#employee_id').selectpicker(
                                    'refresh');
                                $('#noticeOption').show();
                            }
                        },
                        error: function(xhr) {
                            console.error('Bir hata oluştu:', xhr.responseText);
                        }
                    });
                } else {
                    $('#noticeOption').hide();
                }
            });

            $("#employee_id").selectpicker({
                actionsBox: true,
                selectAllText: "Tümünü Seç",
                deselectAllText: "İptal Et",
                multipleSeparator: " ",
                selectedTextFormat: "count > 8",
                countSelectedText: function(selected, total) {
                    return selected + " {{('Seçilen Çalışanlar') }} ";
                }
            });
        });
    </script>
@endsection
