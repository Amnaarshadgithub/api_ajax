$(document).ready(function() {
    // Make AJAX request to fetch dashboard data
    $.ajax({
        type: 'GET',
        url: 'ajax.php', // Replace with your PHP API endpoint for dashboard data
        success: function(response) {
            console.log(response);
            // Handle success response as needed
            displayDashboard(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error response as needed
        }
    });

    // Function to display dashboard data
    function displayDashboard(data) {
        // Update HTML elements with fetched data
        $('#caloriesBurnt').text(data.caloriesBurnt);
        $('#caloriesGained').text(data.caloriesGained);
        $('#exerciseTime').text(data.exerciseTime);
        $('#sleepTime').text(data.sleepTime);
        // Add more elements as needed
    }
});
