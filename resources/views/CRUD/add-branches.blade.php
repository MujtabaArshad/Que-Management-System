


  <style>
  .required-field::after {
  content: " *";
  color: red;
  font-size:16px;
  }
  </style>


@extends('CRUD.layouts.master')

@section('title', 'Add Branch')
    @section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Basic Layout -->
<div class="row">
<div class="col-xl-12">
<div class="card mb-4">
<div class="card-header d-flex justify-content-between align-items-center">
<h5 class="mb-0">Add Branch</h5>
</div>

<div class="card-body">
<form action="{{ route('insertData') }}" method="POST">
@csrf

<!-- Bank Selection -->
<div class="row mb-3">
<div class="col-md-6">
<!-- bank lebel -->
<label class="form-label required-field" for="bank-select">Bank </label>
<select name="bankname" id="bank-select" 
class="form-select @error('bankname') is-invalid @enderror">
<!-- select bank -->
<option value="" disabled selected>Select Bank</option>
@foreach($banks as $bank)
<option {{ old('bankname') == $bank->BankId ? 'selected' : '' }}  value=" {{$bank->BankId}}">{{$bank->Bankname }}</option>
@endforeach
</select>
<!-- end select -->

@error('bankname')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
<!-- end messege -->
</div>


<!-- Branch Code -->
<div class="col-md-6">
<label class="form-label required-field" for="basic-default-branchCode">Branch Code</label>
<input type="number" name="BranchCode" value="{{old('BranchCode')}}" 
class="form-control @error('BranchCode') is-invalid @enderror" maxlength="5"
id="basic-default-branchCode" placeholder="Branch Code" />
@error('BranchCode')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>

<!-- End Branch -->


<!-- Branch Name -->
<div class="row mb-3">
<div class="col-md-6">
<label class="form-label required-field" for="basic-default-branchName">Branch Name </label>
<input type="text" name="BranchName" value="{{old('BranchName')}}" 
class="form-control @error('BranchName') is-invalid @enderror" maxlength="100" 
id="basic-default-branchName" placeholder="Branch Name" />
@error('BranchName')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<!-- End Branch Name -->

<!-- City Selection -->
<div class="col-md-6">
<label class="form-label required-field" for="City-select">City </label>
<select name="cityname" id="City-select" class="form-select @error('cityname') is-invalid 
@enderror">
<option value="" disabled selected>Select City</option>
@foreach($cities as $city)
<option value="{{ $city->id }}" {{old('cityname')==$city->id ?'selected':''}}>
{{ $city->City_name }}</option>
@endforeach
</select>
@error('cityname')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<!-- End City -->
<!-- Address Line -->

<div class="row mb-3">
<div class="col-md-6">
<label class="form-label required-field" for="basic-default-company">Address Line </label>
<input type="text" name="BranchAddress" class="form-control @error('BranchAddress') is-invalid @enderror"
id="addressline"  value="{{ old('BranchAddress')}}"placeholder="Enter Your Address Line" />    

@error('BranchAddress')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<!-- End Address -->

<!-- Submit button -->
<button type="submit" id="btnbranch" class="btn btn-primary gradient-btn">Submit</button>
</div>
</div>
</div>
</div>
</div>
@endsection

