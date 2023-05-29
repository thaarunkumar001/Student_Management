<?php
namespace Drupal\createstudent\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CreateStudent extends FormBase
{
    public function getFormId()
    {
        return 'student_create';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [ 
            '#type' => 'textfield', 
            '#title' => $this->t('Student Name'), 
            '#required' => TRUE, ]; 
        $form['age'] = [ 
            '#type' => 'textfield', 
            '#title' => $this->t('Student Age'), 
            '#required' => TRUE, ]; 
        $form['phoneno'] = [ 
                '#type' => 'textfield', 
                '#title' => $this->t('Student Phone No'), 
                '#required' => TRUE, ]; 
        $form['submit'] = [ 
            '#type' => 'submit', 
            '#value' => $this->t('Add Student'), ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // Retrieve form values using $form_state->getValue()
        $name = $form_state->getValue('name');
        $age = $form_state->getValue('age');
        $phoneno = $form_state->getValue('phoneno');

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student_attandance";
        $conn = new \mysqli($servername, $username, $password, $dbname);

        // Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo $name, $age, $phoneno;

            if (!empty($name) && $age > 0 && $phoneno > 0) {
                // Perform database insertion
                $sql = "INSERT INTO sdata(sname, age, phoneNO, attendance) VALUES ('$name', '$age', '$phoneno', 0)";
                $result = $conn->query($sql);

                if ($result) {
                    echo "<h4>INSERTED SUCCESSFULLY!</h4>";
                    $this->messenger()->addStatus($this->t('Student Added Successfully'));
                } else {
                    echo "<h4>INSERTION FAILED!</h4>";
                    $this->messenger()->addStatus($this->t('Failed'));
                }
            } else {
                echo "<h4>EMPTY!</h4>";
            }
        }

        // Close the database connection
        $conn->close();
        // $this->messenger()->addStatus($this->t('Student Added Successfully'));
    }
}
?>
