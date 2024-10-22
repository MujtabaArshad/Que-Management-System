
@extends('CRUD.layouts.master')
@section('title', 'Edit User')
    @section('content')

        <!-- Content wrapper -->
            

        <!-- Content wrapper -->
        <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Layout -->
        <div id="card" class="row">
        <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit User</h5>
        </div>

        <div class="card-body">
        <form action="" method="post">
        @csrf
        <div class="row">
        <!-- First Name -->
        <div class="col-6">
        <label class="form-label" for="first-name">First Name</label>
        <input type="text" name="FirstName" class="form-control" value="{{$users->FirstName}}" id="first-name" placeholder="Enter First Name" />
        </div>


        <!-- Last Name -->
        <div class="col-6">
        <label class="form-label" for="last-name">Last Name</label>
        <input type="text" name="LastName" class="form-control" value="{{$users->LastName}}" id="last-name" placeholder="Enter Last Name" />
        </div>
        </div>

        <div class="row mt-4">
        <!-- Email -->
        <div class="col-6">
        <label class="form-label" for="email">Email</label>
        <input type="text" name="Email" class="form-control" value="{{$users->Email}}" id="email" placeholder="Enter Email" />
        </div>

        <!-- Address -->
        <div class="col-6">
        <label class="form-label" for="address">Address</label>
        <input type="text" name="Address" class="form-control" value="{{$users->Address}}" id="address" placeholder="Enter Address" />
        </div>
        </div>

        <div class="row mt-4">
        <!-- Age -->
        <div class="col-6">
        <label class="form-label" for="age">Age</label>
        <input type="number" name="Age" class="form-control" id="age" value="{{$users->Age}}" placeholder="Enter Age" />
        </div>
          <!-- NTN  -->
        <div class="col-6">
        <label class="form-label" for="age">NTN</label>
        <input type="number" name="NTN" class="form-control" id="NTN"  
        value="{{$users->NTN}}" placeholder="Enter NTN" />
        </div>
        </div>    

        <!-- Password -->
        <div class="row mt-4">
        <div class="col-6">
        <label class="form-label" for="age">Password</label>
        <input type="text" name="Password" class="form-control" value="{{$users->Password}}" id="age" placeholder="Enter Password" />

        </div>
             
 
        <!-- Gender -->
        <div class="col-6">
        <div class="mb-3">
        <label class="form-label" for="gender-select">Select Gender</label>
        <select name="Gender" id="gender-select" class="form-select">
        <option value="" disabled select>Select Gender</option>
        <option value="Male" {{ $users->Gender == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $users->Gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        </div>
        </div>
        </div>

        <!-- Role -->
        <div class="col-6">
        <div class="mb-3">
        <label class="form-label" for="role-select">Select Role</label>
        <select name="RoleID" id="role-select" class="form-select">
        <option value="" disabled selected>Select Role</option>
        @foreach($roles as $role)
        <option value="{{ $role->id }}" {{ $users->RoleID == $role->id ? 'selected' : '' }}>
        {{ $role->RoleName }}
        </option>
        @endforeach
        </select>
        </div>
        </div>
       
        <br>
        <br>
        <div class="text-start mb-4  ">
        <button   type="submit" class="btn btn-primary gradient-btn">Edit</button>
        </div>

        </form>
        </div>

        </div>

        </div>
        </div>
        </div>

    @endsection