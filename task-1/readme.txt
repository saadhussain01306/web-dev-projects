### PHP Script for Adding Student Data to a Database

This PHP script allows the user to add student details, including grades, to a database. It also calculates and stores the average grade for each student. Below is a step-by-step explanation of how the script works:

### HTML Form (Front-End)

1. **Form Structure**:
   - The form collects details like name, USN (University Seat Number), subject, section, department, and grades for five tests.
   - The form uses the POST method to send data to `connect.php`.

2. **HTML Elements**:
   - **Text Inputs**: For name, USN, subject, section, and department.
   - **Number Inputs**: For grades of five tests, with constraints to accept only numbers between 0 and 20.
   - **Submit Button**: To submit the form data.

### PHP Script (Back-End)

1. **Data Retrieval**:
   - The script retrieves form data using `$_POST` superglobal.
   - The grades are received as an array from the form input.

2. **Average Grade Calculation**:
   - The script calculates the total sum of grades and then computes the average grade.

3. **Database Connection**:
   - The script establishes a connection to the MySQL database named `add_grades` using the `mysqli` class.
   - Error handling is included to check if the connection fails.

4. **SQL Statement Preparation**:
   - A prepared statement is used to insert data into the `grades` table.
   - `bind_param` method is used to bind parameters to the SQL query, preventing SQL injection.

5. **Execution and Feedback**:
   - The script executes the prepared statement.
   - If successful, it echoes a success message along with the calculated average grade.
   - If there's an error during execution, it outputs the error message.
6. **Cleanup**:
   - The statement and connection are closed after execution.

### Security and Best Practices

1. **SQL Injection Prevention**:
   - Using prepared statements and parameterized queries to prevent SQL injection.

2. **Form Validation**:
   - Input fields have `required` attributes ensuring that users provide all necessary information.
   - Number inputs have `min` and `max` attributes to constrain input values.

This script ensures that student data, along with their grades and calculated average grade, is safely and efficiently added to the database, providing feedback to the user upon successful submission.
