<?php

class Rents extends DataBase
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
    {   // id, id_user, id_property, check_in, check_out
        try {
            $sql = "SELECT * FROM Rents";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                $deletePath = http_build_query([
                    "operation" => "delete",
                    "table" => "rents"
                ]);

                $users = new Users();
                $properties = new Properties();

                echo
                    "<table>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Imovel</th>
                        <th>Entrada</th>
                        <th>Saida</th>
                        <th></th>
                        <th></th>
                    </tr>";

                while ($row = $results->fetch_assoc()) {
                    [                         
                        "id" => $id,
                        "id_user" => $id_user,
                        "id_property" => $id_property,
                        "check_in" => $check_in,
                        "check_out" => $check_out
                    ] = $row;
                    
                    $user = $users->getRecordById($id_user);
                    $user_name = (array_key_exists("name", $user))? $user["name"] : "";

                    $property = $properties->getRecordById($id_property);
                    $property_name = (array_key_exists("title", $property))? $property["title"] : "";

                    echo
                        "<tr>
                            <td>$id</td>
                            <td>$user_name</td>
                            <td>$property_name</td>
                            <td>$check_in</td>
                            <td>$check_out</td>
                            <td>
                                <a href='create-rent.php?id=$id'>
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
                echo "<p>0 results</p>";
            }
        } catch (\Throwable $th) {
            echo 'Exceção capturada: ' . $th->getMessage() . "\n";
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM Rents WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro excluído com sucesso",
                    "table" => "rent"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => "Erro ao excluir registro: " . $this->getConnection()->error,
                    "table" => "rent"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "rent"
            ];
        }
    }

    public function create($rent)
    {
        try {
            [                         
                "id_user" => $id_user,
                "id_property" => $id_property,
                "check_in" => $check_in,
                "check_out" => $check_out
            ] = $rent;                

            $sql = "INSERT INTO Rents ( id_user, id_property, check_in, check_out)
                    VALUES ( '$id_user', '$id_property', '$check_in', '$check_out')";
            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Novo registro criado com sucesso",
                    "table" => "rent"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "rent"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "rent"
            ];
        }
    }

    public function update($record)
    {
        try {
            [   
                "id" => $id,                      
                "id_user" => $id_user,
                "id_property" => $id_property,
                "check_in" => $check_in,
                "check_out" => $check_out
            ] = $record;                

            $sql = "UPDATE Rents SET id_user='$id_user', id_property='$id_property', check_in='$check_in', check_out='$check_out' WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro atualizado com sucesso",
                    "table" => "rent"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "rent"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "rent"
            ];
        }
    }

    public function getRecordById($id)
    {
        try {
            $sql = "SELECT * FROM Rents WHERE id=$id";
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
                "table" => "rent"
            ];
        }
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM Rents";
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
                "table" => "rent"
            ];
        }
    }
}
