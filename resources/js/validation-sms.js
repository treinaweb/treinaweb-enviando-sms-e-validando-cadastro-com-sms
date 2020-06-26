let validationButton = document.getElementById('validation-button');
let celNumber = document.getElementById('celnumber');
let validationCodeContainer = document.getElementById('validation-code-container');

validationButton.addEventListener('click', function(event) {
    event.preventDefault();

    let url = `http://sms.test/send-sms/${celNumber.value}`;
    
    fetch(url, {
        headers: {
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "post"
    }).then(function(response) {
        if (response.ok) {
            alert('O código de validação foi enviado para seu celular');

            validationCodeContainer.classList.remove('d-none');
            
        }

    })
})