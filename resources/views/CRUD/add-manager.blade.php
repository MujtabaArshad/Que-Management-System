     
        <style>
        .required-field::after {
        content: " *";
        color: red;
        font-size:16px;
        }
        </style>

@extends('CRUD.layouts.master')
@section('title', 'Add Manager')
    @section('content')
        <!-- Content wrapper -->
      
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div id="card" class="row">
        <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add manager</h5>
        </div>
        <div class="card-body">
        <form id="user-form" action="{{route('addmanager')}} " method="post">

        @csrf

        <div class="row">
        <!-- First Name -->
        <div class="col-6">
        <label class="form-label required-field" for="first-name" >First Name</label>
        <input type="text" name="fstname" class="form-control @error('fstname') is-invalid @enderror"
        id="first-name" placeholder="Enter First Name" value="{{ old('fstname') }}" />
        @error('fstname')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        </div>



        <!-- Email -->
        <div class="col-6">
        <label class="form-label required-field" for="email">Email </label>
        <input type="Email" name="Email" class="form-control @error('Email') is-invalid @enderror" id="email"
        placeholder="Enter Email" value="{{ old('Email') }}" />
        @error('Email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div>
        <div class="row mt-4">
        <!-- Password -->
        <div class="col-6">
        <label class="form-label required-field" for="password">Password </label>
        <input type="password" name="Password" class="form-control @error('Password') is-invalid @enderror"
        id="password" value="{{old('Password')}}" placeholder="Enter Your Password" />
        @error('Password')
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
        <input type="text" name="Address" class="form-control @error('Address') is-invalid @enderror" id="address"
        placeholder="Enter Address" value="{{ old('Address') }}" />
        @error('Address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        

        
        <!-- Age -->
        <div class="col-6">
        <label class="form-label required-field" for="age">Age </label>
        <input type="number" min="0" name="Age" class="form-control @error('Age') is-invalid @enderror"
        id="age" placeholder="Enter Your Age" value="{{ old('Age') }}" />
        @error('Age')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    </div>
        <!-- NTN -->
        <div class="row mt-4">
        <div class="col-6">
        <label class="form-label required-field" for="cnic">NTN </label>
        <input type="number" name="NTN"   class="form-control @error('NTN') is-invalid @enderror"
        id="NTN" placeholder="Enter NTN" value="{{ old('NTN') }}" />
        @error('NTN')


        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>



        <!-- Gender -->
        
        <div class="col-6">
        <div class="mb-3">
        <label class="form-label required-field" for="gender-select">Select Gender </label>
        <select name="Gender" id="gender-select" class="form-select @error('Gender') is-invalid @enderror">
        <option value="" disabled selected>Select Gender</option>
        <option value="Male" {{ old('Gender') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female"{{old ('Gender') == 'Female' ? 'selected' : '' }}>Female</option>

        </select>
        @error('Gender')
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
      
        <div class="col-6">
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
        <div class="col-6">
        <label class="form-label required-field" for="branch-select">Select Branch Code</label>
        <select name="branchcode" id="branch-select" class="form-select @error('branchcode') is-invalid @enderror">
        <option value="" disabled selected>Select Branch</option>
        @foreach($branches as $branch)
        <option value="{{ $branch->BranchCode }}" {{ old('branchcode') == $branch->BranchCode ? 'selected' : '' }}>
        {{ $branch->BranchCode }}
        </option>
        @endforeach
        </select>
        @error('branchcode')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        





        <!-- City Dropdown -->
        <div class="col-6">
        <label class="form-label required-field" for="branch-select">Select City</label>
        <select name="Cityname" id="City-select" class="form-select @error('Cityname') is-invalid @enderror">
        <option value="" disabled selected>Select City</option>
        @foreach($cities as $city)
        <option value="{{ $city->id }}" {{ old('Cityname') == $city->id ? 'selected' : '' }}>
        {{ $city->City_name }}
        </option>
        @endforeach
        </select>
        @error('Cityname')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    </div>



    <div class="row mt-4">

        <div class="col-6">
        <label class="form-label required-field" for="cnic">Hire Date </label>
        <input type="date" name="Hiredate"   class="form-control @error('Hiredate') is-invalid @enderror"
        id="Hiredate" placeholder="Enter Hiredate" value="{{ old('Hiredate') }}" />
        @error('Hiredate')


        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        


                <div class="col-6">
        <label class="form-label required-field" for="cnic"> Date of Birth </label>
        <input type="date" name="dateofbirth"   class="form-control @error('dateofbirth') is-invalid @enderror"
        id="dateofbirth" placeholder="Enter Date of birth" value="{{ old('dateofbirth') }}" />
        @error('dateofbirth')


        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    </div>




    <div class="row mt-4">
        <div class="col-6">
        <label class="form-label required-field" for="cnic"> Salary </label>
        <input type="number" name="Salary"   class="form-control @error('Salary') is-invalid @enderror"
        id="Salary" placeholder="Enter Salary" value="{{ old('Salary') }}" />
        @error('Salary')


        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
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
        </div>
{{--
        <div class="col-6 mt-3">
        <div class="mb-3">
        <label class="form-label required-field" for="gender-select">Role</label>
        <select name="role" id="gender-select" class="form-select @error('Cityname') is-invalid @enderror">
        <option value="" disabled selected>Select a role</option>
        @foreach ($roles as $role)
        <option value="{{ $role->id}}">{{old('role')==  $role->id ? '1selected' :'' }}



            {{$role->RoleName}}
        </option>



        @endforeach


        </select>
        @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div> --}}

       
        {{--



        {{--




        <div class="col-6">
        <div class="mb-3">
        <label class="form-label required-field" for="gender-select">Branch manager</label>
        <button id="toggle-dropdown" class="btn btn-primary mb-2">Select User</button>
        <select name="branch-manager" id="gender-select" class="form-select" style="display: none;"> <!-- Initially hidden -->
        <option value="" disabled selected>Select a branch</option>
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->Branch_name }}</option>
        @endforeach
        </select>
        </div>

        </div>
        --}}
        {{-- <script>
        document.getElementById('maneger-dropdown').addEventListener('click', function() {
        var dropdown = document.getElementById('branch-select');
        if (dropdown.style.display === "none") {
        dropdown.style.display = "block";
        } else {
        dropdown.style.display = "none";
        }
        });
        </script> --}}


        <!-- Submit Button -->

        <button type="submit" id="btnbranch" class="btn btn-primary gradient-btn">Submit</button>
        </div>

        </div>

        </div>

        </div>
        </div>



    @endsection





