<?php

namespace Drupal\student\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\student\Form\StudentForm;

class StudentAttendanceController extends ControllerBase {

  public function studentList() {
    $connection = mysqli_connect('localhost', 'root', '', 'student_attandance');

    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $students = mysqli_query($connection, "SELECT * FROM sdata");
    $absentees = mysqli_query($connection, "SELECT * FROM sdata WHERE attendance = 0");
    $results = mysqli_query($connection, "SELECT rollNo, attendance FROM sdata");

    $dictionary = [];
    $ids = [];
    $att = [];

    $form = [];

    while ($student = mysqli_fetch_assoc($students)) {
      $stuId = $student['rollNo'];
      $form[$stuId] = \Drupal::formBuilder()->getForm(StudentForm::class, $stuId);
    }

    mysqli_close($connection);

    return [
      '#theme' => 'studentlist',
      '#title' => 'Mark Attendance',
      '#details' => $students,
      '#absentstudent' => $absentees,
      '#attdictionary' => $dictionary,
      '#ids' => $ids,
      '#atts' => $att,
      '#form' => $form,
    ];
  }

}
