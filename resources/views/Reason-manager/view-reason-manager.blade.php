
@extends('CRUD.layouts.master')
@section('title', 'View Manager')
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
        <h5 class="card-header">View  Manager</h5>
        <div class="card-body">
            <div class="table-responsive"> 

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>NTN</th>
                        <th>Gender</th>
                        <th>Bank Name</th>
                        <th>Branch Name</th>
                        <td>Branch ID</td>
                             <th>City Name</th>
                        <th>Hire Date</th>
                        <th>Date Of Birth</th>
                        <th>Salary</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($reason_manager as $manager)
                    <tr>
                        <td>{{ $manager->firstname }}</td>
                        <td>{{ $manager->email }}</td>
                        <td>{{ $manager->address }}</td>
                        <td>{{ $manager->age }}</td>
                        <td>{{ $manager->ntn }}</td>
                        <td>{{ $manager->gender }}</td>
                        <td>{{ $manager->Bankname }}</td>
                     
                        <td>{{ $manager->BranchName }}</td>
                        <td>{{ $manager->branchid }}</td>
                        <td>{{ $manager->City_name }}</td>
                         
                        <td>{{ $manager->hiredate }}</td>
                        <td>{{ $manager->dateofbirth }}</td>
                        <td>{{ $manager->salary}}</td>
                        <td>{{ $manager->role}}</td>

                        <td class="action-icons">
                        <!-- Edit button -->
                        <a href="{{ route('editreasonmanager', $manager->id) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <a href=" {{route('profileshowedit',$manager->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>



                        <form action="{{ route('deletereasonmanager', $manager->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this manager?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none; background:none; cursor:pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

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