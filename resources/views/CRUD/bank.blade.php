

<style>
.required-field::after {
    content: " *";
    color: red;
    font-size: 16px;
}
</style>

@extends('CRUD.layouts.master')
@section('title', 'Add Bank')
    @section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div id="card" class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Bank</h5>
                    </div>
                    <div class="card-body">
                        <form id="user-form" action="{{ route('insertForm') }}" method="post">
                            @csrf
                            <div class="row mt-4">
                                <!-- Bank Name -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="bank-name">Bank Name</label>
                                    <input type="text" name="Bankname" class="form-control @error('Bankname') is-invalid @enderror"
                                        placeholder="Enter Name" value="{{ old('Bankname') }}" />
                                    @error('Bankname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="email">Email</label>
                                    <input type="text" name="Email" class="form-control @error('Email') is-invalid @enderror"
                                        placeholder="Enter Email" value="{{ old('Email') }}" />
                                    @error('Email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <!-- Contact -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="contact">Contact</label>
                                    <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                                        placeholder="Enter Your Number" value="{{ old('contact') }}" />
                                    @error('contact')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Number of Employees -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="No_of_Employee">Number of Employees</label>
                                    <input type="number" name="No_of_Employee" class="form-control @error('No_of_Employee') is-invalid @enderror"
                                        placeholder="Enter Number of Employees" value="{{ old('No_of_Employee') }}" />
                                    @error('No_of_Employee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <!-- NTN -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="NTN">NTN</label>
                                    <input type="number" name="NTN" class="form-control @error('NTN') is-invalid @enderror"
                                        placeholder="Enter Your NTN" value="{{ old('NTN') }}" />
                                    @error('NTN')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="Address">Address</label>
                                    <input type="text" name="Address" class="form-control @error('Address') is-invalid @enderror"
                                        placeholder="Enter Your Address" value="{{ old('Address') }}" />
                                    @error('Address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <!-- Password -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="Password">Password</label>
                                    <input type="password" name="Password" class="form-control @error('Password') is-invalid @enderror"
                                        placeholder="Enter Your Password" value="{{ old('Password') }}" />
                                    @error('Password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Branches -->
                                <div class="col-6">
                                    <label class="form-label required-field" for="Branches">Branches</label>
                                    <input type="text" name="Branches" class="form-control @error('Branches') is-invalid @enderror"
                                        placeholder="Enter Branches" value="{{ old('Branches') }}" />
                                    @error('Branches')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <br><br>

                            <!-- Submit Button -->
                            <div class="text-start mb-5">
                                <button type="submit" class="btn btn-primary gradient-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

