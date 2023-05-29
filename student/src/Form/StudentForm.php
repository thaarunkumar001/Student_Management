<?php

namespace Drupal\student\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;

class StudentForm extends FormBase {

  public function getFormId() {
    return 'student_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL) {
    $form['attendance'] = [
      '#type' => 'checkbox',
      '#default_value' => $this->getAttendanceValue($id),
      '#ajax' => [
        'callback' => '::submitFormAjaxCallback',
        'event' => 'change',
      ],
    ];

    $form['student_id'] = [
      '#type' => 'hidden',
      '#default_value' => $id,
    ];

    $form['message'] = [
      '#type' => 'markup',
      '#prefix' => '<div id="attendance-message">',
      '#suffix' => '</div>',
    ];

    $form['#attached']['library'][] = 'student/student-form';

    return $form;
  }

  public function submitFormAjaxCallback(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();

    $attendance = $form_state->getValue('attendance');
    $studentId = $form_state->getValue('student_id');

    $this->storeFormData($attendance, $studentId);

    // $response->addCommand(new ReplaceCommand('#attendance-message', $this->t('Attendance updated successfully.')));

    // return $response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $attendance = $form_state->getValue('attendance');
    $studentId = $form_state->getValue('student_id');

    $this->storeFormData($attendance, $studentId);

    $response = new AjaxResponse();
    $response->addCommand(new ReplaceCommand('.student-form-container', $this->t('Attendance updated successfully.')));

    return $response;
  }

  private function getAttendanceValue($studentId)
  {
    $connection = mysqli_connect('localhost', 'root', '', 'student_attandance');

    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT attendance FROM sdata WHERE rollNo = '$studentId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['attendance'] ?? 0;
  }

  private function storeFormData($attendance, $studentId)
  {
    $connection = mysqli_connect('localhost', 'root', '', 'student_attandance');

    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE sdata SET attendance = '$attendance' WHERE rollNo = '$studentId'";
    mysqli_query($connection, $query);
  }


  // private function storeFormData($attendance, $studentId)
  // {
  //   $connection = mysqli_connect('localhost', 'root', '', 'student_db');

  //   if (!$connection) {
  //     die("Connection failed: " . mysqli_connect_error());
  //   }

  //   $query = "SELECT * FROM student_info WHERE rollNo = '$studentId'";
  //   $result = mysqli_query($connection, $query);
  //   $student = mysqli_fetch_assoc($result);

  //   if ($student) {
  //     $current = $student['attendance'];
  //     $update = $current == 1 ? 0 : 1;
  //     $updateQuery = "UPDATE student_info SET attendance = '$update' WHERE rollNo = '$studentId'";
  //     mysqli_query($connection, $updateQuery);
  //   }
  // }
}