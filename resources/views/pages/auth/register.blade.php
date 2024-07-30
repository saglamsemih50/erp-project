                   @include('pages.auth.header')
                   <h3 class="card-title text-left mb-3">Register</h3>
                   @if ($errors->any())
                       <div>
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                   <form action="{{ route('users.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Name</label>
                           <input type="text" name="name" class="form-control p_input" required>
                       </div>
                       <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" class="form-control p_input" required>
                       </div>
                       <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control p_input" required>
                       </div>
                       <div class="form-group">
                           <label>Password Confirmation</label>
                           <input type="password" name="password_confirmation" class="form-control p_input" required>
                       </div>
                       <div class="form-group d-flex align-items-center justify-content-between">
                           <div class="form-check">
                               <label class="form-check-label">
                                   <input type="checkbox" class="form-check-input"> Remember me
                               </label>
                           </div>
                           <a href="#" class="forgot-pass">Forgot password</a>
                       </div>
                       <div class="text-center">
                           <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                       </div>
                       <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}">
                               Sign Up</a></p>
                   </form>
                   @include('pages.auth.footer')
