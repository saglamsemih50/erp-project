<div class="col-md-4">
    <label for="name">Wifi Adı<span class="text-danger">*</span></label>
    <input type="text" id="name" name="name" class="form-control" required>
</div>

<div class="col-md-4">
    <label for="password">Şifre</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control height-35 f-14">
        <div class="input-group-append">
            <button type="button" class="btn btn-outline-secondary border-grey height-35 toggle-password">
                +
            </button>
        </div>
    </div>
</div>

<div class="col-md-4">
    <label for="encryption">Ağ Türü</label>
    <select id="encryption" name="encryption" class="form-control">
        <option @if ('WEP') selected @endif value="WEP">WEP</option>
        <option @if ('WPA') selected @endif value="WPA">WPA</option>
        <option @if ('') selected @endif value="">Şifreleme Yok</option>
    </select>
</div>

<script>
    document.querySelector('.toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const button = this;

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            button.textContent = '-';
        } else {
            passwordInput.type = 'password';
            button.textContent = '+';
        }
    });
</script>
