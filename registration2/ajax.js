$(document).ready(function() {
    // Handle registration form submission
    $('#registerForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        // Make AJAX request to register.php endpoint
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: formData,
            success: function(response) {
                $('#registrationMessage').html(response.message);
                if (response.success) {
                    // Redirect to login page or perform other actions upon successful registration
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
