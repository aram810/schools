<?php

namespace school\services;

use school\dto\StudentDTO;
use school\library\Database;

class StudentManager
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function validate($post) {
        $errors = array();

        $emailPattern = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

        $bdayPattern = "/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/";

        if (!ctype_alpha($post['firstname'])) {
            $errors['firstname'] = "Firstname is incorrect!";
        }

        if (!ctype_alpha($post['lastname'])) {
            $errors['lastname'] = "Lastname is incorrect!";
        }

        if (!is_numeric($post['age'])) {
            $errors['age'] = "Age is incorrect!";
        }

        if (!preg_match($emailPattern, $post['email'])) {
            $errors['email'] = 'Email is incorrect';
        }

        if(!preg_match($bdayPattern , $post['bday'])) {
            $errors['bday'] = 'Birthday is incorrect';
        }

        if (empty($post['sex'])) {
            $errors['sex'] = "Sex is required field" . $errors['sex'] . "<br>";
        }

        if(empty($errors)) {
            return [
                'state' => true,
                'errors' => []
            ];
        } else {
            return [
                'state' => false,
                'errors' => $errors
            ];
        }
    }


    public function create(StudentDTO $student)
    {
        $connection = $this->db->getConn();

        $exists = 'SELECT id FROM students LIMIT 1';

        $isValid = $this->validate($_POST);

        if($isValid['state']) {

            $sql = "INSERT INTO students(firstname, lastname, age, bday, email, sex, comment) VALUES ('"
                . $student->getFirstname() . "', '"
                . $student->getLastname() . "', '"
                . $student->getAge() . "', '"
                . $student->getBirthday() . "', '"
                . $student->getEmail() . "', '"
                . $student->getSex() . "', '"
                . $student->getAbout() . "')";

            $result = $connection->query($sql);
            if($result !== true) {
                echo mysqli_errno($connection) . ": " . mysqli_error($connection). "\n";
            }
        }

        return $isValid;
    }

    public function getList()
    {
        $result = [];
        $conn = $this->db->getConn();


        $sql = "SELECT * FROM students";

        $resultDB = $conn->query($sql);


        while ($row = $resultDB->fetch_assoc()) {
            $student = new StudentDTO();

            $student->setId($row["id"]);
            $student->setFirstname($row["firstname"]);
            $student->setLastname($row["lastname"]);
            $student->setAge($row["age"]);
            $student->setBirthday($row["bday"]);
            $student->setEmail($row["email"]);
            $student->setSex($row["sex"]);
            $student->setAbout($row["message"]);


            array_push($result, $student);
        }

        return $result;
    }


    public function update($id)
    {
        $conn = $this->db->getConn();

        $student = new StudentDTO();

        $sql = 'SELECT * FROM students WHERE id="' . $id . '"';

        $result = $conn->query($sql)->fetch_assoc();
//       echo '<pre>'; print_r($result);die;
        $student->setId($result['id']);
        $student->setFirstname($result['firstname']);
        $student->setLastname($result['lastname']);
        $student->setAge($result['age']);
        $student->setBirthday($result['bday']);
        $student->setEmail($result['email']);
        $student->setSex($result['sex']);
        $student->setAbout($result['message']);

        return $result;
    }

    public function delete()
    {

    }


}