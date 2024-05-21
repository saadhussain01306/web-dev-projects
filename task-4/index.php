<!DOCTYPE html>
<html>
<head>
    <title>Display Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 20px; 
        }
        form input[type="submit"], form input[type="button"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 20px; 
        }
        form input[type="submit"]:hover, form input[type="button"]:hover {
            background-color: #3e8e41;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Enter Student Details</h2>

<form method="post" action="" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter name" required>
    
    <label for="usn">USN:</label>
    <input type="text" id="usn" name="usn" placeholder="Enter USN" required>
    
    <input type="submit" value="Fetch Details">
</form>

<div class="center">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST['name'];
    $usn = $_POST['usn'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'cpga_names');
    if ($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    }

    // Fetch data from database
    $sql = "SELECT name, usn, section, department, ROUND(cgpa, 2) as cgpa FROM students WHERE name = '$name' AND usn = '$usn'";
    $result = $conn->query($sql);

    // Display data
    if ($result->num_rows > 0) {
        echo "<h2>Student Details</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>USN</th><th>Section</th><th>Department</th><th>CGPA</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["usn"] . "</td>";
            echo "<td>" . $row["section"] . "</td>";
            echo "<td>" . $row["department"] . "</td>";
            echo "<td>" . $row["cgpa"] . "</td>";
            echo "</tr>";

            // Add student data to CSV file
            $filename = 'students.csv';
            $file = fopen($filename, 'a'); // 'a' mode for append
            if ($file) {
                fputcsv($file, array($row["name"], $row["usn"], $row["section"], $row["department"], $row["cgpa"]));
                fclose($file);
                echo "<p>Student added successfully to CSV file.</p>";
            } else {
                echo "Unable to open CSV file for writing.";
            }
        }
        echo "</table>";

        // Provide link to view/download CSV file
        echo '<h2></h2><a href="students.csv" target="_blank">View/Download CSV file</a></h2>';
    } else {
        echo "No student found with the provided details.";
    }
    $conn->close();
}
?>

</div>

</body>
</html>
