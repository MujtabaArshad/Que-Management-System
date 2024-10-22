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
        }).catch(error => console.error('Error downloading the QR code:', error));
        }
    
    
        
    
        
        function loadSequenceCounters() {
            const storedCounters = localStorage.getItem('sequenceCounters');
             if (storedCounters) {
            return JSON.parse(storedCounters);
            } 
            
            else {
            return {
            'Deposit': 10000,
            'Withdrawal': 20000,
            'Bill Payment': 30000
            };
            }
            }
        
        
            function saveSequenceCounters(counters) {
            localStorage.setItem('sequenceCounters', JSON.stringify(counters));
             }
        
        
            var sequenceCounters = loadSequenceCounters();
             function handleOptionClick(optionType) {
            const confirmationOverlay = document.getElementById('confirmationOverlay');
            const confirmationMessage = document.getElementById('confirmationMessage');
            const confirmButton = document.getElementById('confirmButton');
            const cancelButton = document.getElementById('cancelButton');
        
            confirmationMessage.innerText = `Are you sure you want to proceed with ${optionType}?`;
            confirmationOverlay.style.display = 'flex';
        
            confirmButton.onclick = function() {
            confirmationOverlay.style.display = 'none';
            let mappedOptionType;
            let transactionOptionId;
        
            if (optionType === 'CashDeposit') {
            mappedOptionType = 'Deposit';
            
            transactionOptionId = 1;  
            } 
            else if (optionType === 'Withdrawal') {
            mappedOptionType = 'Withdrawal';
            transactionOptionId = 2; 
            } 
            else if (optionType === 'BillPayment') {
            mappedOptionType = 'Bill Payment';
            transactionOptionId = 3;  
            }
        
            localStorage.setItem('selectedOptionType', mappedOptionType);
            localStorage.setItem('transactionOptionId', transactionOptionId);
            window.location.href = "/cus-form";
        
            document.querySelectorAll('.option-card').forEach((elem) => {
            elem.style.display = "none";
            });
            };
        
            cancelButton.onclick = function() {
            confirmationOverlay.style.display = 'none';
            };
        
            }
        
        
            function showFormModal() {
            let optionType = localStorage.getItem('selectedOptionType');
            let transactionOptionId = localStorage.getItem('transactionOptionId');
            
            
            if ((optionType && transactionOptionId) ) {
            document.getElementById('formModal').style.display = 'block';
            document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
            document.getElementById('transaction_option_id_FK').value = transactionOptionId;
            } 
           
        }
        
         
            function validatePhoneRealTime() {
            let phoneInput = document.getElementById('cNo').value.trim();
            let simCode = document.getElementById('simCode').value.trim();
            let phoneError = document.getElementById('phoneError');
        
            let phoneRegex = /^\d{11}$/;
            let numericRegex = /^\d+$/;
        
            if (simCode === "") {
            phoneError.textContent = "Please select a SIM code.";
            phoneError.style.color = "red";
            } else if (phoneInput === "") {
            phoneError.textContent = "Please enter your phone number.";
            phoneError.style.color = "red";
            } else if (!numericRegex.test(phoneInput)) {
            phoneError.textContent = "Phone number can only contain numeric digits.";
            phoneError.style.color = "red";
            } else if ((simCode + phoneInput).length !== 11) {
            phoneError.textContent = "The phone number must be exactly 11 digits.";
            phoneError.style.color = "red";
            } else {
            phoneError.textContent = "";
            }
            }
        
        
            function validateNameRealTime() {
            let nameInput = document.getElementById('fname').value.trim();
            let nameError = document.getElementById('nameError');
        
            let nameRegex = /^[a-zA-Z\s]+$/;
        
            if (nameInput === "") {
            nameError.textContent = "Please enter your name.";
            nameError.style.color = "red";   
        
            } else if (!nameRegex.test(nameInput)) {
            nameError.textContent = "Name cannot contain numbers or special characters.";
            nameError.style.color = "red";  
        
            } else {
            nameError.textContent = "";  
            }
        
            }
        
            function validateName() {
                            let nameInput = document.getElementById('fname').value.trim();
                            let nameError = document.getElementById('nameError');
                            let nameRegex = /^[a-zA-Z\s]+$/;
                        
                            if (nameInput === "") {
                                nameError.textContent = "Please enter your name.";
                            } else if (!nameRegex.test(nameInput)) {
                                nameError.textContent = "Name cannot contain numbers or special characters.";
                            } else {
                                nameError.textContent = "";  
                            }
                        }
                        
                            function validatePhone() {
                            let phoneInput = document.getElementById('phoneNumber').value.trim();
                            let phoneError = document.getElementById('phoneError');
                            let phoneRegex = /^\d{11}$/;
                    
                            if (phoneInput === "") {
                            phoneError.textContent = "Please enter your phone number.";
                            } else if (!phoneRegex.test(phoneInput)) {
                            phoneError.textContent = "Phone number must be exactly 11 digits.";
                            } else {
                            phoneError.textContent = "";  
                            }
                            
                            }
    
    
                            
    //  new code
    
                               function handleFormSubmit(event) {
                 
                
            event.preventDefault();
        
            validateNameRealTime();
            validatePhoneRealTime();
        
            let nameError = document.getElementById('nameError').textContent;
            let phoneError = document.getElementById('phoneError').textContent;
        
            if (nameError !== "" || phoneError !== "") {
                return;   
            }
        
            let firstName = document.getElementById('fname').value.trim();
            let phoneNo = document.getElementById('cNo').value.trim();
            let simCode = document.getElementById('simCode').value.trim();  
        
            let optionType = event.target.getAttribute('data-option-type');
        
        
            if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
            console.error('Invalid option type or sequence counter:', optionType);
            return;
            }
        
            let sequenceNumber = sequenceCounters[optionType];
            sequenceCounters[optionType] = sequenceNumber + 1;  
            saveSequenceCounters(sequenceCounters);
        
            document.getElementById('transaction_name').value = optionType;
            document.getElementById('ticket_number').value = sequenceNumber;
         
            
           
                document.getElementById('alertMessage').innerText =
                `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
            
                document.getElementById('customAlert').style.display = 'block';
            
                event.target.submit();
            
        
            document.getElementById('formModal').style.display='none';
            document.getElementById('overlay').style.display='none';
            document.getElementById('transactionForm').style.display = 'none';
        
          
             localStorage.removeItem('selectedOptionType');
            localStorage.removeItem('transactionOptionId');
            
            }
    
            showFormModal();
    
    
            //                function handleFormSubmit(event) {
            //                     event.preventDefault();
                            
            //                     validateNameRealTime();
            //                     validatePhoneRealTime();
                            
            //                     let nameError = document.getElementById('nameError').textContent;
            //                     let phoneError = document.getElementById('phoneError').textContent;
                            
            //                     if (nameError !== "" || phoneError !== "") {
            //                         return;
            //                     }
                            
            //                     let firstName = document.getElementById('fname').value.trim();
            //                     let phoneNo = document.getElementById('cNo').value.trim();
            //                     let simCode = document.getElementById('simCode').value.trim();  
                            
            //                     let optionType = event.target.getAttribute('data-option-type');
                            
            //                     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
            //                         console.error('Invalid option type or sequence counter:', optionType);
            //                         return;
            //                     }
                            
            //                       let sequenceNumber = sequenceCounters[optionType];
            //                     sequenceCounters[optionType] = sequenceNumber + 1; // Increment by 1
            //                     saveSequenceCounters(sequenceCounters);
                            
            //                     document.getElementById('transaction_name').value = optionType;
            //                     document.getElementById('ticket_number').value = sequenceNumber;
                            
            //                     document.getElementById('alertMessage').innerText =
            //                         `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
                                
            //                     document.getElementById('customAlert').style.display = 'block';
            //                                         event.target.reset();
            //                     document.getElementById('formModal').style.display='none';
            //                     document.getElementById('overlay').style.display='none';
            //                     document.getElementById('transactionForm').style.display = 'none';
                            
                                   
         
                               
            //                     localStorage.removeItem('selectedOptionType');
            //                     localStorage.removeItem('transactionOptionId');
                               
            //                 }
    
    
            //     document.getElementById('cNo').addEventListener('input', validatePhoneRealTime);
            //      document.getElementById('simCode').addEventListener('input', validatePhoneRealTime);
            //      document.getElementById('fname').addEventListener('input', validateNameRealTime);
            
            
            // document.getElementById('transactionForm').addEventListener('submit', handleFormSubmit);
            //                 showFormModal();
    
    
                            
            //                 function handleFormSubmit(event) {
            //                     event.preventDefault();
                            
            //                     validateNameRealTime();
            //                     validatePhoneRealTime();
                            
            //                     let nameError = document.getElementById('nameError').textContent;
            //                     let phoneError = document.getElementById('phoneError').textContent;
                            
            //                     if (nameError !== "" || phoneError !== "") {
            //                         return;
            //                     }
                            
            //                     let firstName = document.getElementById('fname').value.trim();
            //                     let phoneNo = document.getElementById('cNo').value.trim();
            //                     let simCode = document.getElementById('simCode').value.trim();  
                            
            //                     let optionType = event.target.getAttribute('data-option-type');
                            
            //                     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
            //                         console.error('Invalid option type or sequence counter:', optionType);
            //                         return;
            //                     }
                            
            //                       let sequenceNumber = sequenceCounters[optionType];
            //                     sequenceCounters[optionType] = sequenceNumber + 1; // Increment by 1
            //                     saveSequenceCounters(sequenceCounters);
                            
            //                     document.getElementById('transaction_name').value = optionType;
            //                     document.getElementById('ticket_number').value = sequenceNumber;
                            
            //                     document.getElementById('alertMessage').innerText =
            //                         `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
                                
            //                     document.getElementById('customAlert').style.display = 'block';
            //                                         event.target.reset();
            //                     document.getElementById('formModal').style.display='none';
            //                     document.getElementById('overlay').style.display='none';
            //                     document.getElementById('transactionForm').style.display = 'none';
                            
                                   
         
                               
            //                     localStorage.removeItem('selectedOptionType');
            //                     localStorage.removeItem('transactionOptionId');
                               
            //                 }
    
    
            //     document.getElementById('cNo').addEventListener('input', validatePhoneRealTime);
            //      document.getElementById('simCode').addEventListener('input', validatePhoneRealTime);
            //      document.getElementById('fname').addEventListener('input', validateNameRealTime);
            
            
            // document.getElementById('transactionForm').addEventListener('submit', handleFormSubmit);
            //                 showFormModal();
                            
            // function handleFormSubmit(event) {
                 
                
            // event.preventDefault();
        
            // validateNameRealTime();
            // validatePhoneRealTime();
        
            // let nameError = document.getElementById('nameError').textContent;
            // let phoneError = document.getElementById('phoneError').textContent;
        
            // if (nameError !== "" || phoneError !== "") {
            //     return;   
            // }
        
            // let firstName = document.getElementById('fname').value.trim();
            // let phoneNo = document.getElementById('cNo').value.trim();
            // let simCode = document.getElementById('simCode').value.trim();  
        
            // let optionType = event.target.getAttribute('data-option-type');
        
        
            // if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
            // console.error('Invalid option type or sequence counter:', optionType);
            // return;
            // }
        
            // let sequenceNumber = sequenceCounters[optionType];
            // sequenceCounters[optionType] = sequenceNumber + 1;  
            // saveSequenceCounters(sequenceCounters);
        
            // document.getElementById('transaction_name').value = optionType;
            // document.getElementById('ticket_number').value = sequenceNumber;
         
            
           
            //     document.getElementById('alertMessage').innerText =
            //     `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
            
            //     document.getElementById('customAlert').style.display = 'block';
            
            //     event.target.submit();
            
        
            // document.getElementById('formModal').style.display='none';
            // document.getElementById('overlay').style.display='none';
            // document.getElementById('transactionForm').style.display = 'none';
        
            // localStorage.removeItem('selectedOptionType');
            // localStorage.removeItem('transactionOptionId');
            // }
            
            //     document.getElementById('cNo').addEventListener('input', validatePhoneRealTime);
            //     document.getElementById('simCode').addEventListener('input', validatePhoneRealTime);
            //     document.getElementById('fname').addEventListener('input', validateNameRealTime);
            
            
            //     document.getElementById('transactionForm').addEventListener('submit', handleFormSubmit);
            
            
            //     showFormModal();
        
           
        // function loadSequenceCounters() {
        //     const storedCounters = localStorage.getItem('sequenceCounters');
        //     if (storedCounters) {
        //     return JSON.parse(storedCounters);
        //     } 
            
        //     else {
        //     return {
        //     'Deposit': 10001,
        //     'Withdrawal': 20001,
        //     'Bill Payment': 30001
        //     };
        //     }
        //     }
        
        
        //     function saveSequenceCounters(counters) {
        //     localStorage.setItem('sequenceCounters', JSON.stringify(counters));
        //     }
        
        
        //     var sequenceCounters = loadSequenceCounters();
        
         
        //     function handleOptionClick(optionType) {
        //     const confirmationOverlay = document.getElementById('confirmationOverlay');
        //     const confirmationMessage = document.getElementById('confirmationMessage');
        //     const confirmButton = document.getElementById('confirmButton');
        //     const cancelButton = document.getElementById('cancelButton');
        
        //     confirmationMessage.innerText = `Are you sure you want to proceed with ${optionType}?`;
        //     confirmationOverlay.style.display = 'flex';
        
        //     confirmButton.onclick = function() {
        //     confirmationOverlay.style.display = 'none';
        //     let mappedOptionType;
        //     let transactionOptionId;
        
        //     if (optionType === 'CashDeposit') {
        //     mappedOptionType = 'Deposit';
        //     transactionOptionId = 1;  
        //     } 
        //     else if (optionType === 'Withdrawal') {
        //     mappedOptionType = 'Withdrawal';
        //     transactionOptionId = 2; 
        //     } 
        //     else if (optionType === 'BillPayment') {
        //     mappedOptionType = 'Bill Payment';
        //     transactionOptionId = 3;  
        //     }
        
        //     localStorage.setItem('selectedOptionType', mappedOptionType);
        //     localStorage.setItem('transactionOptionId', transactionOptionId);
        //     window.location.href = "/cus-form";
        
        //     document.querySelectorAll('.option-card').forEach((elem) => {
        //     elem.style.display = "none";
        //     });
        //     };
        
        //     cancelButton.onclick = function() {
        //     confirmationOverlay.style.display = 'none';
        //     };
        
        //     }
        
        
        //     function showFormModal() {
        //     let optionType = localStorage.getItem('selectedOptionType');
        //     let transactionOptionId = localStorage.getItem('transactionOptionId');
        
        //     if (optionType && transactionOptionId) {
        //     document.getElementById('formModal').style.display = 'block';
        //     document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        //     document.getElementById('transaction_option_id_FK').value = transactionOptionId;
    
        //     } 
    
        //     document.getElementById('formModal').addEventListener('submit',function(event){
        //         var formData=new FormData(this);
        //         fetch('/submit-form',{
        //             method:'POST',
        //             body:formData
        //         }).then(response=>response.json())
        //         .then(data=>{
        //             document.getElementById('formModal').style.display='none';
        //         })
        //     })
        //     showFormModal();
      
        //     }
        
         
        //     function validatePhoneRealTime() {
        //     let phoneInput = document.getElementById('cNo').value.trim();
        //     let simCode = document.getElementById('simCode').value.trim();
        //     let phoneError = document.getElementById('phoneError');
        
        //     let phoneRegex = /^\d{11}$/;
        //     let numericRegex = /^\d+$/;
        
        //     if (simCode === "") {
        //     phoneError.textContent = "Please select a SIM code.";
        //     phoneError.style.color = "red";
        //     } else if (phoneInput === "") {
        //     phoneError.textContent = "Please enter your phone number.";
        //     phoneError.style.color = "red";
        //     } else if (!numericRegex.test(phoneInput)) {
        //     phoneError.textContent = "Phone number can only contain numeric digits.";
        //     phoneError.style.color = "red";
        //     } else if ((simCode + phoneInput).length !== 11) {
        //     phoneError.textContent = "The phone number must be exactly 11 digits.";
        //     phoneError.style.color = "red";
        //     } else {
        //     phoneError.textContent = "";
        //     }
        //     }
        
        
        //     function validateNameRealTime() {
        //     let nameInput = document.getElementById('fname').value.trim();
        //     let nameError = document.getElementById('nameError');
        
        //     let nameRegex = /^[a-zA-Z\s]+$/;
        
        //     if (nameInput === "") {
        //     nameError.textContent = "Please enter your name.";
        //     nameError.style.color = "red";   
        
        //     } else if (!nameRegex.test(nameInput)) {
        //     nameError.textContent = "Name cannot contain numbers or special characters.";
        //     nameError.style.color = "red";  
        
        //     } else {
        //     nameError.textContent = "";  
        //     }
        
        //     }
        // function handleFormSubmit(event) {
         
        //    event.preventDefault();
        
        //     validateNameRealTime();
        //     validatePhoneRealTime();
        
        //     let nameError = document.getElementById('nameError').textContent;
        //     let phoneError = document.getElementById('phoneError').textContent;
        
        //     if (nameError !== "" || phoneError !== "") {
        //         return;   
        //     }
        
        //     let firstName = document.getElementById('fname').value.trim();
        //     let phoneNo = document.getElementById('cNo').value.trim();
        //     let simCode = document.getElementById('simCode').value.trim();  
        
        //     let optionType = event.target.getAttribute('data-option-type');
        
        //     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        //     console.error('Invalid option type or sequence counter:', optionType);
        //     return;
        //     }
        
        //     let sequenceNumber = sequenceCounters[optionType]++;
        //     saveSequenceCounters(sequenceCounters);
        
        //     document.getElementById('transaction_name').value = optionType;
        //     document.getElementById('ticket_number').value = sequenceNumber;
        
        //     document.getElementById('alertMessage').innerText =
        //     `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
        
        //     document.getElementById('customAlert').style.display = 'block';
        
        //     event.target.submit();
        
        //     document.getElementById('formModal').style.display='none';
        //     document.getElementById('overlay').style.display='none';
        //     document.getElementById('transactionForm').style.display = 'none';
        
        //     localStorage.removeItem('selectedOptionType');
        //     localStorage.removeItem('transactionOptionId');
        //     };
        
        
        //     document.getElementById('cNo').addEventListener('input', validatePhoneRealTime);
        //     document.getElementById('simCode').addEventListener('input', validatePhoneRealTime);
        //     document.getElementById('fname').addEventListener('input', validateNameRealTime);
        
        
        
        
             
    
        // function loadSequenceCounters() {
        // const storedCounters = localStorage.getItem('sequenceCounters');
        // if (storedCounters) {
        // return JSON.parse(storedCounters);
        // } 
        
        // else {
        // return {
        // 'Deposit': 10001,
        // 'Withdrawal': 20001,
        // 'Bill Payment': 30001
        // };
        // }
        // }
    
    
        // function saveSequenceCounters(counters) {
        // localStorage.setItem('sequenceCounters', JSON.stringify(counters));
        // }
    
    
        // var sequenceCounters = loadSequenceCounters();
    
     
        // function handleOptionClick(optionType) {
        // const confirmationOverlay = document.getElementById('confirmationOverlay');
        // const confirmationMessage = document.getElementById('confirmationMessage');
        // const confirmButton = document.getElementById('confirmButton');
        // const cancelButton = document.getElementById('cancelButton');
    
        // confirmationMessage.innerText = `Are you sure you want to proceed with ${optionType}?`;
        // confirmationOverlay.style.display = 'flex';
    
        // confirmButton.onclick = function() {
        // confirmationOverlay.style.display = 'none';
        // let mappedOptionType;
        // let transactionOptionId;
    
        // if (optionType === 'CashDeposit') {
        // mappedOptionType = 'Deposit';
        // transactionOptionId = 1;  
        // } 
        // else if (optionType === 'Withdrawal') {
        // mappedOptionType = 'Withdrawal';
        // transactionOptionId = 2; 
        // } 
        // else if (optionType === 'BillPayment') {
        // mappedOptionType = 'Bill Payment';
        // transactionOptionId = 3;  
        // }
    
        // localStorage.setItem('selectedOptionType', mappedOptionType);
        // localStorage.setItem('transactionOptionId', transactionOptionId);
        // window.location.href = "/cus-form";
    
        // document.querySelectorAll('.option-card').forEach((elem) => {
        // elem.style.display = "none";
        // });
        // };
    
        // cancelButton.onclick = function() {
        // confirmationOverlay.style.display = 'none';
        // };
    
        // }
    
    
        // function showFormModal() {
        // let optionType = localStorage.getItem('selectedOptionType');
        // let transactionOptionId = localStorage.getItem('transactionOptionId');
    
        // if (optionType && transactionOptionId) {
        // document.getElementById('formModal').style.display = 'block';
        // document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        // document.getElementById('transaction_option_id_FK').value = transactionOptionId;
        // } 
    
        // }
    
     
        // function validatePhoneRealTime() {
        // let phoneInput = document.getElementById('cNo').value.trim();
        // let simCode = document.getElementById('simCode').value.trim();
        // let phoneError = document.getElementById('phoneError');
    
        // let phoneRegex = /^\d{11}$/;
        // let numericRegex = /^\d+$/;
    
        // if (simCode === "") {
        // phoneError.textContent = "Please select a SIM code.";
        // phoneError.style.color = "red";
        // } else if (phoneInput === "") {
        // phoneError.textContent = "Please enter your phone number.";
        // phoneError.style.color = "red";
        // } else if (!numericRegex.test(phoneInput)) {
        // phoneError.textContent = "Phone number can only contain numeric digits.";
        // phoneError.style.color = "red";
        // } else if ((simCode + phoneInput).length !== 11) {
        // phoneError.textContent = "The phone number must be exactly 11 digits.";
        // phoneError.style.color = "red";
        // } else {
        // phoneError.textContent = "";
        // }
        // }
    
    
        // function validateNameRealTime() {
        // let nameInput = document.getElementById('fname').value.trim();
        // let nameError = document.getElementById('nameError');
    
        // let nameRegex = /^[a-zA-Z\s]+$/;
    
        // if (nameInput === "") {
        // nameError.textContent = "Please enter your name.";
        // nameError.style.color = "red";   
    
        // } else if (!nameRegex.test(nameInput)) {
        // nameError.textContent = "Name cannot contain numbers or special characters.";
        // nameError.style.color = "red";  
    
        // } else {
        // nameError.textContent = "";  
        // }
    
        // }
    
    
        // function handleFormSubmit(event) {
            
        // event.preventDefault();
    
        // validateNameRealTime();
        // validatePhoneRealTime();
    
        // let nameError = document.getElementById('nameError').textContent;
        // let phoneError = document.getElementById('phoneError').textContent;
    
        // if (nameError !== "" || phoneError !== "") {
        //     return;   
        // }
    
        // let firstName = document.getElementById('fname').value.trim();
        // let phoneNo = document.getElementById('cNo').value.trim();
        // let simCode = document.getElementById('simCode').value.trim();  
    
        // let optionType = event.target.getAttribute('data-option-type');
    
        // if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        // console.error('Invalid option type or sequence counter:', optionType);
        // return;
        // }
    
        // let sequenceNumber = sequenceCounters[optionType]++;
        // saveSequenceCounters(sequenceCounters);
    
        // document.getElementById('transaction_name').value = optionType;
        // document.getElementById('ticket_number').value = sequenceNumber;
    
        // document.getElementById('alertMessage').innerText =
        // `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
    
        // document.getElementById('customAlert').style.display = 'block';
    
        // event.target.submit();
    
        // document.getElementById('formModal').style.display='none';
        // document.getElementById('overlay').style.display='none';
        // document.getElementById('transactionForm').style.display = 'none';
    
        // localStorage.removeItem('selectedOptionType');
        // localStorage.removeItem('transactionOptionId');
        // }
    
    
        // document.getElementById('cNo').addEventListener('input', validatePhoneRealTime);
        // document.getElementById('simCode').addEventListener('input', validatePhoneRealTime);
        // document.getElementById('fname').addEventListener('input', validateNameRealTime);
    
    
        // document.getElementById('transactionForm').addEventListener('submit', handleFormSubmit);
    
    
        // showFormModal();
    
    
    
        // function saveSequenceCounters(counters) {
        //     //         localStorage.setItem('sequenceCounters', JSON.stringify(counters));
        //     //     }
                
        //     //     var sequenceCounters = loadSequenceCounters();
        //     //     function handleOptionClick(optionType) {
        //     //     const confirmationOverlay = document.getElementById('confirmationOverlay');
        //     //     const confirmationMessage = document.getElementById('confirmationMessage');
        //     //     const confirmButton = document.getElementById('confirmButton');
            
        //     //     confirmationMessage.innerText = `Are you sure you want to proceed with ${optionType}?`;
        //     //     confirmationOverlay.style.display = 'flex';
            
        //     //     confirmButton.onclick = function() {
        //     //         confirmationOverlay.style.display = 'none';
        //     //         let mappedOptionType;
        //     //         let transactionOptionId;
            
        //     //         if (optionType === 'CashDeposit') {
        //     //             mappedOptionType = 'Deposit';
        //     //             transactionOptionId = 1;  
        //     //         } else if (optionType === 'Withdrawal') {
        //     //             mappedOptionType = 'Withdrawal';
        //     //             transactionOptionId = 2; 
        //     //         } else if (optionType === 'BillPayment') {
        //     //             mappedOptionType = 'Bill Payment';
        //     //             transactionOptionId = 3;  
        //     //         }
            
        //     //         localStorage.setItem('selectedOptionType', mappedOptionType);
        //     //         localStorage.setItem('transactionOptionId', transactionOptionId);
        //     //         window.location.href = "/cus-form";  
        //     //     };
            
        //     //     document.getElementById('cancelButton').onclick = function() {
        //     //         confirmationOverlay.style.display = 'none';
        //     //     };
        //     // }
            
        //     //     function showFormModal() {
        //     //         let optionType = localStorage.getItem('selectedOptionType');
        //     //         let transactionOptionId = localStorage.getItem('transactionOptionId');
                
        //     //         if (optionType   &&   transactionOptionId) {
        //     //             document.getElementById('formModal').style.display = 'block';
        //     //             document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        //     //             document.getElementById('transaction_option_id_FK').value = transactionOptionId;
        //     //         } 
        //     //     }
                
        //     //     function validateName() {
        //     //         let nameInput = document.getElementById('fname').value.trim();
        //     //         let nameError = document.getElementById('nameError');
        //     //         let nameRegex = /^[a-zA-Z\s]+$/;
                
        //     //         if (nameInput === "") {
        //     //             nameError.textContent = "Please enter your name.";
        //     //         } else if (!nameRegex.test(nameInput)) {
        //     //             nameError.textContent = "Name cannot contain numbers or special characters.";
        //     //         } else {
        //     //             nameError.textContent = "";  
        //     //         }
        //     //     }
                
        //     //         function validatePhone() {
        //     //         let phoneInput = document.getElementById('phoneNumber').value.trim();
        //     //         let phoneError = document.getElementById('phoneError');
        //     //         let phoneRegex = /^\d{11}$/;
            
        //     //         if (phoneInput === "") {
        //     //         phoneError.textContent = "Please enter your phone number.";
        //     //         } else if (!phoneRegex.test(phoneInput)) {
        //     //         phoneError.textContent = "Phone number must be exactly 11 digits.";
        //     //         } else {
        //     //         phoneError.textContent = "";  
        //     //         }
                    
        //     //         }
            
            
        //     //     function handleFormSubmit(event) {
        //     //         event.preventDefault();
                    
        //     //         validateName();
        //     //         validatePhone();
                
        //     //         let nameError = document.getElementById('nameError').textContent;
        //     //         let phoneError = document.getElementById('phoneError').textContent;
            
        //     //         if (nameError !== "" || phoneError !== "") {
        //     //         return;
        //     //         }
                
        //     //         let firstName = document.getElementById('fname').value.trim();
        //     //         let optionType = event.target.getAttribute('data-option-type');
                    
            
        //     //         if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        //     //         console.error('Invalid option type or sequence counter:', optionType);
        //     //         return;
        //     //         }
            
                    
        //     //         let sequenceNumber = sequenceCounters[optionType]++;
        //     //         saveSequenceCounters(sequenceCounters);        
        //     //         document.getElementById('transaction_name').value = optionType;
        //     //         document.getElementById('ticket_number').value = sequenceNumber;
                    
        //     //         event.target.submit();
                    
                    
            
        //     //         document.getElementById('overlay').style.display = 'none';
        //     //         document.getElementById('formModal').style.display = 'none';
        //     //         document.getElementById('transactionForm').style.display = 'none';
        //     //         document.getElementById('alertMessage').innerText = 
        //     //         `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
        //     //         document.getElementById('customAlert').style.display = 'block';
        //     //         localStorage.removeItem('selectedOptionType');
        //     //         localStorage.removeItem('transactionOptionId');
        //     //         }
            
        //     //         showFormModal();
            
                    
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        // function loadSequenceCounters() {
        //     const storedCounters = localStorage.getItem('sequenceCounters');
        //     if (storedCounters) {
        //     return JSON.parse(storedCounters);
        //     } else {
        //     return {
        //     'Deposit': 10001,
        //     'Withdrawal': 20001,
        //     'Bill Payment': 30001
        //     };
        //     }
        //     }
    
        //     function saveSequenceCounters(counters) {
        //     localStorage.setItem('sequenceCounters', JSON.stringify(counters));
        //     }
    
        //     var sequenceCounters = loadSequenceCounters();
    
        //     function handleOptionClick(optionType) {
        //     if (confirm(`Are you sure you want to ${optionType}?`)) {
        //     let mappedOptionType;
        //     let transactionOptionId;
    
        //     if (optionType === 'CashDeposit') {
        //     mappedOptionType = 'Deposit';
        //     transactionOptionId = 1;  
        //     } else if (optionType === 'Withdrawal') {
        //     mappedOptionType = 'Withdrawal';
        //     transactionOptionId = 2; 
        //     } else if (optionType === 'BillPayment') {
        //     mappedOptionType = 'Bill Payment';
        //     transactionOptionId = 3;  
        //     }
    
        //     localStorage.setItem('selectedOptionType', mappedOptionType);
        //     localStorage.setItem('transactionOptionId', transactionOptionId);
        //     window.location.href = "/cus-form";
        //     document.querySelectorAll('.option-card').forEach((elem) => {
        //     elem.style.display = "none";
        //     });
        //     }
        //     }
    
    
        //     function showFormModal() {
        //     let optionType = localStorage.getItem('selectedOptionType');
        //     let transactionOptionId = localStorage.getItem('transactionOptionId');
    
        //     if (optionType && transactionOptionId) {
        //     document.getElementById('formModal').style.display = 'block';
        //     document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        //     document.getElementById('transaction_option_id_FK').value = transactionOptionId;
        //     } 
    
        //        }
    
    
    
        //     function handleFormSubmit(event) {
        //     event.preventDefault();
    
        //     let firstName = document.getElementById('fname').value.trim();
        //     let phoneNo = document.getElementById('cNo').value.trim();
    
        //     let errorMessage = "";
    
        //     if (firstName === "") {
        //     errorMessage += "Please enter your first name.\n";
        //     }
    
        //     var phoneRegex = /^\d{11}$/;
        //     if (!phoneRegex.test(phoneNo)) {
        //     errorMessage += "Phone number must be exactly 11 digits.\n";
        //     }
    
        //     if (errorMessage !== "") {
        //     alert(errorMessage);  
        //     return;  
        //     }
    
        //     let optionType = event.target.getAttribute('data-option-type');
    
        //     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        //     console.error('Invalid option type or sequence counter:', optionType);
        //     return;
        //     }
    
    
        //     let sequenceNumber = sequenceCounters[optionType]++;
        //     saveSequenceCounters(sequenceCounters);
    
        //     document.getElementById('transaction_name').value = optionType;
        //     document.getElementById('ticket_number').value = sequenceNumber;
    
        //     event.target.submit();
    
        //     document.getElementById('formModal').style.display = 'none';
        //     document.getElementById('alertMessage').innerText = `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
           
        //     document.getElementById('customAlert').style.display = 'block';
    
        //     localStorage.removeItem('selectedOptionType');
        //     localStorage.removeItem('transactionOptionId');
        //     }
    
        //     window.onload = function() {
        //     showFormModal();
        //     };
    
    
        //     function validateName() {
        //     let nameInput = document.getElementById('fname').value.trim();
        //     let nameError = document.getElementById('nameError');
    
        //     let nameRegex = /^[a-zA-Z\s]+$/;
    
        //     if (nameInput === "") {
        //     nameError.textContent = "Please enter your name.";
        //     } else if (!nameRegex.test(nameInput)) {
        //     nameError.textContent = "Name cannot contain numbers or special characters.";
        //     } else {
        //     nameError.textContent = "";  
        //     }
        //     }
    
        //     function validatePhone() {
        //     let phoneInput = document.getElementById('cNo').value.trim();
        //     let phoneError = document.getElementById('phoneError');
    
        //     let phoneRegex = /^\d{11}$/;
    
        //     if (phoneInput === "") {
        //     phoneError.textContent = "Please enter your phone number.";
        //     } else if (!phoneRegex.test(phoneInput)) {
        //     phoneError.textContent = "Phone number must be exactly 11 digits.";
        //     } else {
        //     phoneError.textContent = "";  
        //     }
        //     }
        
        //     function handleFormSubmit(event) {
        //     event.preventDefault();
        //     validateName();
        //     validatePhone();
    
        //     let nameError = document.getElementById('nameError').textContent;
        //     let phoneError = document.getElementById('phoneError').textContent;
    
        //     if (nameError !== "" || phoneError !== "") {
        //          return;
        //     }
    
        //     let firstName = document.getElementById('fname').value.trim();
        //     let phoneNo = document.getElementById('cNo').value.trim();
    
        //     let optionType = event.target.getAttribute('data-option-type');
    
        //     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        //         // console.error('Invalid option type or sequence counter:', optionType);
        //         return;
        //     }
    
        //     let sequenceNumber = sequenceCounters[optionType]++;
        //     saveSequenceCounters(sequenceCounters);
    
        //     document.getElementById('transaction_name').value = optionType;
        //     document.getElementById('ticket_number').value = sequenceNumber;
        //     event.target.submit();
    
        //     document.getElementById('formModal').style.display = 'none';
        //     document.getElementById('alertMessage').innerText = 
        //     `Thank you, ${firstName}. Your ticket number is ${sequenceNumber}' for ${optionType}.`;
        //     document.getElementById('customAlert').style.display = 'block';
        //     document.getElementById('overlay').style.display='none';
        //         document.getElementById('transactionForm').style.display='none';
        //     localStorage.removeItem('selectedOptionType');
        //     localStorage.removeItem('transactionOptionId');
        //     }
    
         
        //     showFormModal();
           
    
        
        
    
    
    //     function loadSequenceCounters() {
    //         const storedCounters = localStorage.getItem('sequenceCounters');
    //         if (storedCounters) {
    //             return JSON.parse(storedCounters);
    //         } else {
    //             return {
    //                 'Deposit': 10001,
    //                 'Withdrawal': 20001,
    //                 'Bill Payment': 30001
    //             };
    //         }
    //     }
        
    
    //     function saveSequenceCounters(counters) {
    //         localStorage.setItem('sequenceCounters', JSON.stringify(counters));
    //     }
        
    //     var sequenceCounters = loadSequenceCounters();
    //     function handleOptionClick(optionType) {
    //     const confirmationOverlay = document.getElementById('confirmationOverlay');
    //     const confirmationMessage = document.getElementById('confirmationMessage');
    //     const confirmButton = document.getElementById('confirmButton');
    
    //     confirmationMessage.innerText = `Are you sure you want to proceed with ${optionType}?`;
    //     confirmationOverlay.style.display = 'flex';
    
    //     confirmButton.onclick = function() {
    //         confirmationOverlay.style.display = 'none';
    //         let mappedOptionType;
    //         let transactionOptionId;
    
    //         if (optionType === 'CashDeposit') {
    //             mappedOptionType = 'Deposit';
    //             transactionOptionId = 1;  
    //         } else if (optionType === 'Withdrawal') {
    //             mappedOptionType = 'Withdrawal';
    //             transactionOptionId = 2; 
    //         } else if (optionType === 'BillPayment') {
    //             mappedOptionType = 'Bill Payment';
    //             transactionOptionId = 3;  
    //         }
    
    //         localStorage.setItem('selectedOptionType', mappedOptionType);
    //         localStorage.setItem('transactionOptionId', transactionOptionId);
    //         window.location.href = "/cus-form";  
    //     };
    
    //     document.getElementById('cancelButton').onclick = function() {
    //         confirmationOverlay.style.display = 'none';
    //     };
    // }
    
    //     function showFormModal() {
    //         let optionType = localStorage.getItem('selectedOptionType');
    //         let transactionOptionId = localStorage.getItem('transactionOptionId');
        
    //         if (optionType   &&   transactionOptionId) {
    //             document.getElementById('formModal').style.display = 'block';
    //             document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
    //             document.getElementById('transaction_option_id_FK').value = transactionOptionId;
    //         } 
    //     }
        
    //     function validateName() {
    //         let nameInput = document.getElementById('fname').value.trim();
    //         let nameError = document.getElementById('nameError');
    //         let nameRegex = /^[a-zA-Z\s]+$/;
        
    //         if (nameInput === "") {
    //             nameError.textContent = "Please enter your name.";
    //         } else if (!nameRegex.test(nameInput)) {
    //             nameError.textContent = "Name cannot contain numbers or special characters.";
    //         } else {
    //             nameError.textContent = "";  
    //         }
    //     }
        
    //         function validatePhone() {
    //         let phoneInput = document.getElementById('phoneNumber').value.trim();
    //         let phoneError = document.getElementById('phoneError');
    //         let phoneRegex = /^\d{11}$/;
    
    //         if (phoneInput === "") {
    //         phoneError.textContent = "Please enter your phone number.";
    //         } else if (!phoneRegex.test(phoneInput)) {
    //         phoneError.textContent = "Phone number must be exactly 11 digits.";
    //         } else {
    //         phoneError.textContent = "";  
    //         }
            
    //         }
    
    
    //     function handleFormSubmit(event) {
    //         event.preventDefault();
            
    //         validateName();
    //         validatePhone();
        
    //         let nameError = document.getElementById('nameError').textContent;
    //         let phoneError = document.getElementById('phoneError').textContent;
    
    //         if (nameError !== "" || phoneError !== "") {
    //         return;
    //         }
        
    //         let firstName = document.getElementById('fname').value.trim();
    //         let optionType = event.target.getAttribute('data-option-type');
            
    
    //         if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
    //         console.error('Invalid option type or sequence counter:', optionType);
    //         return;
    //         }
    
            
    //         let sequenceNumber = sequenceCounters[optionType]++;
    //         saveSequenceCounters(sequenceCounters);        
    //         document.getElementById('transaction_name').value = optionType;
    //         document.getElementById('ticket_number').value = sequenceNumber;
            
    //         event.target.submit();
            
            
    
    //         document.getElementById('overlay').style.display = 'none';
    //         document.getElementById('formModal').style.display = 'none';
    //         document.getElementById('transactionForm').style.display = 'none';
    //         document.getElementById('alertMessage').innerText = 
    //         `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
    //         document.getElementById('customAlert').style.display = 'block';
    //         localStorage.removeItem('selectedOptionType');
    //         localStorage.removeItem('transactionOptionId');
    //         }
    
    //         showFormModal();
    
            
         
    
            
            
            
        
            
            
    
    
    
    
    
    
        // function loadSequenceCounters() {
        //     const storedCounters = localStorage.getItem('sequenceCounters');
        //     if (storedCounters) {
        //         return JSON.parse(storedCounters);
        //     } else {
        //         return {
        //             'Deposit': 10001,
        //             'Withdrawal': 20001,
        //             'Bill Payment': 30001
        //         };
        //     }
        // }
        
        // function saveSequenceCounters(counters) {
        //     localStorage.setItem('sequenceCounters', JSON.stringify(counters));
        // }
        
        // var sequenceCounters = loadSequenceCounters();
        
        // function handleOptionClick(optionType) {
        //     if (confirm(`Are you sure you want to ${optionType}?`)) {
        //         let mappedOptionType;
        //         let transactionOptionId;
        
        //         if (optionType === 'CashDeposit') {
        //             mappedOptionType = 'Deposit';
        //             transactionOptionId = 1;  
        //         } else if (optionType === 'Withdrawal') {
        //             mappedOptionType = 'Withdrawal';
        //             transactionOptionId = 2; 
        //         } else if (optionType === 'BillPayment') {
        //             mappedOptionType = 'Bill Payment';
        //             transactionOptionId = 3;  
        //         }
        
        //         localStorage.setItem('selectedOptionType', mappedOptionType);
        //         localStorage.setItem('transactionOptionId', transactionOptionId);
        //         window.location.href = "/cus-form";
        //         document.querySelectorAll('.option-card').forEach((elem) => {
        //             elem.style.display = "none";
        //         });
        //     }
        // }
        
        // function showFormModal() {
        //     let optionType = localStorage.getItem('selectedOptionType');
        //     let transactionOptionId = localStorage.getItem('transactionOptionId');
        
        //     if (optionType && transactionOptionId) {
        //         document.getElementById('formModal').style.display = 'block';
        //         document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        //         document.getElementById('transaction_option_id_FK').value = transactionOptionId;
        //     } 
        // }
        
        // function validateName() {
        //     let nameInput = document.getElementById('fname').value.trim();
        //     let nameError = document.getElementById('nameError');
        //     let nameRegex = /^[a-zA-Z\s]+$/;
        
        //     if (nameInput === "") {
        //         nameError.textContent = "Please enter your name.";
        //     } else if (!nameRegex.test(nameInput)) {
        //         nameError.textContent = "Name cannot contain numbers or special characters.";
        //     } else {
        //         nameError.textContent = "";  
        //     }
        // }
        
        // function validatePhone() {
        //     let phoneInput = document.getElementById('phoneNumber').value.trim();
        //     let phoneError = document.getElementById('phoneError');
        //     let phoneRegex = /^\d{11}$/;
        
        //     if (phoneInput === "") {
        //         phoneError.textContent = "Please enter your phone number.";
        //     } else if (!phoneRegex.test(phoneInput)) {
        //         phoneError.textContent = "Phone number must be exactly 11 digits.";
        //     } else {
        //         phoneError.textContent = "";  
        //     }
        // }
        
        
        // function handleFormSubmit(event) {
        //     event.preventDefault();
        //     validateName();
        //     validatePhone();
        
        //     let nameError = document.getElementById('nameError').textContent;
        //     let phoneError = document.getElementById('phoneError').textContent;
        
        //     if (nameError !== "" || phoneError !== "") {
        //         return;
        //     }
        
        //     let firstName = document.getElementById('fname').value.trim();
        //     let optionType = event.target.getAttribute('data-option-type');
            
        //     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        //         console.error('Invalid option type or sequence counter:', optionType);
        //         return;
        //     }
        
        //     let sequenceNumber = sequenceCounters[optionType]++;
        //     saveSequenceCounters(sequenceCounters);
        
        //     document.getElementById('transaction_name').value = optionType;
        //     document.getElementById('ticket_number').value = sequenceNumber;
            
            
        //     event.target.submit();
        
            
            
        //     document.getElementById('overlay').style.display = 'none';
        //     document.getElementById('formModal').style.display = 'none';
        //     document.getElementById('transactionForm').style.display = 'none';  
    
    
        //     Window.location.href='/ticket-number';
        //     document.getElementById('alertMessage').innerText = 
        //         `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
    
        //     document.getElementById('customAlert').style.display = 'block';
            
            
            
        
            
            
        //     localStorage.removeItem('selectedOptionType');
        //     localStorage.removeItem('transactionOptionId');
        // }
        
        // window.onload = function() {
        //     showFormModal();
        // };
            
    
        
        //     function loadSequenceCounters() {
        //     const storedCounters = localStorage.getItem('sequenceCounters');
        //     if (storedCounters) {
        //         return JSON.parse(storedCounters);
        //     } else {
        //         return {
        //             'Deposit': 10001,
        //             'Withdrawal': 20001,
        //             'Bill Payment': 30001
        //         };
        //     }
        // }
        
        // function saveSequenceCounters(counters) {
        //     localStorage.setItem('sequenceCounters', JSON.stringify(counters));
        // }
        
        // var sequenceCounters = loadSequenceCounters();
        
        // function handleOptionClick(optionType) {
        //     if (confirm(`Are you sure you want to ${optionType}?`)) {
        //         let mappedOptionType;
        //         let transactionOptionId;
                
        //         if (optionType === 'CashDeposit') {
        //             mappedOptionType = 'Deposit';
        //             transactionOptionId = 1;  
        //         } else if (optionType === 'Withdrawal') {
        //             mappedOptionType = 'Withdrawal';
        //             transactionOptionId = 2; 
        //         } else if (optionType === 'BillPayment') {
        //             mappedOptionType = 'Bill Payment';
        //             transactionOptionId = 3;  
        //         }
        
        //         localStorage.setItem('selectedOptionType', mappedOptionType);
        //         localStorage.setItem('transactionOptionId', transactionOptionId);
        //         window.location.href = "/cus-form";
        //         document.querySelectorAll('.option-card').forEach((elem) => {
        //             elem.style.display = "none";
        //         });
        //     }
        // }
        
        // function showFormModal() {
        //     let optionType = localStorage.getItem('selectedOptionType');
        //     let transactionOptionId = localStorage.getItem('transactionOptionId');
        //     console.log('Retrieved Option Type:', optionType);
            
        //     if (optionType && transactionOptionId) {
        //         document.getElementById('formModal').style.display = 'block';
        //         document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        //         document.getElementById('transaction_option_id_FK').value = transactionOptionId;
        //     } else {
        //         console.error('Option type or transaction option ID not found in localStorage');
        //     }
        // }
        
        // function handleFormSubmit(event) {
        //     event.preventDefault();
        
        //     let optionType = event.target.getAttribute('data-option-type');
        //     if (!optionType || !sequenceCounters.hasOwnProperty(optionType)) {
        //         console.error('Invalid option type or sequence counter:', optionType);
        //           return;
        //     }
        
        //     let firstName = document.getElementById('fname').value;
        //     let sequenceNumber = sequenceCounters[optionType]++;
        
        //     saveSequenceCounters(sequenceCounters);
        
        //     document.getElementById('transaction_name').value = optionType;
        //     document.getElementById('ticket_number').value = sequenceNumber;
        
        //     event.target.submit();
        //     document.getElementById('formModal').style.display = 'none';
        //     document.getElementById('alertMessage').innerText = `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
        //     document.getElementById('customAlert').style.display = 'block';
        
        //     localStorage.removeItem('selectedOptionType');
        //     localStorage.removeItem('transactionOptionId');
        // }
        
        // window.onload = function() {
        //     showFormModal();
        // };
    
    
        // function validateForm() {
        //      document.getElementById('fnameError').innerHTML = "";
        //     document.getElementById('phoneError').innerHTML = "";
    
        //       var firstName = document.getElementById('fname').value.trim();
        //     var phoneNo = document.getElementById('cNo').value.trim();
    
        //      var phoneRegex = /^\d{11}$/;
        //     var isValid = true;
    
        //      if (firstName === "") {
        //         document.getElementById('fnameError').innerHTML = "Please enter your first name.";
        //         isValid = false;  
        //     }
    
        //      if (phoneNo === "") {
        //         document.getElementById('phoneError').innerHTML = "Please enter your phone number.";
        //         isValid = false;  
        //     } else if (!/^\d+$/.test(phoneNo)) {  
        //         document.getElementById('phoneError').innerHTML = "Invalid phone number. Only digits are allowed.";
        //         isValid = false;  
        //     } else if (!phoneRegex.test(phoneNo)) {  
        //         document.getElementById('phoneError').innerHTML = "Phone number must be exactly 11 digits.";
        //         isValid = false;  
        //     }
    
            
        //     return isValid;
        // }
    
    //     var sequenceCounters = {
    //         'Deposit': 10001,
    //         'Withdrawal': 20001,
    //         'Bill Payment': 30001
    //     };
    //     function handleOptionClick(optionType) {
    //         if (confirm(`Are you sure you want to ${optionType}?`)) {
    //             // Store the selected option in localStorage
    //             localStorage.setItem('selectedOptionType', optionType);
                
    //             // Redirect to the form page
    //             window.location.href = "/cus-form";
    //         } else {
    //             console.log('User cancelled the action.');
    //         }
    //     }
    
    
    //         // Show the form modal after the page loads or after confirmation
    //     // Show the form modal after the page loads
    // function showFormModal() {
    //     let optionType = localStorage.getItem('selectedOptionType');
    //     console.log('Retrieved Option Type:', optionType); // Debugging output
    //     if (optionType) {
    //         document.getElementById('formModal').style.display = 'block';
    //         document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
    //     } else {
    //         console.error('No optionType found in localStorage!');
    //     }
    // }
    
    // // Handle form submission
    // function handleFormSubmit(event) {
    //     event.preventDefault();
    
    //     let optionType = event.target.getAttribute('data-option-type');
    //     console.log('Form Submitted for Option:', optionType); // Debugging output
    
    //     if (!sequenceCounters.hasOwnProperty(optionType)) {
    //         console.error('Invalid optionType or sequence counter not found for:', optionType);
    //         return;
    //     }
    
    //     let firstName = document.getElementById('fname').value;
    //     let phoneNo = document.getElementById('cNo').value;
    //     let sequenceNumber = sequenceCounters[optionType]++;
    
    //     // Display the custom alert with the ticket number
    //     document.getElementById('formModal').style.display = 'none';
    //     document.getElementById('alertMessage').innerText = `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
    //     document.getElementById('customAlert').style.display = 'block';
    
    //     // Reset the form
    //     event.target.reset();
    
    //     // Clear localStorage (optional)
    //     localStorage.removeItem('selectedOptionType');
    // }
    
    // // Trigger showFormModal on page load
    // window.onload = function() {
    //     showFormModal();
    // };
    
    
        // var sequenceCounters = {
        //     'Deposit': 10001,
        //     'Withdrawal': 20001,
        //     'Bill Payment': 30001
        // };
        
        // // Show the form modal after the page loads
        // function showFormModal() {
        //     // Retrieve the saved optionType from localStorage
        //     let optionType = localStorage.getItem('selectedOptionType');
        //     console.log('Option Type:', optionType); // Debugging output
        //     if (optionType) {
        //         document.getElementById('formModal').style.display = 'block';
        //         document.getElementById('transactionForm').setAttribute('data-option-type', optionType);
        //     } else {
        //         console.error('No optionType found in localStorage!');
        //     }
        // }
        
        // // Handle form submission
        // function handleFormSubmit(event) {
        //     event.preventDefault();
        
        //     let optionType = event.target.getAttribute('data-option-type');
        //     console.log('Form Submitted for Option:', optionType); // Debugging output
        
        //     if (!sequenceCounters.hasOwnProperty(optionType)) {
        //         console.error('Invalid optionType or sequence counter not found for:', optionType);
        //         return;
        //     }
        
        //     let firstName = document.getElementById('fname').value;
        //     let phoneNo = document.getElementById('cNo').value;
        //     let sequenceNumber = sequenceCounters[optionType]++;
        
        //     // Display the custom alert with the ticket number
        //     document.getElementById('formModal').style.display = 'none';
        //     document.getElementById('alertMessage').innerText = `Thank you, ${firstName}. Your ticket number is ${sequenceNumber} for ${optionType}.`;
        //     document.getElementById('customAlert').style.display = 'block';
        
        //     // Reset the form
        //     event.target.reset();
        
        //     // Clear localStorage (optional)
        //     localStorage.removeItem('selectedOptionType');
        // }
        
        // // Trigger showFormModal on page load
        // window.onload = function() {
        //     showFormModal();
        // };
            
        //     // // jquery
    
        // $(document).ready(function() {
    
        //     // First name validation
        //     $('#fname').keyup(function() {
        //         let fsname = $(this).val();
        //         let fnamerf = /^[a-zA-Z\s]{3,}$/;  
        
        //         if (!fnamerf.test(fsname)) {
        //             $(this).next('span').show().text('Allow only alphabetic characters and length must be greater than 2').css("color", "red");
        //             $(this).css('border', '1px solid red');
        //         } else {
        //             $(this).css('border', '1px solid green');
        //             $(this).next('span').hide();
        //         }
        //     });
        
        //     // Phone number validation
        //     $('#cNo').keyup(function() {
        //         let phoneNumber = $(this).val();
        //         var phoneNumberRegex = /^\d{12}$/;  
        
        //         if (!phoneNumberRegex.test(phoneNumber)) {
        //             $(this).next('span').show().text('Please enter a valid phone number with exactly 12 digits').css('color', 'red');
        //             $(this).css('border', '1px solid red');
        //         } else {
        //             $(this).css('border', '1px solid green');
        //             $(this).next('span').hide();
        //         }
        //     });
        
        //     // Form submission validation
        //     $('#transactionForm').submit(function(e) {
        //         e.preventDefault(); // Prevent form submission
        
        //         let isValid = true;
        
        //         // First name validation during form submit
        //         let fsname = $('#fname').val();
        //         let fnamerf = /^[a-zA-Z\s]{3,}$/;  
        //         if (fsname.length === 0 || !fnamerf.test(fsname)) {
        //             $('#fname').css('border', '1px solid red');
        //             $('#fname').next('span').show().text('Please enter a valid name with alphabetic characters and length greater than 2').css('color', 'red');
        //             isValid = false;
        //         } else {
        //             $('#fname').css('border', '1px solid green');
        //             $('#fname').next('span').hide();
        //         }
        
        //         // Phone number validation during form submit
        //         let phoneNumber = $('#cNo').val();
        //         let phoneNumberRegex = /^\d{12}$/;  
        //         if (phoneNumber.length === 0 || !phoneNumberRegex.test(phoneNumber)) {
        //             $('#cNo').css('border', '1px solid red');
        //             $('#cNo').next('span').show().text('Please enter a valid phone number with exactly 12 digits').css('color', 'red');
        //             isValid = false;
        //         } else {
        //             $('#cNo').css('border', '1px solid green');
        //             $('#cNo').next('span').hide();
        //         }
        
        //         // If the form is not valid, do not submit
        //         if (!isValid) {
        //             // This prevents the form submission
        //             return false; 
        //         }
        
        //         // If the form is valid, submit the form
        //         alert("Form submitted successfully!");
        //         // You can add your AJAX call here or proceed with the form submission
        //         $(this).off('submit').submit(); // This allows the form to submit
        //     });
        // });
            
        //   const sequenceCounters = {
        //   'Deposit': 10001,
        //   'Withdrawal': 20001,
        //   'Bill Payment': 30001
        //   };
    
        //   function generateSequentialNumber(action) {
        //       sequenceCounters[action]++;
        //       return sequenceCounters[action];
        //   }
    
        //   function handleOptionClick(action) {
        //       const sequentialNumber = generateSequentialNumber(action);
    
        //       if (confirm(`Are you sure you want to ${action}?`)) {
        //                window.location.href="/cus-form";
        //       }
        //   }
    
        //   function showFormModal(action) {
        //       document.getElementById('modalOverlay').style.display = 'block';
        //       document.getElementById('formModal').style.display = 'block';
        //       document.getElementById('formModal').dataset.action = action; 
        //   }
    
        //   function closeFormModal() {
        //       document.getElementById('modalOverlay').style.display = 'none';
        //       document.getElementById('formModal').style.display = 'none';
        //   }
    
        //   function showCustomAlert(message) {
        //       document.getElementById('alertMessage').innerText = message;
        //       document.getElementById('customAlert').addEventListener('click',function(){
        // this.style.display='none';
        //       })
        //   }
    
        //   function handleFormSubmit(event) {
        //       event.preventDefault();  
    
        //       const action = document.getElementById('formModal').dataset.action;
        //       const sequentialNumber = generateSequentialNumber(action);
    
        //       closeFormModal();
        //       showCustomAlert(`Your transaction number is: ${sequentialNumber}`);
        //   }
    
    
    
        // series number ticket
        // const sequenceCounters = {
        //     'Deposit': 10001,
        //     'Withdrawal': 20001,
        //     'Bill Payment': 30001
        //     };
    
    
        //     function generateSequentialNumber(action) {
        //     sequenceCounters[action]++;
        //     return sequenceCounters[action];
        //     }
    
    
        //   function handleOptionClick(action, element) {
    
    
        //   if (confirm(`Are you sure you want to ${action}?`)) {
    
        //   document.querySelectorAll('.option-card').forEach(item => {
        //    window.location.href = '/cus-form';
    
        //         });
    
        //   } 
    
        // }
    
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
    
    
        // function showCustomAlert(message) {
        //     document.getElementById('alertMessage').innerText = message;
        //     document.getElementById('customAlert').style.display = 'block';
        // }
    
    
    
    
    
        // $(document).ready(function() { 
    
        //     $("#account-select").change(function() {
        //       $("#show-address").show('slide');
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#show-address").click(function(){
        //       $("#address-history").show('slide');
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#yes").click(function(){
        //       $("#current-address").show('slide');
        //       $("#non-uk").hide();
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#no").click(function(){
        //       $("#non-uk").show('slide');
        //       $("#current-address").hide();
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#yes-prev").click(function(){
        //       $("#previous-address").show('slide');
        //       $("#get-consent").show('slide');
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //      $("#no-prev").click(function(){
        //       $("#get-consent").show('slide');
        //       $("#previous-address").hide();
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#get-consent").click(function(){
        //       $("#your-consent").show('slide');
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#credit-click").click(function() {
        //       $("#info-request").show('slide');
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $("#info-click").click(function() {
        //       $("#submit-app").show('slide');
        //       window.scrollTo(0,document.body.scrollHeight);
        //     });
    
        //     $('#app-form').on('submit', function(){
        //       var arr = $(this).serializeArray();
        //       console.log(arr);
        //       return false;
        //   });
        //   });
    
    
    
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
    