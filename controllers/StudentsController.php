<?php

namespace school\controllers;

use school\dto\StudentDTO;
use school\services\StudentManager;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/10/2015
 * Time: 22:25
 */
class StudentsController extends BaseController
{
    public function actionIndex() {

        $studentManager = new StudentManager();

        return $this->render('/index', [
            'studentsList' => $studentManager->getList(),
        ]);
    }


    public function actionCreate() {

        $status = true;
        $errors = [];
        $studentManager = new StudentManager();

        if($_POST) {

            $student = new StudentDTO();

            $student->setFirstname($_POST['firstname']);
            $student->setLastname($_POST['lastname']);
            $student->setAge($_POST['age']);
            $student->setBirthday($_POST['bday']);
            $student->setEmail($_POST['email']);
            $student->setSex($_POST['sex']);
            $student->setAbout($_POST['comment']);

            $result = $studentManager->create($student);



            if(!$result['state']) {
                $status = $result['state'];
                $errors = $result['errors'];
            }

            return $this->render('index' , [
                'studentsList' => $studentManager->getList(),
                'status' => $status,
                'errors' => $errors,
            ]);
        }

        return $this->render('create' , [
            'studentsList' => $studentManager->getList(),
        ]);
    }

    public function actionUpdate($id) {

        $studentManager = new StudentManager();

        $studentUpdate = $studentManager->update($id);

        if($_POST) {
            $student = new StudentDTO();

            $student->setFirstname($_POST['firstname']);
            $student->setLastname($_POST['lastname']);
            $student->setAge($_POST['age']);
            $student->setBirthday($_POST['bday']);
            $student->setEmail($_POST['email']);
            $student->setSex($_POST['sex']);
            $student->setAbout($_POST['message']);

//            $studentManager->


//            return $this->render('update');

        } else {
            return $this->render('update' , [
                'firstname' => $studentUpdate['firstname'],
                'lastname' => $studentUpdate['lastname'],
                'age' => $studentUpdate['age'],
                'bday' => $studentUpdate['bday'],
                'email' => $studentUpdate['email'],
                'sex' => $studentUpdate['sex'],
                'message' => $studentUpdate['message'],
            ]);
        }


    }
}