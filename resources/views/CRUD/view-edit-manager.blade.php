
@extends('CRUD.layouts.master')
@section('title', 'View Manager')
    @section('content')

         


        <!-- Content wrapper -->
        <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Layout -->
        <div id="card" class="row">
        <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Branch Manager</h5>
        </div>

        <div class="card-body">
            <form action="" method="POST">
                @csrf
        <div class="row">
        <!-- First Name -->
        <div class="col-6">
        <label class="form-label" for="first-name">First Name</label>
        <input type="text" name="fstname" class="form-control" value="{{$managers->Firstname}}" disabled id="first-name" placeholder="Enter First Name" />
        </div>




        <!-- Email -->
        <div class="col-6">
        <label class="form-label" for="email">Email</label>
        <input type="text" name="Email" class="form-control" disabled value="{{$managers->Email}}" id="email" placeholder="Enter Email" />
        </div>
        </div>
<!-- Password -->
<div class="row mt-4">
    <div class="col-6">
    <label class="form-label" for="age">Password</label>
    <input type="text" name="Password" disabled class="form-control" value="{{$managers->Password}}" id="age" placeholder="Enter Password" />

    </div>
        <!-- Address -->
        <div class="col-6">
        <label class="form-label" for="address">Address</label>
        <input type="text" name="Address" disabled class="form-control" value="{{$managers->Address}}" id="address" placeholder="Enter Address" />
        </div>
        </div>

        <div class="row mt-4">
        <!-- Age -->
        <div class="col-6">
        <label class="form-label" for="age">Age</label>
        <input type="number" name="Age" disabled class="form-control" id="age" value="{{$managers->Age}}" placeholder="Enter Age" />
        </div>
          <!-- NTN  -->
        <div class="col-6">
        <label class="form-label" for="age">NTN</label>
        <input type="number" name="NTN" disabled class="form-control" id="NTN"
        value="{{$managers->NTN}}" placeholder="Enter NTN" />
        </div>
        </div>




        <!-- Gender -->
        <div class="row mt-4">
        <div class="col-6">
        <div class="mb-3">
        <label class="form-label" for="gender-select">Select Gender</label>
        <select name="Gender" disabled id="gender-select" class="form-select">
        <option value="" disabled select>Select Gender</option>
        <option value="Male" {{ $managers->Gender == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $managers->Gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        </div>
        </div>


<div class="col-6">
    <label class="form-label required-field" for="cnic">Hire Date </label>
    <input type="date" name="Hiredate" disabled value="{{$managers->HireDate}}"  class="form-control "
    id="Hiredate" placeholder="Enter Hiredate"   />




    </div>
</div>


 <div class="row mt-4">
    <div class="col-6">
        <label class="form-label required-field" for="cnic"> Date of Birth </label>
        <input type="date" name="dateofbirth"  disabled value="{{$managers->Date_of_birth}}"  class="form-control "
        id="dateofbirth" placeholder="Enter Date of birth"   />

        </div>


<div class="col-6">
    <label class="form-label required-field" for="cnic"> Salary </label>
    <input type="number" name="Salary" disabled   value="{{$managers->Salary}}" class="form-control " >


        </div>
    </div>

        <br>
        <br>
        </form>
        </div>


        </div>

        </div>
        </div>
        </div>
@endsection

