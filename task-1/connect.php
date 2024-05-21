<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $subject = $_POST['subject'];
    $section = $_POST['section'];
    $department = $_POST['department'];
    $grades = $_POST['grades'];

    // Calculate the average of grades
    $totalGrades = array_sum($grades);
    $averageGrade = $totalGrades / count($grades);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'add_grades');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO grades (name, usn, subject, section, department, grade1, grade2, grade3, grade4, grade5, average_grade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssiiiiid", $name, $usn, $subject, $section, $department, $grades[0], $grades[1], $grades[2], $grades[3], $grades[4], $averageGrade);

        // Execute the statement
        $execval = $stmt->execute();

        // Check if the execution was successful
        if ($execval) {
            echo "Student Data Added to the database.<br>";
            echo "Average Marks: " . number_format($averageGrade, 2);
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>
