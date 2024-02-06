$(document).ready(function() {
    // Event listener for Save button
    $('#saveBtn').click(function() {
        var age = $('#age').val();
        var height = $('#height').val();
        var weight = $('#weight').val();

        // Make AJAX request to save user details
        $.ajax({
            type: 'POST',
            url: 'ajax.php', // PHP API endpoint
            data: {
                age: age,
                height: height,
                weight: weight
            },
            success: function(response) {
                $('#message').text(response.message);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Event listener for Next button
    $('#nextBtn').click(function() {
        // Implement functionality for Next button if needed
    });
});
