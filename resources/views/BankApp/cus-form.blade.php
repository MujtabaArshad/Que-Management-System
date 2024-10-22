<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Form </title>
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
    </head>
    <body>
    <div class="overlay" id="overlay"></div>

    <div id="formModal" class="modal">
        <form action="{{ route('savedata') }}" id="transactionForm" onsubmit="handleFormSubmit(event)" 
        method="post">
            @csrf
            <label for="fname" class="required-field">First Name</label>
    <input type="text" id="fname" name="customer_name" placeholder="Your name.." oninput="validateName()">
    <span id="nameError"></span>

    <label for="phoneNumber" class="required-field">Phone Number</label>
    <div class="phone-input-wrapper">
    <select id="simCode" class="sim-code-dropdown" name="simcode">
    <option value="">Select</option>

    <option value="0301">0301</option>
    <option value="0302">0302</option>
    <option value="0303">0303</option>
    <option value="0304">0304</option>
    <option value="0305">0305</option>
    <option value="0306">0306</option>
    <option value="0307">0307</option>
    <option value="0308">0308</option>
    <option value="0309">0309</option>
    <option value="0337">0337</option>
    <option value="0311">0311</option>
    <option value="0312">0312</option>                
    <option value="0313">0313</option>
    <option value="0314">0314</option>
    <option value="0315">0315</option>
    <option value="0330">0330</option>
    <option value="0331">0331</option>
    <option value="0332">0332</option>
    <option value="0333">0333</option>
    <option value="0335">0335</option>
    <option value="0336">0336</option>
    <option value="0340">0340</option>
    <option value="0341">0341</option>
    <option value="0342">0342</option>
    <option value="0343">0343</option>
    <option value="0344">0344</option>
    <option value="0345">0345</option>
    <option value="0346">0346</option>
    <option value="0347">0347</option>
    </select>
    <input type="text" id="cNo" name="customer_phone" class="form-control" placeholder="Enter phone number">
    </div>
    <span id="phoneError"></span>
    

    <input type="hidden" id="transaction_option_id_FK" name="transaction_option_id_FK">
    <input type="hidden" id="transaction_name" name="transaction_name">
    <input type="hidden" id="ticket_number" name="ticket_number">

 
    <button type="submit">Submit</button>
    </form>
    </div>
    </div>
     
    <div id="customAlert" class="alert-modal">
    <img src="{{ asset('assets/img/bank-icon/top-dashboard.png') }}" alt="Bank Image">
    <p id="alertMessage"></p>
    </div>
           
     <script src="{{ asset('assets/js/script.js') }}"></script>
    </body>
    </html>
    










          
                
