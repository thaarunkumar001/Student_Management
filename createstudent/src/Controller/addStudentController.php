<?php

namespace Drupal\createstudent\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\createstudent\Form\CreateStudent;

class addStudentController extends ControllerBase {

  public function createstudentList() {
    $connection = mysqli_connect('localhost', 'root', '', 'student_attandance');

    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM sdata";
    $employees = mysqli_query($connection, $sql);

    $sql1 = "SELECT * FROM sdata WHERE attendance=0" ;
    $absentees = mysqli_query($connection, $sql1);

    mysqli_close($connection);

    $form = \Drupal::formBuilder()->getForm(CreateStudent::class);

    return [
      '#theme' => 'createstudent',
      '#title' => 'Create Student Details',
      '#details' => $employees,
      '#absentstudent' => $absentees,
      '#form' => $form,
    ];
  }

}

?>