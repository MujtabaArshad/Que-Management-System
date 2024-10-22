


@extends('CRUD.layouts.master')
@section('title', 'View Branch')
    @section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
          

          <!-- Basic Layout -->
          <div class="row">
          <div class="col-xl">
          <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">View Branch</h5>

          </div>
        <div class="card-body">
        <form action="" method="post" >
        @csrf
        <div class="row">
        <div class="col-6">

        <label class="form-label" for="basic-default-fullname">Branch Name</label>
        <input type="text" name="BranchName" class="form-control" disabled value="{{ $branchview->BranchName }}"  id="basic-default-fullname" placeholder="Category Name" />

        </div>

        <div class="col-6">

        <label class="form-label" for="basic-default-company">Branch Address</label>
        <input type="text" name="BranchAddress" class="form-control" disabled value="{{ $branchview->BranchAddress }}"id="basic-default-company" placeholder="Category Description" />

        </div>
        </div>


        <div class="row mt-4">
        <div class="col-6">

        <label class="form-label" for="basic-default-fullname">Branch Code</label>
        <input type="text" name="BranchCode" disabled  value="{{ $branchview->BranchCode }}" class="form-control" id="basic-default-fullname" placeholder="Category Name" />


        </div>

        </div>
     


        <br><br>

        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        
      @endsection















