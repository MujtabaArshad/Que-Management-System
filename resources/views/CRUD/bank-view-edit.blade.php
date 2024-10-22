
 
@extends('CRUD.layouts.master')
@section('title', 'View Bank')
@section('content')

       
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Layout -->
        <div id="card" class="row">
        <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">View Bank</h5>
        </div>
        <div class="card-body">
        <form action="" method="post">
        @csrf
        <div class="row">
        <!-- First Name -->
        <div class="col-6">
        <label class="form-label" for="first-name">First Name</label>
        <input type="text" name="Bankname" class="form-control"
        value="{{$banks->Bankname}}" disabled id="first-name" placeholder="Enter First Name" />
        </div>


        <!-- Last Name -->
        <div class="col-6">
        <label class="form-label" for="last-name">Email</label>
        <input type="text" name="email" class="form-control"
        value="{{$banks->email}}" disabled id="email" placeholder="Enter Email" />
        </div>
        </div>

        <div class="row mt-4">
        <!-- Email -->
        <div class="col-6">
        <label class="form-label" for="email">Contact</label>
        <input type="text" name="Email" class="form-control"
         value="{{$banks->contact}}" disabled id="contact" placeholder="Enter Contact" />
        </div>

        <!-- Address -->
        <div class="col-6">
        <label class="form-label" for="address">No of employee</label>
        <input type="text" name="No_of_Employee" class="form-control"
        value="{{$banks->No_of_Employee}}" disabled id="No_of_Employee" placeholder="Enter No_of_Employee" />
        </div>
        </div>

        <div class="row mt-4">
        <!-- Age -->
        <div class="col-6">
        <label class="form-label" for="age">NTN</label>
        <input type="number" name="NTN" class="form-control" id="NTN"
        value="{{$banks->NTN}}" disabled placeholder="Enter NTN" />
        </div>
        <!-- Address -->

        <div class="col-6">
        <label class="form-label" for="Address">Address</label>
        <input type="text" name="Address" class="form-control"
         value="{{$banks->Address}}" disabled id="Address" placeholder="Enter Your Address" />
        </div>
        <!-- Password -->

        <div class="row mt-4">
        <div class="col-6">
        <label class="form-label" for="age">Password</label>
        <input type="text" name="Bankpassword" class="form-control"
        value="{{$banks->Password}}" disabled id="Bankpassword" placeholder="Enter Your Password" />
        </div>

        <!-- Submit Button -->
        <div style="margin-top:40px; margin-left:10px;" class="text-start mb-4  ">
        </div>


        </form>
        </div>

        </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- include footer file -->

@endsection




