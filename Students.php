<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

    <?php
      
      $students = [];

      function addStudent($name, $subjects) {
          global $students;

          
          if (array_key_exists($name, $students)) {
              echo "Student $name already exists.\n";
              return;
          }

          
          if (!is_array($subjects) || array_keys($subjects) !== array_values(array_map('strval', array_keys($subjects)))) {
              echo "Invalid subjects format. Subjects should be an associative array with subject names as keys and grades as values.\n";
              return;
          }

          $students[$name] = $subjects;
          echo "Student $name added successfully.\n";
      }

      function updateStudentGrades($name, $subject, $newGrade) {
          global $students;

          
          if (!array_key_exists($name, $students)) {
              echo "Student $name not found.\n";
              return;
          }

         
          if (!array_key_exists($subject, $students[$name])) {
              echo "Subject $subject not found for student $name.\n";
              return;
          }

          $students[$name][$subject] = $newGrade;
          echo "Grade for subject $subject of student $name updated successfully.\n";
      }

      function removeStudent($name) {
          global $students;

         
          if (!array_key_exists($name, $students)) {
              echo "Student $name not found.\n";
              return;
          }

          unset($students[$name]);
          echo "Student $name removed successfully.\n";
      }

      function displayStudents() {
          global $students;

          if (empty($students)) {
              echo "No students found.\n";
              return;
          }

          
          echo '<table class="table table-striped table-bordered">';
          echo '<thead><tr><th>Name</th>';

      
          $uniqueSubjects = [];
          foreach ($students as $student => $subjects) {
              $uniqueSubjects = array_merge($uniqueSubjects, array_keys($subjects));
          }
          $uniqueSubjects = array_unique($uniqueSubjects);

     
          foreach ($uniqueSubjects as $subject) {
              echo "<th>$subject</th>";
          }

          echo '</tr></thead>';
          echo '<tbody>';

          foreach ($students as $name => $grades) {
              echo '<tr><td>' . $name . '</td>';

              foreach ($uniqueSubjects as $subject) {
                  if (array_key_exists($subject, $grades)) {
                      echo "<td>" . $grades[$subject] . "</td>";
                  } else {
                      echo "<td>-</td>";
                  }
              }

              echo '</tr>';
          }

          echo '</tbody></table>';
      }

      // Test functions
      addStudent("John Orland", ["Math" => 90, "English" => 85, "Science" => 92]);
      addStudent("Jeff", ["Math" => 88, "History" => 79, "Science" => 95]);
      addStudent("Nicole", ["Math" => 93, "English" => 87, "Literature" => 91]);

      displayStudents();

      updateStudentGrades("John Orland", "Math", 95);

      displayStudents();

      removeStudent("Nicole");

      displayStudents();
  
 
  ?>
</body>
</html>
