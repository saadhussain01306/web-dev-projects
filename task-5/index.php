<!DOCTYPE html>
<html>
<head>
    <title>Add/Delete Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        form input[type="text"], form input[type="number"] {
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

<h2>Add/Delete Student Details</h2>

<h3>Add Student</h3>
<form method="get" action="">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter name" required>
    
    <label for="usn">USN:</label>
    <input type="text" id="usn" name="usn" placeholder="Enter USN" required>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" placeholder="Enter subject" required>

    <label for="section">Section:</label>
    <input type="text" id="section" name="section" placeholder="Enter section" required>

    <label for="department">Department:</label>
    <input type="text" id="department" name="department" placeholder="Enter department" required>

    <label for="test1">Test 1 Marks:</label>
    <input type="number" id="test1" name="test1" min="0" max="20" required>

    <label for="test2">Test 2 Marks:</label>
    <input type="number" id="test2" name="test2" min="0" max="20" required>

    <label for="test3">Test 3 Marks:</label>
    <input type="number" id="test3" name="test3" min="0" max="20" required>

    <label for="test4">Test 4 Marks:</label>
    <input type="number" id="test4" name="test4" min="0" max="20" required>

    <label for="test5">Test 5 Marks:</label>
    <input type="number" id="test5" name="test5" min="0" max="20" required>
    
    <input type="submit" name="add" value="Add Student">
</form>

<h3>Delete Student</h3>
<form method="get" action="">
    <label for="delete_name">Name:</label>
    <input type="text" id="delete_name" name="delete_name" placeholder="Enter name" required>

    <label for="delete_usn">USN:</label>
    <input type="text" id="delete_usn" name="delete_usn" placeholder="Enter USN" required>

    <input type="submit" name="delete" value="Delete Student">
</form>

<div class="center">
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'connect_database');
    if ($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    }

    // Add student
    if (isset($_GET['add'])) {
        $name = $_GET['name'];
        $usn = $_GET['usn'];
        $subject = $_GET['subject'];
        $section = $_GET['section'];
        $department = $_GET['department'];
        $test1 = $_GET['test1'];
        $test2 = $_GET['test2'];
        $test3 = $_GET['test3'];
        $test4 = $_GET['test4'];
        $test5 = $_GET['test5'];

        $average = round(($test1 + $test2 + $test3 + $test4 + $test5) / 5, 2);

        $sql = "INSERT INTO students (name, usn, subject, section, department, test1, test2, test3, test4, test5, average) VALUES ('$name', '$usn', '$subject', '$section', '$department', '$test1', '$test2', '$test3', '$test4', '$test5', '$average')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Student added successfully.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Delete student
    if (isset($_GET['delete'])) {
        $delete_name = $_GET['delete_name'];
        $delete_usn = $_GET['delete_usn'];

        $sql = "DELETE FROM students WHERE name = '$delete_name' AND usn = '$delete_usn'";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Student deleted successfully.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
</div>

</body>
</html>
