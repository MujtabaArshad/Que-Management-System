
<style>
      table th, table td {
        white-space: nowrap;
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
        max-width: 280px;
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

    .action-icons i {
        font-size: 16px;
        margin: 0 10px;
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

@extends('CRUD.layouts.master')
@section('title', 'View User')
    @section('content')
<!-- Content wrapper -->
<div class="container my-4">
    <div class="card">
        <h5 class="card-header">View User</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>NTN</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->FirstName }}</td>
                            <td>{{ $user->LastName }}</td>
                            <td>{{ $user->Email }}</td>
                            <td>{{ $user->Address }}</td>
                            <td>{{ $user->Age }}</td>
                            <td>{{ $user->NTN }}</td>
                            <td>{{ $user->Gender }}</td>
                            <td>{{ $user->RoleID }}</td>


                            <td>
                                <form action="{{ route('UpdateStatus', ['id' => $user->id]) }}" method="POST" id="statusForm-{{ $user->id }}">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $user->Status ? 0 : 1 }}">
                                    <div class="form-check form-switch mt-1">
                                        <input class="form-check-input" type="checkbox" id="statusSwitch-{{ $user->id }}" name="status"
                                            value="1" {{ $user->Status ? 'checked' : '' }}
                                            onchange="document.getElementById('statusForm-{{ $user->id }}').submit();">
                                        <label class="form-check-label mt-1" for="statusSwitch-{{ $user->id }}">
                                            {{ $user->Status ? 'Active' : 'Inactive' }}
                                        </label>
                                    </div>
                                </form>
                            </td>

                            <td class="action-icons">
                                <!-- Edit button -->
                                <a href="{{ route('EditUser', $user->id) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <!-- View button -->
                                <a href="{{ route('editview', $user->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Delete button -->
                                <a href="{{ url('deleteuser/'.$user->id) }}" class="delete-icon">
                                    <i class="fas fa-trash" onclick="return confirm('Are you sure you want to delete this user?');"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection