 
@extends('CRUD.layouts.master')
@section('title', 'View Bank')
@section('content')

<style>
    table th, table td {
        white-space: nowrap; /* Prevent text wrapping */
    }

    /* Table styling */
    .table {
        width: 100%;
        max-width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        white-space: nowrap;
    }

    .table th {
        background-color: #f5f5f5;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        font-size: 13px;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s ease;
    }

    .table td {
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 230px;
    }

    /* Card Styling */
    .card {
        width: 100%;
        max-width: 1500px;
        margin: auto;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 8px;
        background-color: #ffffff;
    }


    .card-body {
        padding: 16px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    /* Icon styling */
    .action-icons i {
        font-size: 16px;
        margin: 0 8px;
        padding: 8px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .action-icons i:hover {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .fa-pencil {
        color: #00c853;
        background-color: #e8f5e9;
    }

    .fa-eye {
        color: #2979ff;
        background-color: #e3f2fd;
    }

    .fa-trash {
        color: #ff1744;
        background-color: #ffebee;
    }

</style>

<!-- Content wrapper -->
<div class="container my-4">
    <div class="card">
        <h5 class="card-header">Bank Records</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>No Of Employee</th>
                            <th>NTN</th>
                            <th>Address</th>
                            <th>Branches</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($banks as $bank)
                        <tr>
                            <td>{{ $bank->Bankname }}</td>
                            <td>{{ $bank->email }}</td>
                            <td>{{ $bank->contact }}</td>
                            <td>{{ $bank->No_of_Employee }}</td>
                            <td>{{ $bank->NTN }}</td>
                            <td>{{ $bank->Address }}</td>
                            <td>{{ $bank->Branches }}</td>

                            <td class="action-icons">
                                <!-- Edit button -->
                                <a href="{{ url('editbank/'.$bank->BankId) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <!-- View button -->
                                <a href="{{ url('/viewbank/'.$bank->BankId) }}">
                                    <i class="fas fa-eye"></i>
                                </a>


                            <!-- Delete button inside a form -->
<form action="{{ route('deleteBank', $bank->BankId) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Bank?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" style="background:none; border:none; color:red;">
        <i class="fas fa-trash"></i>
    </button>
</form>
</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- End of table-responsive -->
        </div>
    </div>
</div>
 @endsection
