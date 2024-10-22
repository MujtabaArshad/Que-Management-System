    @include('auth.link-login')
    @include('auth.main-login')


    <!-- Content -->

    </a>
    </div>
    <form action="{{ route('account.authenticate') }}" method="POST">
        @csrf

        <div class="mb-3" >
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
                    <button class=" emb btn btn-primary d-grid form-btn gradient-btn" style="width: 80%;" type="submit">
                        Sign in
                    </button>
                </div>
            </div>
                

        </form>
            <!-- Branch Manager Login Button -->
            <div class="col-6">
                <div class="">
                    <a href="{{route('auth.login')}}"  class=" emb btn btn-secondary gradient-btn " style="width: 80%;">
                        Login as BM
                    </a>
                </div>
            </div>

            </a>
                </div>







