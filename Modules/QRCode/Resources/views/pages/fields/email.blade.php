
<div class="col-md-6">
    <label for="email">E Posta</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="örn=semih@gmail.com" required value="{{ $formFields['email'] ?? '' }}">
</div>
<div class="col-md-6">
    <label for="subject">Konu</label>
    <input type="text" class="form-control" id="subject" name="subject" value="{{ $formFields['subject'] ?? '' }}">
</div>
<div class="col-md-12">
    <label for="message">Mesaj</label>
    <textarea class="form-control" id="message" name="message">{{ $formFields['message'] ?? '' }}</textarea>
</div>
