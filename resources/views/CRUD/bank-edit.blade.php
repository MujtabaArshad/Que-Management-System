
 
@extends('CRUD.layouts.master')
@section('title', 'Edit Bank')
@section('content')

 
          
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Basic Layout -->
            <div id="card" class="row">
            <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Bank</h5>
            </div>
            <div class="card-body">
            <form action="{{route('updateBank',$banks->BankId)}}" method="post">
            @csrf
            <div class="row">
            <!-- First Name -->
            <div class="col-6">
            <label class="form-label" for="first-name">First Name</label>
            <input type="text" name="Bankname" class="form-control"
             value="{{$banks->Bankname}}"
             id="first-name" placeholder="Enter Your First Name" />
            </div>


            <!-- Last Name -->
            <div class="col-6">
            <label class="form-label" for="email">Email</label>
            <input type="text" name="email" class="form-control"
            value="{{$banks->email}}" id="email" placeholder="Enter Your Email" />
            </div>
            </div>

            <div class="row mt-4">
            <!-- Email -->
            <div class="col-6">
            <label class="form-label" for="email">Contact</label>
            <input type="text" name="contact" class="form-control"
            value="{{$banks->contact}}" id="contact" placeholder="Enter Your Contact" />
            </div>

            <!-- Address -->
            <div class="col-6">
            <label class="form-label" for="address">No of employee</label>
            <input type="text" name="No_of_Employee" class="form-control"
            value="{{$banks->No_of_Employee}}" id="No_of_Employee" placeholder="Enter No_of_Employee" />
            </div>
            </div>

            <div class="row mt-4">
            <!-- Age -->
            <div class="col-6">
            <label class="form-label" for="age">NTN</label>
            <input type="number" name="NTN" class="form-control" id="NTN"
            value="{{$banks->NTN}}" placeholder="Enter Your NTN" />
            </div>
            <!-- Address -->

            <div class="col-6">
            <label class="form-label" for="Address">Address</label>
            <input type="text" name="Address" class="form-control"
            value="{{$banks->Address}}"
            id="Address" placeholder="Enter Your Address" />
            </div>



            <!-- password -->
            <div class="row mt-4">
            <div class="col-6">
            <label class="form-label" for="password">Password</label>
            <input type="text" name="Password" class="form-control"
            value="{{$banks->Password}}" id="password" placeholder="Enter Password" />
            </div>

            <!-- Branches -->

            <div class="row mt-4">
            <div class="col-6">
            <label class="form-label" for="password">Branches</label>
            <input type="text" name="Branches" class="form-control"
            value="{{$banks->Branches}}" id="Branches" placeholder="Enter Your Branches "/>
            </div>

            <!-- Edit Submit Button -->
        <div style="margin-top:40px; margin-left:10px;" class="text-start mb-4  ">

        <button type="submit" class="btn btn-primary gradient-btn">Edit</button>

        </div>
            </div>

        </form>
        </div>

        </div>

        </div>
        </div>
        </div>
        </div>
        </div>



 @endsection