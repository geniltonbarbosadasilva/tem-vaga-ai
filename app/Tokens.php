<?php

class Tokens extends DataBase
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
            $sql = "SELECT * FROM Tokens";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                $deletePath = http_build_query([
                    "operation" => "delete",
                    "table" => "tokens"
                ]);
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
                while ($row = $results->fetch_assoc()) {
                    [
                        "id" => $id,
                        "name" => $name,
                        "email" => $email,
                        "password" => $password
                    ] = $row;
                    echo
                        "<tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$email</td>
                            <td>$password</td>
                            <td>
                                <a href='create-token.php?id=$id'>
                                    <i class=\"transition fa fa-pencil\"></i>
                                </a>
                            </td>
                            <td>
                                <a href='../app/controller.php?id=$id&$deletePath'>
                                    <i class=\"transition fa fa-minus-circle\"></i>
                                </a> 
                            </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        } catch (\Throwable $th) {
            echo 'Exceção capturada: ' . $th->getMessage() . "\n";
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM Tokens WHERE id=$id";

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

    public function create($token)
    {
        try {
            $name = $token["name"];
            $email = $token["email"];
            $password =  $token["password"];

            $sql = "INSERT INTO Tokens ( name, email, password)
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

    public function update($record)
    {
        try {
            [
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "password" => $password
            ] = $record;

            $sql = "UPDATE Tokens SET name='$name', email='$email', password='$password' WHERE id=$id";

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
        try {
            $sql = "SELECT * FROM Tokens WHERE id=$id";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                $result = $results->fetch_object();
                return [
                    "id" => $result->id,
                    "name" => $result->name,
                    "email" => $result->email,
                    "password" => $result->password
                ];
            } else {
                echo "0 results";
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage()
            ];
        }
    }
}
