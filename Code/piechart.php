<?php
// Include the database connection file
include('conn_student.php');

// Run the SQL query to retrieve the survey responses data
$sql = "SELECT `id`, `username`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `suggestions`, `created_at` FROM `survey_responses` WHERE 1";
$result = mysqli_query($conn, $sql);

// Initialize an array to store the response counts for each question
$response_counts = array(
    '1' => 0, // Question 1
    '2' => 0, // Question 2, 3, 4, 6
    '3' => 0, // Question 5, 7
);

// Loop through each row of survey responses and count the responses for each question
while ($row = mysqli_fetch_assoc($result)) {
    if (isset($response_counts[$row['question1']])) {
        $response_counts[$row['question1']]++;
    }
    if (isset($response_counts[$row['question2']])) {
        $response_counts[$row['question2']]++;
    }
    if (isset($response_counts[$row['question3']])) {
        $response_counts[$row['question3']]++;
    }
    if (isset($response_counts[$row['question4']])) {
        $response_counts[$row['question4']]++;
    }
    if (isset($response_counts[$row['question5']])) {
        $response_counts[$row['question5']]++;
    }
    if (isset($response_counts[$row['question6']])) {
        $response_counts[$row['question6']]++;
    }
    if (isset($response_counts[$row['question7']])) {
        $response_counts[$row['question7']]++;
    }
}

// Create the data table for the pie chart
$data_table = array(
    array('Question', 'Responses'),
    array('Question 1', $response_counts['1']),
    array('Question 2', $response_counts['2']),
    array('Question 3', $response_counts['2']),
    array('Question 4', $response_counts['2']),
    array('Question 5', $response_counts['3']),
    array('Question 6', $response_counts['2']),
    array('Question 7', $response_counts['3']),
);

// Convert the data table to JSON format for the Google Charts API
$data_json = json_encode($data_table);
?>

<!DOCTYPE html>
<html>
<head>
		<a href="logout.php" class="logout">Logout</a>
    <!-- Load the Google Charts API -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $data_json; ?>);

            var options = {
                pieSliceText: 'value',
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <style>

    .logout {
	float: right;
	margin-top: 50px;
	margin-right: 20px;
	color: black;
	background-color: #ddd;
	padding: 8px 16px;
	border-radius: 5px;
	text-decoration: none;
    }

        /* Center align the page title */
        h1 {
            background-color: #003366;
            color: #fff;
            padding: 30px;
            text-align: center;
        }
        /* Center align the pie chart */
        #piechart {
            padding-left: 350px;
            margin: 20px 40px ;
            display: flex;
        }
    </style>
</head>
<body>
    <!-- Display the page title -->
    <h1>Survey Response Pie Chart</h1>

    <!-- Display the pie chart in the center -->
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>