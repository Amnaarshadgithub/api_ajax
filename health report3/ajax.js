$(document).ready(function() {
    // Event listener for generating health report
    $('#generateReportBtn').click(function() {
        // Make AJAX request to fetch health report data
        $.ajax({
            type: 'GET',
            url: 'ajax.php', // Replace with your PHP API endpoint
            success: function(response) {
                console.log(response);
                // Handle success response as needed
                $('#waterIntake').text(response.waterIntake + " litres");
                $('#sleep').text(response.sleep + " hrs");
                $('#exercise').text(response.exercise + " mins");
                $('#caloriesBurned').text(response.caloriesBurned + " kcal");
                $('#caloriesGained').text(response.caloriesGained + " kcal");
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error response as needed
            }
        });
    });
});
