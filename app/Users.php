<?php

include 'DataBase.php';

class Users extends DataBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function table()
    {
        try {
            $sql = "SELECT * FROM Users";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                echo
                    "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th></th>
                        <th></th>
                    </tr>";
                // output data of each row
                while ($row = $results->fetch_assoc()) {
                    echo
                        "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["password"] . "</td>
                            <td>
                                <a href='create-user.php?id=" . $row["id"] . "'>
                                    <i class=\"transition fa fa-pencil\"></i>
                                </a>
                            </td>
                            <td>
                                <a href='../app/controller.php?id=" . $row["id"] . "&operation=delete&table=users'>
                                    <i class=\"transition fa fa-minus-circle\"></i>
                                </a> 
                            </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                return "0 results";
            }
        } catch (\Throwable $th) {
            echo 'Exceção capturada: ' . $th->getMessage() . "\n";
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM Users WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro excluído com sucesso"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => "Erro ao excluir registro: " . $this->getConnection()->error
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage()
            ];
        }
    }

    public function create($user)
    {
        try {
            $name = $user["name"];
            $email = $user["email"];
            $password =  $user["password"];

            $sql = "INSERT INTO Users ( name, email, password)
                    VALUES ('$name', '$email', '$password')";
            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Novo registro criado com sucesso"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage()
            ];
        }
    }

    public function update($id, $record)
    {
        try {
            [ 
                "name" => $name, 
                "email" => $email,
                "password" => $password
            ] = $record;

            $sql = "UPDATE Users SET name=\"$name\", email=\"$email\", password=\"$password\" WHERE id=\"$id\"";
        
            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro atualizado com sucesso"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage()
            ];
        }
    }

    public function getRecordById($id)
    {
        $sql = "SELECT * FROM Users WHERE id=$id";
        $results = $this->getConnection()->query($sql);

        if ($results->num_rows > 0) {
            $result = $results->fetch_object();
            return [
                "name" => $result->name,
                "email" => $result->email,
                "password" => $result->password
            ];
        } else {
            echo "0 results";
        }
    }
}
