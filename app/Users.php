<?php

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
                $deletePath = http_build_query([
                    "operation" => "delete",
                    "table" => "users"
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
                                <a href='create-user.php?id=$id'>
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
            $sql = "DELETE FROM Users WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro excluído com sucesso",
                    "table" => "user"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => "Erro ao excluir registro: " . $this->getConnection()->error,
                    "table" => "user"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "user"
            ];
        }
    }

    public function create($user)
    {
        try {
            [
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "password" => $password
            ] = $user;

            $sql = "INSERT INTO Users ( name, email, password)
                    VALUES ('$name', '$email', '$password')";
            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Novo registro criado com sucesso",
                    "table" => "user"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "user"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "user"
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

            $sql = "UPDATE Users SET name='$name', email='$email', password='$password' WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro atualizado com sucesso",
                    "table" => "user"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "user"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "user"
            ];
        }
    }

    public function getRecordById($id)
    {
        try {
            $sql = "SELECT * FROM Users WHERE id=$id";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                return $results->fetch_array(MYSQLI_ASSOC);
            } else {
                echo "0 results";
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "user"
            ];
        }
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM Users";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                return $results->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "user"
            ];
        }
    }
}
