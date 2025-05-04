<?php
include_once("conf.php");
include_once("models/Student.class.php");
include_once("views/Student.view.php");

class StudentController
{
  private $student;

  function __construct()
  {
    $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->student->open();

    $this->student->getStudents();

    $data = array();

    while ($row = $this->student->getResult()) {
      array_push($data, $row);
    }

    $this->student->close();

    $view = new StudentView();
    $view->render($data);
  }

  function add($data)
  {
    $this->student->open();
    $this->student->add($data);
    $this->student->close();
  }

  function update($data)
  {
    $this->student->open();
    $this->student->update($data);
    $this->student->close();
  }

  function delete($id)
  {
    $this->student->open();
    $this->student->delete($id);
    $this->student->close();
  }

  function edit($id)
  {
    $this->student->open();
    $this->student->getStudentById($id);
    $data = $this->student->getResult();
    $this->student->close();
    
    $view = new StudentView();
    $view->formEdit($data);
  }

  function formAdd()
  {
    $view = new StudentView();
    $view->formAdd();
  }
}