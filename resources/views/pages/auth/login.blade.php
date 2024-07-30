@include('pages.auth.header')

<h3 class="card-title text-left mb-3">Login</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Email *</label>
        <input type="email" name="email" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Password *</label>
        <input type="password" name="password" class="form-control p_input">
    </div>
    <div class="form-group d-flex align-items-center justify-content-between">
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input"> Remember me </label>
        </div>
        <a href="#" class="forgot-pass">Forgot password</a>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
    </div>
    <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a>
    </p>
</form>

@include('pages.auth.footer')
