$(document).ready(function() {
    // Event listener for Save button
    $('#saveBtn').click(function() {
        var quantity = $('#quantity').val();
        var frequency = $('#frequency').val();

        // Make AJAX request to save water intake details
        $.ajax({
            type: 'POST',
            url: 'ajax.php', // Replace with your PHP API endpoint
            data: {
                quantity: quantity,
                frequency: frequency
            },
            success: function(response) {
                console.log(response);
                // Handle success response as needed
                $('#totalIntake').text(response.totalIntake);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error response as needed
            }
        });
    });

    // Event listener for Next button
    $('#nextBtn').click(function() {
        // Implement functionality for Next button if needed
    });
});
