 
<style>
    table th, table td {
        white-space: nowrap;   
    }
    .table td {
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 230px;
    }
    .table th {
        max-width: 180px;
    }
    .card {
        width: 100%;
        max-width: 1500px;
        margin: auto;
    }
    .table-responsive {
        overflow-x: auto;
    }
</style>


@extends('CRUD.layouts.master')
@section('title', 'View Branch Manager')
    @section('content')
<!-- Content wrapper -->
<div class="container my-4">
    <div class="card">
        <h5 class="card-header">View Branch Manager</h5>
        <div class="card-body">
            <div class="table-responsive"> 
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Branch Name</th>
                            <th>Branch Address</th>
                            <th>Branch Code</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if($branch)
                            <tr>
                                <td>{{ Auth::guard('managers')->user()->Firstname }}</td>
                                <td>{{ $branch->BranchName }}</td>
                                <td>{{ $branch->BranchAddress }}</td>
                                <td>{{ $branch->BranchCode }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="4">No branch information available.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 @endsection