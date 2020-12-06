<?php

class Properties extends DataBase
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
            $sql = "SELECT * FROM Properties";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                $deletePath = http_build_query([
                    "operation" => "delete",
                    "table" => "properties"
                ]);
                $user = new Users();

                echo
                    "<table>
                    <tr>
                        <th>ID</th>
                        <th>Propietario</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descriçao</th>
                        <th>Endereço</th>
                        <th></th>
                        <th></th>
                    </tr>";

                while ($row = $results->fetch_assoc()) {
                    [
                        "id" => $id,
                        "id_owner" => $id_owner,
                        "title" => $title,
                        "price" => $price,
                        "description" => $description,
                        "address" => $address
                    ] = $row;
                    $owner = $user->getRecordById($id_owner);
                    $owner_name = (array_key_exists("name", $owner)) ? $owner["name"] : "";

                    echo
                        "<tr>
                            <td>$id</td>
                            <td>$owner_name</td>
                            <td>$title</td>
                            <td>$price</td>
                            <td>$description</td>
                            <td>$address</td>
                            <td>
                                <a href='create-property.php?id=$id'>
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
            $images = new Images();
            $imgs = $images->getImagesByOwnerId($id);

            foreach ($imgs as $img) {
                $images->delete($img["id"]);
            }

            $sql = "DELETE FROM Properties WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro excluído com sucesso",
                    "table" => "property"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => "Erro ao excluir registro: " . $this->getConnection()->error,
                    "table" => "property"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "property"
            ];
        }
    }

    public function create($property, $imgs)
    {
        try {
            if (!Validation::validate(
                $property,
                [
                    "title" => "require|string",
                    "price" => "require|number",
                    "description" => "require|string",
                    "address" => "require|string",    
                ]
            )) {
                return [
                    "type" => "fail",
                    "message" => Validation::getMessage(),
                    "table" => "property"
                ];
            }

            [
                "id_owner" => $id_owner,
                "title" => $title,
                "price" => $price,
                "description" => $description,
                "address" => $address
            ] = $property;

            $sql = "INSERT INTO Properties ( id_owner, title, price, description, address)
                    VALUES ('$id_owner', '$title', '$price', '$description', '$address')";

            if ($this->getConnection()->query($sql) === TRUE) {

                $images = new Images();
                $response = $images->uploadImages($this->getConnection()->insert_id, $imgs);
                if ($response["type"] == "fail") {
                    $response["table"] = "property";
                    return $response;
                }

                return [
                    "type" => "success",
                    "message" => "Novo registro criado com sucesso",
                    "table" => "property"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "property"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "property"
            ];
        }
    }

    public function update($record)
    {
        try {
            if (!Validation::validate(
                $record,
                [
                    "title" => "require|string",
                    "price" => "require|number",
                    "description" => "require|string",
                    "address" => "require|string",    
                ]
            )) {
                return [
                    "type" => "fail",
                    "message" => Validation::getMessage(),
                    "table" => "property"
                ];
            }

            [
                "id" => $id,
                "id_owner" => $id_owner,
                "title" => $title,
                "price" => $price,
                "description" => $description,
                "address" => $address
            ] = $record;

            $sql = "UPDATE Properties SET id_owner='$id_owner', title='$title', price='$price', description='$description', address='$address' WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro atualizado com sucesso",
                    "table" => "property"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "property"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "property"
            ];
        }
    }

    public function getRecordById($id)
    {
        try {
            $sql = "SELECT * FROM Properties WHERE id=$id";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                return $results->fetch_array(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "property"
            ];
        }
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM Properties";
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
                "table" => "property"
            ];
        }
    }
}
