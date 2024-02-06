$(document).ready(function() {
    // Event listener for Save button
    $('#saveBtn').click(function() {
        var time = $('#time').val();
        var carbs = $('#carbs').val();
        var protein = $('#protein').val();
        var calories = $('#calories').val();

        // Make AJAX request to save meal details
        $.ajax({
            type: 'POST',
            url: 'ajax.php', // PHP API endpoint
            data: {
                time: time,
                carbs: carbs,
                protein: protein,
                calories: calories
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
