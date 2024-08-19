@section('links')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
@endsection
@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Görev Oluştur</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Görev<span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="task_category_id">Görev Kategorisi</label>
                                        <select name="task_category_id" id="task_category_id"
                                            class="form-control selectpicker" data-live-search="true">
                                            <option value="">Seçiniz</option>
                                            @foreach ($taskCategories as $taskCategory)
                                                <option value="{{ $taskCategory->id }}">{{ $taskCategory->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Başlangıç Tarihi<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker" id="start_date"
                                            name="start_date"
                                            placeholder="{{ \Carbon\Carbon::now()->format(config('app.date_format')) }}">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Bitiş Tarihi<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker" id="end_date" name="end_date"
                                            placeholder="{{ \Carbon\Carbon::now()->format(config('app.date_format')) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="department_id">Departman<span class="text-danger">*</span></label>
                                        <select name="department_id" id="task_type" class="form-control selectpicker"
                                            data-live-search="true" required>
                                            <option value="">Seçiniz</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3" id="taskOption">
                                    <div class="form-group">
                                        <label for="employee_id">Çalışan<span class="text-danger">*</span></label>
                                        <select id="employee_id" data-live-search="true" multiple name="employee_id[]"
                                            class="form-control " data-live-search="true" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="padding-top:20px">
                        Görev İçeriği
                        </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Görev Açıklaması</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary mr-3 ">
                                Kaydet
                            </button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#start_date, #end_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#taskOption').hide();
            $('#task_type').change(function() {
                var departmentId = $(this).val();
                console.log(departmentId);

                if (departmentId) {
                    $.ajax({
                        url: '{{ route('tasks.employees.fetch') }}',
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
                                $('#taskOption').show();
                            } else {

                                $('#employee_id').html(
                                    '<option value="">Seçilecek çalışan yok</option>');
                                $('#employee_id').selectpicker(
                                    'refresh');
                                $('#taskOption').show();
                            }
                        },
                        error: function(xhr) {
                            console.error('Bir hata oluştu:', xhr.responseText);
                        }
                    });
                } else {
                    $('#taskOption').hide();
                }
            });

            $("#employee_id").selectpicker({
                actionsBox: true,
                selectAllText: " Tümünü Seç ",
                deselectAllText: "İptal Et",
                multipleSeparator: " ",
                selectedTextFormat: "count > 8",
                countSelectedText: function(selected, total) {
                    return selected + "Seçilen Çalışanlar";
                }
            });
        });
    </script>
@endsection
