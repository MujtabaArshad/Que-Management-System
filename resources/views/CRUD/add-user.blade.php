 
<style>
.required-field::after {
    content: " *";
    color: red;
    font-size:16px;
    }
</style>


@extends('CRUD.layouts.master')
@section('title', 'Add User')
    @section('content')
          <!-- Content wrapper -->
        
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div id="card" class="row">
        <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add User</h5>
        </div>
        <div class="card-body">
        <form id="user-form" action="{{ route('adduser') }}" method="post">

        @csrf

        <div class="row">
        <!-- First Name -->
        <div class="col-6">
        <label class="form-label required-field" for="first-name" >First Name</label>
        <input type="text" name="FirstName" class="form-control @error('FirstName') is-invalid @enderror" 
        id="first-name" placeholder="Enter First Name" value="{{ old('FirstName') }}" />
        @error('FirstName')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        </div>

        <!-- Last Name -->
        <div class="col-6">
        <label class="form-label required-field" for="last-name" id="lstname">Last Name </label>
        <input type="text" name="LastName" class="form-control @error('LastName') is-invalid @enderror" 
        id="last-name" placeholder="Enter Last Name" value="{{ old('LastName') }}" />
        @error('LastName')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div>

        <div class="row mt-4">
        <!-- Email -->
        <div class="col-6">
        <label class="form-label required-field" for="email">Email </label>
        <input type="text" name="Email" class="form-control @error('Email') is-invalid @enderror" id="email"
         placeholder="Enter Email" value="{{ old('Email') }}" />
        @error('Email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div class="col-6">
            <label class="form-label required-field" for="email">Contact Number </label>
            <input type="contactnumber" name="contactnumber" class="form-control @error('contactnumber') 
            is-invalid @enderror" id="contactnumber"

             placeholder="Enter ContactNumber" value="{{ old('contactnumber') }}" />
            @error('contactnumber')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>

  

        <!-- Address -->
        <div class="row mt-4">
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
      

        
        <!-- Password -->
        <div class="col-6">
        <label class="form-label required-field" for="password">Password </label>
        <input type="password" name="Password" class="form-control @error('Password') is-invalid @enderror" 
        id="password" value="{{old('Password')}}" placeholder="Enter Your Password" />
        @error('Password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    </div>
        <!-- Gender -->
        <div class="row mt-4">
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
       

      
        <div class="col-md-6">
        <label class="form-label required-field" for="role-select">Select Role </label>
        <select name="rolename" id="City-select" class="form-select @error('rolename') is-invalid 
        @enderror">
        <option value="" disabled selected>Select Role</option>
        @foreach($roles as $role)
        <option value="{{ $role->id }}" {{old('rolename')==$role->id ?'selected':''}}>
        {{ $role->RoleName }}</option>
        @endforeach
        </select>
        @error('rolename')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div>
        <!-- Submit Button -->

        <button type="submit" class="btn btn-primary gradient-btn" style="margin-right:50px; margin-top:40px;  ">Submit</button>
        </form>
        </div>

        </div>
        
        </div>
                
        </div>
        </div>

       @endsection





