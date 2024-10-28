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

        <!-- Role Selection and Sign In Button -->
        <div class="row">
            <div class="col-6">
                <div class="mb-3" style="margin-left:40px;">
                    <button class="emb btn btn-primary d-grid form-btn gradient-btn" style="width: 80%;" type="submit">
                        Sign In
                    </button>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3" style="margin-bottom:90px;">
                    <label for="roleSelect" class="form-label">Select Role</label>
                    <select class="form-select" id="roleSelect" name="role" style="width: 80%;">
                        <option selected disabled>Choose...</option>
                     <a href="{{route('')}}"> <option value="reason_manager">Reason Manager</option></a>  
                      <a href=""><option value="branch_manager">Branch Manager</option></a>  
                    </select>
                </div>
            </div>
            
        </div>
    </form>


            </a>
                </div>







