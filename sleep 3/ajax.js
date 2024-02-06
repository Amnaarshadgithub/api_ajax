$(document).ready(function() {
    // Event listener for Save button
    $('#saveBtn').click(function() {
        var startTime = $('#startTime').val();
        var endTime = $('#endTime').val();
        var duration = $('#duration').val();

        // Make AJAX request to save sleep routine details
        $.ajax({
            type: 'POST',
            url: 'ajax.php', // Replace with your PHP API endpoint
            data: {
                startTime: startTime,
                endTime: endTime,
                duration: duration
            },
            success: function(response) {
                console.log(response);
                // Handle success response as needed
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
