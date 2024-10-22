<!-- {{--           
          
          @include('auth.link')
          
          <form id="formAuthentication" class="mb-3" action="{{ route('account.processRegister') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"
                        id="name" name="name" placeholder="Enter your Name" autofocus />
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" placeholder="Enter your email" />
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" value="{{ old('password') }}"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input 
                      type="password" 
                      class="form-control @error('password_confirmation') is-invalid @enderror" 
                      id="password_confirmation" 
                      name="password_confirmation"  value="{{old('password_confirmation')}}"
                      placeholder="Confirm your password"
                  />                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
            
                    </div>
                </div>

                <div class="mb-3">
                       <label for="role" class="form-label">Role</label>
                       
                  <select 
                      class="form-control @error('role') is-invalid @enderror" 
                      id="role" 
                      name="role">
                      <option value="" disabled selected>Select your role</option> 
    
                      <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                      <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                      <option value="BranchManeger" {{ old('role') == 'BranchManeger' ? 'selected' : '' }}>Branch Maneger</option>



                  </select>
                  @error('role')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
              </div>
          


                <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>
            
             
            </div>
          </div>
             </div>
      </div>
    </div>

         {{-- <!-- Register Card --> --}}
 -->
