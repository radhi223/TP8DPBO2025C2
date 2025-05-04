<?php

class Student extends DB
{
    function getStudents()
    {
        $query = "SELECT * FROM students";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        
        $query = "INSERT INTO `students`(`name`, `nim`, `phone`, `join_date`) VALUES ('$name', '$nim', '$phone', '$join_date')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM students WHERE id=$id";

        return $this->execute($query);
    }

    function getStudentById($id)
    {
        $query = "SELECT * FROM students WHERE id=$id";
        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        
        $query = "UPDATE students SET name='$name', nim='$nim', phone='$phone', join_date='$join_date' WHERE id='$id'";

        return $this->execute($query);
    }
}