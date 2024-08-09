@extends('components.app')
@section('content')
    <div class="content-wrapper">
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <h5 class="card-title">Bildirim Düzenle</h5>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('notice.update', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Başlık<span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" value=" " class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="departman">Departman<span class="text-danger">*</span></label>
                                        <select name="departman" id="notice_type" class="form-control"
                                            data-live-search="true" required>
                                            <option value="İnsan Kaynakları">İnsan Kaynakları</option>
                                            <option value="Yazılımcılar">Yazılımcılar</option>
                                            <option value="Temizlikçi">Temizlikçi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 notice_type-div" id="noticeOption">
                                    <div class="form-group">
                                        <label for="employee">Çalışan<span class="text-danger">*</span></label>
                                        <select name="employee" id="employee" class="form-control " data-live-search="true"
                                            required>
                                            <option value=""></option>
                                            <option value="Mehmet">Ahmet</option>
                                            <option value="Ahmet">Mehmet</option>
                                            <option value="Gökhan">Gökhan</option>
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
                                <label for="note">Note</label>
                                <textarea id="note" name="note"  class="form-control"></textarea>
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
    <script>
        $(document).ready(function() {
            $('#noticeOption').hide();
            $('#notice_type').change(function() {
                $('notice_type-div').toggleClass('d-none');
                if ($('#notice_type').val() === "Yazılımcılar") {
                    $('#noticeOption').show();
                } else {
                    $('#noticeOption').hide();
                }
            });
        })
    </script>
@endsection
