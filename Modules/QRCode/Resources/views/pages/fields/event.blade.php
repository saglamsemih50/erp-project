<div class="col-md-6">
    <label for="title">Etkinlik Başlığı<span class="text-danger">*</span></label>
    <input type="text" id="title" name="title" class="form-control" required>
</div>
<div class="col-md-6">
    <label for="location">Konum </label>
    <input type="text" id="location" name="location" class="form-control">
</div>
<div class="col-lg-3 col-md-6">
    <label for="start_date">Başlangıç Tarihi<span class="text-danger">*</span></label>
    <input type="text" class="form-control datepicker" id="start_date" name="date" placeholder="" required>
</div>
<div class="col-lg-3 col-md-6">
    <div class="bootstrap-timepicker timepicker">
        <label for="start_time">Başlangıç Saati<span class="text-danger">*</span></label>
        <input type="text" id="start_time" name="start_time" class="form-control" placeholder="" required>
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-clock"></i></span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <label for="end_date">Bitiş Tarihi<span class="text-danger">*</span></label>
    <input type="text" id="end_date" name="end_date" class="form-control datepicker" placeholder="" required>
</div>

<div class="col-lg-3 col-md-6">
    <div class="bootstrap-timepicker timepicker">
        <label for="end_time">Bitiş Saati<span class="text-danger">*</span></label>
        <input type="text" id="end_time" name="end_time" class="form-control" placeholder="" required>
        <div class="input-group-append">
            <span class="input-group-text"> <i class="fas fa-clock"></i></span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <label for="note">Etkinlik Notu</label>
    <textarea id="note" name="note" class="form-control"></textarea>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var now = moment().tz('Europe/Istanbul').format('HH:mm');
        $('#start_date,#end_date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });
        if (!$('#start_date,#end_date').val()) {
            $('#start_date,#end_date').datepicker('setDate', new Date());
        }
        $('#start_time,#end_time').timepicker({
            showMeridian: false,
            minuteStep: 1,
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down'
            },

        });
        if (!$('#start_time,#end_time').val()) {
            $('#start_time,#end_time').val(now);
        }

    })
</script>
