$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();
        console.log("Form data: ", formData);

        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log("Response: ", response);
                if (response.status === 'success') {
                    toastr.success(response.message, '', {
                        positionClass: 'toast-bottom-right',
                        timeOut: 3000
                    });
                    setTimeout(function() {
                        window.location.href = 'stats.php';
                    }, 3000);
                } else {
                    toastr.error(response.message, '', {
                        positionClass: 'toast-bottom-right',
                        timeOut: 3000
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error: ", status, error);
                toastr.error('Une erreur est survenue lors de la tentative de connexion.', '', {
                    positionClass: 'toast-bottom-right',
                    timeOut: 3000
                });
            }
        });
    });
});
