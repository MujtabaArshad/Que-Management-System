   
  //  download qrcode
   function downloadQRCode(data, branchCode) {
    const url = `https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=${data}`;
    fetch(url)
    .then(response => response.blob())
    .then(blob => {
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `qrcode_${branchCode}.png`;
    link.click();
    URL.revokeObjectURL(link.href); 
    })
    .catch(error => console.error('Error downloading the QR code:', error));
    }
  
  

let actionType = '';

function generateSequentialNumber(action) {
    sequenceCounters[action]++;
    return sequenceCounters[action];
}

function handleOptionClick(button) {
    actionType = button.getAttribute('data-action');
    showConfirmationModal();
}

function showConfirmationModal() {
    document.getElementById('confirmationMessage').textContent = `Are you sure you want to proceed with ${actionType}?`;
    document.getElementById('confirmationOverlay').style.display = 'flex';
}

function closeConfirmationModal() {
    document.getElementById('confirmationOverlay').style.display = 'none';
}

function confirmAction() {
    const ticketNumber = generateSequentialNumber(actionType);
    if (ticketNumber !== null) {
        const url = `/cus-form?ticket=${ticketNumber}&action=${encodeURIComponent(actionType)}`;
        window.location.href = url;
    } else {
        showAlert('Error generating ticket number.');
    }
    closeConfirmationModal();
}

function showAlert(message) {
    document.getElementById('alertMessage').textContent = message;
    document.getElementById('customAlert').style.display = 'block';
}

function closeAlert() {
    document.getElementById('customAlert').style.display = 'none';
}

function showFormModal() {
    document.getElementById('formModal').style.display = 'flex';
}

function showCustomAlert(message) {
    document.getElementById('alertMessage').textContent = message;
    document.getElementById('customAlert').style.display = 'flex';
}

function closeModal() {
    document.getElementById('formModal').style.display = 'none';
}

function handleFormSubmit(event) {
    event.preventDefault(); // Prevent default form submission

    const ticketNumber = generateSequentialNumber(actionType);
    if (ticketNumber !== null) {
        const alertMessage = `Your ticket number is ${ticketNumber}.`;
        showCustomAlert(alertMessage);
        closeModal();
    } else {
        showCustomAlert('Error generating ticket number.');
    }
}

document.getElementById('confirmButton').addEventListener('click', confirmAction);
document.getElementById('cancelButton').addEventListener('click', closeConfirmationModal);
document.getElementById('yourFormId').addEventListener('submit', handleFormSubmit);


window.onclick = function(event) {
    if (event.target === document.getElementById('confirmationOverlay')) {
        closeConfirmationModal();
    }
}


showFormModal();
    
          
          






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


    // const sequenceCounters = {
    // 'Deposit': 10001,
    // 'Withdrawal': 20001,
    // 'Bill Payment': 30001
    // };

    // function generateSequentialNumber(action) {
    // sequenceCounters[action]++; 
    // return sequenceCounters[action];
    // }

      
    // function showCustomAlert(message) {
    //   document.getElementById('alertMessage').innerText = message;
    //   document.getElementById('customAlert').style.display = 'block';
    // }

    //   function showFormModal() {
    //   document.getElementById('modalOverlay').style.display = 'block';
    //   document.getElementById('formModal').style.display = 'block';
    //   }
    
    //   function closeFormModal() {
    //   document.getElementById('modalOverlay').style.display = 'none';
    //   document.getElementById('formModal').style.display = 'none';
    //   }
    
    //   function handleFormSubmit(event) {
    //   event.preventDefault(); 

    //   closeFormModal();
    //    const action="Deposit";
    //   const sequentialNumber = generateSequentialNumber(action);

    //     showCustomAlert(`Ticket Number: ${sequentialNumber}`);
    
     
    //   }

    //   document.addEventListener('DOMContentLoaded', function() {
    //   showFormModal(); 
    //   });

    //   document.getElementById('customAlert').addEventListener('click', function() {
    //   this.style.display = 'none';
    //   });

    //   document.getElementById('modalOverlay').addEventListener('click', function() {
    //   closeFormModal();
    //   });

    
    
    // const sequenceCounters = {

    //     'Deposit': 10001,
    //     'Withdrawal': 20001,
    //     'Bill Payment': 30001

    // };


    // function generateSequentialNumber() {
        
    //     sequenceCounters['Transaction']++;
    //     return sequenceCounters['Transaction'];
    // }

    // function handleFormSubmit(event) {
    //     event.preventDefault(); 
    //     window.location.href = '/ticket';
    //     //    
    //     const sequentialNumber = generateSequentialNumber();

    //      showCustomAlert(`Your transaction number is: ${sequentialNumber}`);
    //   }

    // function showCustomAlert(message) {
    //     document.getElementById('alertMessage').innerText = message;
    //     document.getElementById('customAlert').style.display = 'block';
    // }



    // const sequenceCounters = {
    //     'Deposit': 10001,
    //     'Withdrawal': 20001,
    //     'Bill Payment': 30001
    // };

    // function generateSequentialNumber(action) {
    //     sequenceCounters[action]++;
    //     return sequenceCounters[action];
    // }

    // function handleOptionClick(action, element) {
    //     if (confirm(`Are you sure you want to ${action}?`)) {
    //         const sequentialNumber = generateSequentialNumber(action);

    //               localStorage.setItem('transactionNumber', sequentialNumber);
    //      window.location.href = '/cus-form';
    //     }
    // }

    // document.getElementById('yourFormId').addEventListener('submit', function(e) {
    //     e.preventDefault(); 
    //       const sequentialNumber = localStorage.getItem('transactionNumber');

    //     if (sequentialNumber) {
    //             showCustomAlert(`Your transaction number is: ${sequentialNumber}`);

    //            localStorage.removeItem('transactionNumber');

    //           setTimeout(() => {
    //             this.submit();  
    //         }, 3000);
    //     }
    // });

    // function showCustomAlert(message) {
    //     document.getElementById('alertMessage').innerText = message;
    //     document.getElementById('customAlert').style.display = 'block';
    // }
// function handleOptionClick(action, element) {
//     const sequentialNumber = generateSequentialNumber(action);

//     if (confirm(`Are you sure you want to ${action}?`)) {
//          document.querySelectorAll('.option-card').forEach(item => {
//             item.style.display = 'none';
//         });
//          showCustomAlert(`Your transaction number is: ${sequentialNumber}`);
        
//           setTimeout(() => {
//             window.location.href = '/cus-form';
//         }, 3000); 
//     }
// }


function showCustomAlert(message) {
    document.getElementById('alertMessage').innerText = message;
    document.getElementById('customAlert').style.display = 'block';
}

    



        $(document).ready(function() { 
  
            $("#account-select").change(function() {
              $("#show-address").show('slide');
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#show-address").click(function(){
              $("#address-history").show('slide');
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#yes").click(function(){
              $("#current-address").show('slide');
              $("#non-uk").hide();
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#no").click(function(){
              $("#non-uk").show('slide');
              $("#current-address").hide();
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#yes-prev").click(function(){
              $("#previous-address").show('slide');
              $("#get-consent").show('slide');
              window.scrollTo(0,document.body.scrollHeight);
            });
            
             $("#no-prev").click(function(){
              $("#get-consent").show('slide');
              $("#previous-address").hide();
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#get-consent").click(function(){
              $("#your-consent").show('slide');
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#credit-click").click(function() {
              $("#info-request").show('slide');
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $("#info-click").click(function() {
              $("#submit-app").show('slide');
              window.scrollTo(0,document.body.scrollHeight);
            });
            
            $('#app-form').on('submit', function(){
              var arr = $(this).serializeArray();
              console.log(arr);
              return false;
          });
          });
        


    // const sequenceCounters = {
    //     'Deposit': 10001,
    //     'Withdrawal': 20001,
    //     'Bill Payment': 30001
    // };
    
    // function generateSequentialNumber(action) {
    //     sequenceCounters[action]++; 
    //     return sequenceCounters[action];
    // }
    
    // function handleOptionClick(action, element) {
    //     const sequentialNumber = generateSequentialNumber(action);
    
    //     if (confirm(`Are you sure you want to ${action}?`)) {
    //         alert(`Your transaction number is: ${sequentialNumber}`+"{{asset}}");
    
    //         document.querySelectorAll('.option-card').forEach(item => {
    //             item.style.display = 'none';
    //         });
    
    //              document.getElementById('bankImage').style.display = 'block';
    //     }
    
    
    
    // }





    // function closeCustomAlert() {
    // document.getElementById('customAlert').style.display = 'none';
    // }


    // const sequenceCounters = {
    //     'Deposit': 10001,
    //     'Withdrawal': 20001,
    //     'Bill Payment': 30001
    // };

    // function generateSequentialNumber(action) {
    //     sequenceCounters[action]++; 
    //     return sequenceCounters[action];
    // }

    // function handleOptionClick(action, element) {
    //     const sequentialNumber = generateSequentialNumber(action);

    //     if (confirm(`Are you sure you want to ${action}  ?  ${sequentialNumber}.`)) {
    //         if(sequentialNumber){
    //         document.getElementById('result').innerHTML = ` ${sequentialNumber}`;
    //         document.querySelectorAll('.option-item').forEach(item => {
    //             item.style.display = 'none';      
    //            });
    //         element.parentElement.style.display = 'block'; 
    //         }
    //     }
    // }

    // const sequenceCounters = {
    //     'Deposit': 10001,
    //     'Withdrawal': 20001,
    //     'Bill Payment': 30001
    // };
    

    // function generateSequentialNumber(action) {
    // sequenceCounters[action]++; 
    // return sequenceCounters[action];

    // }

    // function handleOptionClick(action, element) {
    // if (confirm(`Are you sure you want to ${action}? `)) {
    //     const sequentialNumber = generateSequentialNumber(action);
    //     document.getElementById('result').innerHTML=`${action}: `;



    // document.querySelectorAll('.option-item').forEach(item => {

    // item.style.display = 'none';

    // });

    // element.parentElement.style.display = 'block';

    //     }

    // }
    // generateSequentialNumber()
    


    

 // const sequenceCounters = {

// 'Deposit': 10001,
// 'Withdrawal': 20001,
// 'Bill Payment': 30001
// };




// function generateSequentialNumber(action) {
//     sequenceCounters[action]++; 
//     return sequenceCounters[action];
// }

// function generateSequentialNumber(action) {
// sequenceCounters[action]++; 
// return sequenceCounters[action];
// }
// document.querySelector('.custom-select').addEventListener('change', function(event) {
// if (event.target.type === 'radio') {
// const action = event.target.value;
// const sequentialNumber = generateSequentialNumber(action);
// alert(`${action}: ${sequentialNumber}`);
// }
// });
