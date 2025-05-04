<?php

include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");

$student = new StudentController();

if (isset($_POST['add'])) {
    $data = [
        'name' => $_POST['name'],
        'nim' => $_POST['nim'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date']
    ];
    
    $student->add($data);
    
    header("location:index.php");
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    
    $student->delete($id);
    
    header("location:index.php");
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    
    if (isset($_POST['update'])) {
        $data = [
            'id' => $id,
            'name' => $_POST['name'],
            'nim' => $_POST['nim'],
            'phone' => $_POST['phone'],
            'join_date' => $_POST['join_date']
        ];
        
        $student->update($data);
        
        header("location:index.php");
    } else {
        $student->edit($id);
    }
} else if (!empty($_GET['add'])) {
    $student->formAdd();
} else {
    $student->index();
}