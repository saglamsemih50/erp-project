@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Employee Düzenle</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $employee->name }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email"
                                            class="form-control"value="{{ $employee->email }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Şifre</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Yeni şifre">
                                            <div class="input-group-append">
                                                <button type="button"
                                                    class="btn btn-outline-secondary border-grey toggle-password">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="departman">Departman<span class="text-danger">*</span></label>
                                        <select name="departman" id="departman" class="form-control" data-live-search="true"
                                            required>
                                            <option value="" disabled selected>Seçiniz</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ $employee->departman_id === $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="country">Ülke<span class="text-danger">*</span></label>
                                        <select name="country" id="country" class="form-control" data-live-search="true"
                                            required>
                                            @foreach (get_countries() as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ $employee->country === $item->name ? 'selected' : '' }}>
                                                    {!! $item->name !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="country_phonecode">Ülke Kodu<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select name="country_phonecode" id="country_phonecode" class="form-control"
                                                style="max-width: 100px;" data-live-search="true" required>
                                                @foreach (get_countries() as $item)
                                                    <option value="{{ $item->phonecode }}"
                                                        {{ $employee->country_phonecode === $item->phonecode ? 'selected' : '' }}>
                                                        {!! $item->countryCode() !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="tel" class="form-control" name="mobile" id="mobile"
                                                value="{{ $employee->mobile }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="image">Profil Fotoğrafı</label>
                                <div class="image-upload-area"
                                    style="border: 2px dashed #ccc; padding: 10px; text-align: center; position: relative; width: 300px; height: 150px;">
                                    <input type="file" name="image" id="image" class="form-control-file"
                                        accept=".png, .jpg, .jpeg, .svg, .bmp" style="display: none;"
                                        onchange="previewImage(event)">
                                    <label for="image"
                                        style="cursor: pointer; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; position: relative;">
                                        <img id="preview" src="{{ asset('storage/' . $employee->img) }}"
                                            alt="Profil Fotoğrafı"
                                            style="width: 100%; height: 100%; object-fit: contain; display: {{ $employee->img ? 'block' : 'none' }};">
                                        <span id="placeholder"
                                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #ccc; font-size: 16px; text-align: center; display: {{ $employee->img ? 'none' : 'block' }};">Fotoğraf
                                            Ekle</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Doğum Tarihi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" id="date_of_birth"
                                    name="date_of_birth"
                                    value="{{ isset($employee->date_of_birth) ? \Carbon\Carbon::parse($employee->date_of_birth)->format(config('app.date_format')) : '' }}"
                                    placeholder="{{ \Carbon\Carbon::now()->format(config('app.date_format')) }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="gender">Cinsiyet<span class="text-danger">*</span></label>
                                <select name="gender" id="gender" class="form-control" data-live-search="true"
                                    required>
                                    <option value="" disabled selected>Seçiniz</option>
                                    <option value="Male"{{ $employee->gender === 'Male' ? 'Selected' : '' }}>Erkek
                                    </option>
                                    <option value="Female"{{ $employee->gender === 'Female' ? 'Selected' : '' }}>Kadın
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="joining_date">Katılma Tarihi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" id="joining_date"
                                    name="joining_date"
                                    value="{{ isset($employee->joining_date) ? \Carbon\Carbon::parse($employee->joining_date)->format(config('app.date_format')) : '' }}"
                                    placeholder="{{ \Carbon\Carbon::now()->format(config('app.date_format')) }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="martial_status">Medeni Hal<span class="text-danger">*</span></label>
                                <select name="martial_status" id="martial_status" class="form-control"
                                    data-live-search="true" required>
                                    <option value="" disabled selected>Seçiniz</option>
                                    <option value="Married"
                                        {{ $employee->martial_status === 'Married' ? 'selected' : '' }}>Evli</option>
                                    <option value="Unmarried"
                                        {{ $employee->martial_status === 'Unmarried' ? 'selected' : '' }}>Bekar</option>
                                    <option value="Divorced"
                                        {{ $employee->martial_status === 'Divorced' ? 'selected' : '' }}>Nişanlı</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="about">Hakkında<span class="text-danger">*</span></label>
                                <textarea name="about" id="about" class="form-control" cols="30" rows="10">{{ $employee->about }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="address">Adres<span class="text-danger">*</span></label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="10">{{ $employee->address }}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary mr-3">
                    Kaydet
                </button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">
                    Geri Dön
                </a>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                var placeholder = document.getElementById('placeholder');
                output.src = reader.result;
                output.style.display = 'block';
                placeholder.style.display = 'none';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function(e) {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').className = type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#date_of_birth,#joining_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
