### Overview
This HTML and PHP script allows users to add and delete student details from a database. It features two forms: one for adding a new student with their marks and one for deleting a student based on their name and USN.

### HTML and CSS

#### Structure
1. **Add Student Form**:
   - Collects detailed information about the student, including their name, USN, subject, section, department, and marks for five tests.
   - Uses the GET method to send data to the server for processing.

2. **Delete Student Form**:
   - Collects the name and USN of the student to be deleted.
   - Uses the GET method to send data to the server for processing.

#### Styling
1. **General Styling**:
   - The body is styled with a maximum width of 500px and centered content.
   - Inputs and buttons are styled for consistency with padding, border-radius, and hover effects.

2. **Form Inputs and Buttons**:
   - Text and number inputs are styled with padding and border-radius.
   - Submit buttons are styled with a background color, hover effects, and are set to 100% width.

### PHP Script

#### Form Handling
1. **Database Connection**:
   - A connection to the MySQL database `connect_database` is established using the `mysqli` class.
   - Error handling is included to check if the connection fails.

2. **Add Student**:
   - If the "Add Student" form is submitted, the script retrieves the student's details from the GET parameters.
   - The average marks are calculated by averaging the five test marks.
   - A SQL `INSERT` statement is constructed to add the student details to the `students` table.
   - If the query is successful, a success message is displayed. Otherwise, an error message is shown.

3. **Delete Student**:
   - If the "Delete Student" form is submitted, the script retrieves the student's name and USN from the GET parameters.
   - A SQL `DELETE` statement is constructed to remove the student from the `students` table based on the name and USN.
   - If the query is successful, a success message is displayed. Otherwise, an error message is shown.

4. **Closing Connection**:
   - The database connection is closed after the queries are executed.


