<?php

class StudentView
{
  public function render($data)
  {
    $no = 1;
    $dataStudent = null;
    
    foreach ($data as $val) {
      list($id, $name, $nim, $phone, $join_date) = $val;
      
      $dataStudent .= "<tr>
                <td>" . $id . "</td>
                <td>" . $name . "</td>
                <td>" . $nim . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-success'>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Delete</a>
                </td>
                </tr>";
    }

    $tpl = new Template("template/index.html");
    $tpl->replace("JUDUL", "Students");
    $tpl->replace("DATA_TABEL", $dataStudent);
    $tpl->write();
  }

  public function formAdd()
  {
    $tpl = new Template("template/create.html");
    $tpl->replace("JUDUL", "Add Student");
    $tpl->write();
  }

  public function formEdit($data)
  {
    list($id, $name, $nim, $phone, $join_date) = $data;
    
    $tpl = new Template("template/edit.html");
    $tpl->replace("JUDUL", "Edit Student");
    $tpl->replace("ID", $id);
    $tpl->replace("NAME", $name);
    $tpl->replace("NIM", $nim);
    $tpl->replace("PHONE", $phone);
    $tpl->replace("JOIN_DATE", $join_date);
    $tpl->write();
  }
}