
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
    .filter-container {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }
    .table-responsive {
        overflow-x: auto;
    }
    .select-btn {
        width: 200px;
        margin-right: 20px;
    }

</style>
@extends('CRUD.layouts.master')
@section('title', 'View Transaction')

@section('content')
<!-- Content wrapper -->
<div class="container my-4">
    
    <div class="card">
        
        <div class="filter-container">
       
              
            <h5 class="card-header">View Transaction</h5>

            <div class="col-auto dropdown p-4">
                <button class="btn rounded-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="display:flex; box-shadow:0px 1px 5px rgba(0, 0, 0, 0.16);">
                    <i class="bx bx-filter me-1"></i>
                    <span>Filter</span>
                    
                        
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" id="alltransaction" href="#" data-value="">All</a>
                    </li>
                    
                </ul>
            </div>

        </div>

         <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Branch Name</th>
                        <th>Branch Address</th>
                        <th>Branch Code</th>
                        <th>Bank Name</th>
                        <th>City Name</th>
                        
                    </tr>
                </thead>
                <tbody id="transactionBody">
                     @foreach ($branches as $branch)
                        <tr>
                            <td>{{ $branch->BranchName }}</td>
                            <td>{{ $branch->BranchAddress }}</td>
                            <td>{{ $branch->BranchCode }}</td>
                            <td>{{ $branch->Bankname }}</td>
                            <td>{{ $branch->City_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
 
</div>
</div>



@endsection


<script src="{{asset('/assets/js/jquery-3.7.1.min.js')}}"></script>
<script>
    
            
$(document).ready(function() {
    $('.dropdown-item').on('click', function(e) {
        e.preventDefault();  
        var transaction = $(this).data('value');  

        $.ajax({
            url: "{{ route('viewtransaction') }}",   
            type: "GET",
            data: { 'transaction': transaction },  
            success: function(data) {
                $('#transactionBody').empty();

                if (data.transactions.length > 0) {
                    $.each(data.transactions, function(index, transaction) {
                        $('#transactionBody').append(
                            '<tr>' +
                                '<td>' + transaction.customer_name + '</td>' +
                                '<td>' + transaction.customer_phone + '</td>' +
                                '<td>' + transaction.transaction_name + '</td>' +
                                '<td>' + transaction.ticket_number + '</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    $('#transactionBody').append(
                        '<tr><td colspan="4">No transactions found for this filter.</td></tr>'
                    );
                }
            },
            error: function() {
                alert("An error occurred while fetching transactions. Please try again later.");
            }
        });
    });
});
</script>





