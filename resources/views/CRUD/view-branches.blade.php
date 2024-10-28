


@extends('CRUD.layouts.master')
@section('title', 'View Branch')
    @section('content')

  <style>
    #downloadButton{
      width: 130px;
      margin-left:150px;
       margin: buttom 50px;
       margin-top:30px;
    }
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
  <div class="container my-4">
  <div id="card" class="card">
  <h5 class="card-header">Bank Records</h5>
  <div class="card-body">
  <div class="table-responsive">
  <table class="table table-striped table-bordered">
  <thead>
  <tr>
  <th>Branch Name</th>
  <th>Branch Code</th>
  <th>Branch Address</th>
  <th>Bank Name</th>
  <th>City Name</th>
  <th>Actions</th>
  <th>Scan</th>
  </tr>
  </thead>
  <tbody>
    @foreach($branches as $branch)
<tr>
  <td>{{ $branch->BranchName }}</td>
  <td>{{ $branch->BranchCode }}</td>

  <td>{{ $branch->BranchAddress }}</td>
  <td>{{ $branch->Bankname }}</td>
  <td>{{ $branch->City_name }}</td>

  <!-- Actions (edit, view, delete) -->

  <td class="action-icons">

    <a href="{{route('editbranch',$branch->BranchID) }}">
        <i class="fa-solid fa-pencil"></i>
    </a>


    <a href=" {{route('vieweditbranch',$branch->BranchID)}}">
        <i class="fas fa-eye"></i>


    </a>

    <form action="{{ route('deleteBranch', $branch->BranchID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Branch?');" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background:none; border:none; color:red;">
            <i class="fas fa-trash"></i>
        </button>
    </form>

  </td>

  <!-- View QR Code -->
  <td>
    <i style="font-size:25px; margin-left:20px;" class="fa-solid fa-qrcode" data-bs-toggle="modal" data-bs-target="#modal_{{ $branch->BranchID }}"></i>
  </td>
</tr>
  </tbody>

<!-- Generate a unique modal for each branch -->
<div class="modal fade" id="modal_{{ $branch->BranchID }}" tabindex="-1" aria-hidden="true">
  <div style="width:480px;" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">QR Code Scan for {{ $branch->BranchName }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      
    
      {{-- download --}}

      <div class="modal-body text-center">
      <img id="qrcode_{{$branch->BranchCode}}"
      src="https://api.qrserver.com/v1/create-qr-code/?size=270x270&data=
      {{ urlencode(url('/option/view/branch/data?BranchCode='.$branch->BranchCode)) }}"
      alt="QR Code"
      class="img-fluid">
      </div>


        <button id="downloadButton"
        onclick="downloadQRCode('{{ urlencode(url('option/view/branch/data?BranchCode='.$branch->BranchCode)) }}',
        '{{ $branch->BranchCode }}')" class=" gradient-btn btn btn-primary mb-5">Download</button>

    </div>

  </div>

</div>
</div>
  </div>
  </div>
  </div>


@endforeach
</tbody>

</table>
</div>
</div>
</div>
</div>

@endsection







