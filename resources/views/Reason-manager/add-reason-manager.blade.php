     
        <style>
            .required-field::after {
            content: " *";
            color: red;
            font-size:16px;
            }
            </style>
    
    @extends('CRUD.layouts.master')
    @section('title', 'Add Reason Manager')
        @section('content')
            <!-- Content wrapper -->
          
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout -->
            <div id="card" class="row">
            <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add Reason Manager</h5>
            </div>
            <div class="card-body">
            <form id="user-form" action="{{route('addreasonmanager')}} " method="post">
    
            @csrf
    
            <div class="row">
                <!-- First Name -->
                <div class="col-6">
                <label class="form-label required-field" for="firstname" >First Name</label>
                <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror"
                id="first-name" placeholder="Enter First Name" value="{{ old('firstname') }}" />
                @error('firstname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        
                </div>
        
    
    
    
            <!-- Email -->
            <div class="col-6">
            <label class="form-label required-field" for="email">Email </label>
            <input type="Email" name="email" class="form-control @error('email') is-invalid @enderror"
             id="email"
            placeholder="Enter Email" value="{{ old('email')}}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
         
            @enderror
                </div>
            </div>
            <div class="row mt-4">
            <!-- Password -->
            <div class="col-6">
            <label class="form-label required-field" for="password">Password </label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            id="password" value="{{old('password')}}" placeholder="Enter Your Password" />
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
    
            <div class="col-6">
                <label class="form-label required-field" for="password">Contact Number </label>
                <input type="number" name="contactnumber" class="form-control @error('contactnumber')
                 is-invalid @enderror"
                id="number" value="{{old('contactnumber')}}" placeholder="Enter Your Number" />
                @error('contactnumber')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
    
            <!-- Address -->
            <div class="row mt-4" >
            <div class="col-6">
            <label class="form-label required-field" for="address">Address </label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address"
            placeholder="Enter Address" value="{{ old('address') }}" />
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            
    
            
            <!-- Age -->
            <div class="col-6">
            <label class="form-label required-field" for="age">Age </label>
            <input type="number" min="0" name="age" class="form-control @error('age') is-invalid @enderror"
            id="age" placeholder="Enter Your Age" value="{{ old('age') }}" />
            @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
            <!-- NTN -->
            <div class="row mt-4">
            <div class="col-6">
            <label class="form-label required-field" for="cnic">NTN </label>
            <input type="number" name="ntn"   class="form-control @error('ntn') is-invalid @enderror"
            id="NTN" placeholder="Enter NTN" value="{{ old('ntn') }}" />
            @error('ntn')
    
    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
    
    
    
            <!-- Gender -->
            
            <div class="col-6">
            <div class="mb-3">
            <label class="form-label required-field" for="gender-select">Select Gender </label>
            <select name="gender" id="gender-select" class="form-select @error('gender') is-invalid @enderror">
            <option value="" disabled selected>Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female"{{old ('gender') == 'Female' ? 'selected' : '' }}>Female</option>
    
            </select>
            @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            </div>
    
    
            {{-- dropdown Bank --}}
            <div class="row mt-4">
    
            <div class="col-6">
            <label class="form-label required-field" for="branch-select">Select Bank</label>
            <select name="bankname" id="bank-select" class="form-select @error('bankname') is-invalid @enderror">
            <option value="" disabled selected>Select Bank</option>
            @foreach($banks as $bank)
            <option value="{{ $bank->BankId }}" {{ old('bankname') == $bank->BankId ? 'selected' : '' }}>
            {{ $bank->Bankname }}
            </option>
            @endforeach
            </select>
            @error('bankname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
    
    
     
    
            <!-- Branch Dropdown -->
          
            <div class="col-6  ">
            <label class="form-label required-field" for="branch-select">Select Branch</label>
            <select name="branchname" id="branch-select" class="form-select @error('branchname') is-invalid @enderror">
            <option value="" disabled selected>Select Branch</option>
            @foreach($branches as $branch)
            <option value="{{ $branch->BranchID }}" {{ old('branchname') == $branch->BranchID ? 'selected' : '' }}>
            {{ $branch->BranchName }}
            </option>
            @endforeach
            </select>
            @error('branchname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            </div>
    
    
    
    
            <!-- Branch Dropdown -->
   
    
    
    
    <div class="row mt-4">
            <!-- City Dropdown -->
            <div class="col-6">
            <label class="form-label required-field" for="branch-select">Select City</label>
            <select name="cityname" id="City-select" class="form-select @error('cityname') is-invalid @enderror">
            <option value="" disabled selected>Select City</option>
            @foreach($cities as $city)
            <option value="{{ $city->id }}" {{ old('cityname') == $city->id ? 'selected' : '' }}>
            {{ $city->City_name }}
            </option>
            @endforeach
            </select>
            @error('cityname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        
    
    
    
        
            <div class="col-6">
            <label class="form-label required-field" for="hiredata">Hire Date </label>
            <input type="date" name="hiredate"   class="form-control @error('hiredate') is-invalid @enderror"
            id="Hiredate" placeholder="Enter Hiredate" value="{{ old('hiredate') }}" />
            @error('hiredate')
    
    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
    
        </div>
    
    <div class="row mt-4">
                    <div class="col-6">
            <label class="form-label required-field" for="cnic"> Date of Birth </label>
            <input type="date" name="dateofbirth"   class="form-control @error('dateofbirth') is-invalid @enderror"
            id="dateofbirth" placeholder="Enter Date of birth" value="{{ old('dateofbirth') }}" />
            @error('dateofbirth')
    
    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        
    
    
    
    
            <div class="col-6">
            <label class="form-label required-field" for="salary"> Salary </label>
            <input type="number" name="salary"   class="form-control @error('salary') is-invalid @enderror"
            id="Salary" placeholder="Enter Salary" value="{{ old('salary') }}" />
            @error('salary')
    
    
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>    
   
    
            <div class="col-6 mt-3">
                <div class="mb-3">
                    <label class="form-label required-field" for="role-select">Role</label>
                    <select name="role" id="role-select" class="form-select @error('role') is-invalid @enderror">
                        <option value="" disabled selected>Select a role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                {{ $role->RoleName }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
          
            
             
        
    
    
    
    
      
    
    
    
          
    
            <!-- Submit Button -->
    
            <button type="submit" id="btnbranch" class="btn btn-primary gradient-btn mt-4" >Submit</button>
            </div>
    
            </div>
    
            </div>
    
            </div>
            </div>
    
    
    
        @endsection
    
    
    
    
    
    