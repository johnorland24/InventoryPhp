<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

  <h1>Student Management System</h1>

  <div class="container">
    <div class="row mb-3">
      <div class="col-md-6">
        <h2>Add Student</h2>
        <form id="addStudentForm">
          <div class="mb-3">
            <label for="studentName" class="form-label">Student Name:</label>
            <input type="text" class="form-control" id="studentName" name="studentName" required>
          </div>
          <div class="mb-3">
            <label for="subjects" class="form-label">Subjects (Subject Name: Grade):</label>
            <textarea id="subjects" class="form-control" name="subjects" rows="3" required></textarea>
            <small class="text-muted">Separate subject and grade with a colon (':'). Add multiple subjects on separate lines.</small>
          </div>
          <button type="submit" class="btn btn-primary" id="addStudentBtn">Add Student</button>
        </form>
      </div>
      <div class="col-md-6">
        <h2>Update Student Grade</h2>
        <form id="updateStudentGradeForm">
          <div class="mb-3">
            <label for="studentNameUpdate" class="form-label">Student Name:</label>
            <input type="text" class="form-control" id="studentNameUpdate" name="studentNameUpdate" required>
          </div>
          <div class="mb-3">
            <label for="subjectUpdate" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subjectUpdate" name="subjectUpdate" required>
          </div>
          <div class="mb-3">
            <label for="newGrade" class="form-label">New Grade:</label>
            <input type="number" class="form-control" id="newGrade" name="newGrade" min="0" max="100" required>
          </div>
          <button type="submit" class="btn btn-primary" id="updateStudentGradeBtn">Update Grade</button>
        </form>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <h2>Remove Student</h2>
        <form id="removeStudentForm">
          <div class="mb-3">
            <label for="studentNameRemove" class="form-label">Student Name:</label>
            <input type="text" class="form-control" id="studentNameRemove" name="studentNameRemove" required>
          </div>
          <button type="submit" class="btn btn-danger" id="removeStudentBtn">Remove Student</button>
        </form>
      </div>
    </div>

    <div id="studentList">
      <?php
        // PHP functions here
        $students = [];

        function addStudent($name, $subjects) {
          global $students;
          $subjectLines = explode("\n", $subjects);
          // ... function logic
          foreach ($subjectLines as $line) {
            // Split the subject and grade by colon
            $parts = explode(":", $line);
            $subject = trim($parts[0]);
            $grade = trim($parts[1]);
            // Add the subject and grade to the student's subjects array
            $students[$name][$subject] = $grade;
          }
        }

        function updateStudentGrades($name, $subject, $newGrade) {
          global $students;
          
          if (isset($students[$name])) {
            // Update the grade for the specified subject
            $students[$name][$subject] = $newGrade;
          }
        }

        function removeStudent($name) {
          global $students;
          
          if (isset($students[$name])) {
            // Remove the student from the array
            unset($students[$name]);
          }
        }

        function displayStudents() {
          global $students;
          
          if (count($students) > 0) {
            echo '<table class="table">';
            echo '<thead><tr><th>Student Name</th><th>Subject</th><th>Grade</th></tr></thead>';
            echo '<tbody>';
            // Iterate through each student
            foreach ($students as $name => $subjects) {
              // Iterate through each subject and grade
              foreach ($subjects as $subject => $grade) {
                echo "<tr><td>$name</td><td>$subject</td><td>$grade</td></tr>";
              }
            }
            echo '</tbody>';
            echo '</table>';
          } else {
            echo "<p>No students found.</p>";
          }
        }

        // Sample data (remove later)
        addStudent("John Orland", "Math: 90\nEnglish: 85\nScience: 92");
        addStudent("Jeff", "Math: 88\nHistory: 79\nScience: 95");
        addStudent("Nicole", "Math: 93\nEnglish: 87\nLiterature: 91");

        displayStudents();
      ?>
    </div>
  </div>
</body>
</html>
