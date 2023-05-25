<?php

namespace Drupal\student\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\student\Form\EmployeeForm;

class StudentController extends ControllerBase {

  public function studentList() {
    $connection = mysqli_connect('localhost', 'root', '', 'student_attandance');

    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM sdata";
    $employees = mysqli_query($connection, $sql);

    $sql1 = "SELECT * FROM sdata WHERE attendance=0" ;
    $absentees = mysqli_query($connection, $sql1);

    mysqli_close($connection);

    $form = \Drupal::formBuilder()->getForm(EmployeeForm::class);

    return [
      '#theme' => 'studentlist',
      '#title' => 'Student Details',
      '#details' => $employees,
      '#absentstudent' => $absentees,
      '#form' => $form,
    ];
  }

}

?>