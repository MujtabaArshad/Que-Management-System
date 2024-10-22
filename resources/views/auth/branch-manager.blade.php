@include('auth.link-login')
@include('auth.main-login')


<!-- Content -->
                     </a>
            </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

@if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<form action="{{ route('branchmanager.login') }}" method="POST">
  @csrf

  <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input
          type="text"

          class="form-control @error('email') is-invalid @enderror"
          id="email"
          name="email" value="{{old('email')}}"
          placeholder="Enter your email"
          autocomplete="off"
      />
      @error('email')
          <p class="invalid-feedback">{{ $message }}</p>
      @enderror
  </div>



  <div class="mb-3">
      <label for="password" class="form-label">Password</label>

          <input
              type="password"
              id="password"  value="{{old('password')}}"
              class="form-control @error('password') is-invalid @enderror"
              name="password"
              placeholder="Enter Your Password"
              autocomplete="off"
          />
          @error('password')
              <p class="invalid-feedback">{{ $message }}</p>
          @enderror
      </div>
  </div>

  <!-- Sign In Button -->
  <div class="row">
      <div class="col-6">
          <div class="mb-3 "style="margin-left:40px;">
              <button class="btn btn-primary d-grid form-btn gradient-btn emb" style="width: 80%;" type="submit">
                  Sign in
              </button>
          </div>
      </div>

  </form>

  <div class="col-6  ">
 <p class="text-center">
  <a href=" {{ route('authlogin') }}">
    <button class="btn btn-primary d-grid form-btn gradient-btn emb" style="width: 80%;" type="submit">
        Log in Admin
    </button>
</p>
</div>
</div>



