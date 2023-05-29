<?php

namespace Drupal\displaystudent\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\displaystudent\Form\CreateStudent;

class StudentController extends ControllerBase {

  public function displaystudentList() {
    $connection = mysqli_connect('localhost', 'root', '', 'student_attandance');

    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT COUNT(attendance) AS total_absentees FROM sdata WHERE attendance = 0";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalAbsentees = $row['total_absentees'];

    $sql2 = "SELECT COUNT(attendance) AS total_present FROM sdata WHERE attendance = 1";
    $result2 = mysqli_query($connection, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $totalpresent = $row2['total_present'];

    $sql1 = "SELECT * FROM sdata WHERE attendance = 0";
    $absentees = mysqli_query($connection, $sql1);

    mysqli_close($connection);

    $form = \Drupal::formBuilder()->getForm(CreateStudent::class);

    return [
      '#theme' => 'displaystudentlist',
      '#title' => 'Student Details',
      '#absentcount' => $totalAbsentees,
      '#presentcount' => $totalpresent,
      '#absentstudent' => $absentees,
      '#form' => $form,
    ];
  }
}
