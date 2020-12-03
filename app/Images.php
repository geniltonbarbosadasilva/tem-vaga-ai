<?php

class Images extends DataBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM Images WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro excluído com sucesso",
                    "table" => "image"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => "Erro ao excluir registro: " . $this->getConnection()->error,
                    "table" => "image"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "image"
            ];
        }
    }

    public function updateImages( $id_property, $imgs)
    {
        try {
            foreach ($imgs as $img) {
                $response = $this->store( $img, $this->getConnection()->insert_id );
                if( $response["type"] == "success" ){
                    $response = $this->create([
                        "id_property" => $id_property,
                        "title" => "image",
                        "src" => $response["src"]
                    ]);
                    if( $response["type"] == "fail" ){
                        return $response;
                    }
                } else {
                    return $response;
                }
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "image"
            ];
        }
    }    

    public function create($image)
    {
        try {
            [
                "id_property" => $id_property,
                "title" => $title,
                "src" => $src
            ] = $image;

            $sql = "INSERT INTO Images ( id_property, title, src )
                    VALUES ( '$id_property', '$title', '$src')";
            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Novo registro criado com sucesso",
                    "table" => "image"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "image"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "image"
            ];
        }
    }

    public function update($record)
    {
        try {
            [
                "id" => $id,
                "id_property" => $id_property,
                "title" => $title,
                "src" => $src
            ] = $record;

            $sql = "UPDATE Images SET id_property='$id_property', title='$title', src='$src' WHERE id=$id";

            if ($this->getConnection()->query($sql) === TRUE) {
                return [
                    "type" => "success",
                    "message" => "Registro atualizado com sucesso",
                    "table" => "image"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => $this->getConnection()->error,
                    "table" => "image"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "image"
            ];
        }
    }

    public function getImagesByOwnerId( $id_property )
    {
        try {
            $sql = "SELECT * FROM Images WHERE id_property=$id_property";
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
                "table" => "image"
            ];
        }
    }

    public function getRecordById($id)
    {
        try {
            $sql = "SELECT * FROM Images WHERE id=$id";
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
                "table" => "image"
            ];
        }
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM Images";
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
                "table" => "image"
            ];
        }
    }

    public function store($file, $name)
    {
        echo "<pre>";
        print_r($file);
        echo "</pre>";
        try {            
            $imageFileType = 
                strtolower(
                    pathinfo(basename($file["name"]), PATHINFO_EXTENSION)
                );
            $directory = PROJECT_DIRECTORY . "storage/img-$name.$imageFileType";

            // Check if image file is a actual image or fake image    
            if ( getimagesize( $file["tmp_name"] ) === false ) {
                return [
                    "type" => "fail",
                    "message" => "O arquivo não é uma imagem.",
                    "table" => "image"
                ];
            }

            // Check file size
            if ($file["size"] > 500000) {
                return [
                    "type" => "fail",
                    "message" => "O arquivo é muito grande.",
                    "table" => "image"
                ];
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "webp"
            ) {
                return [
                    "type" => "fail",
                    "message" => "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.",
                    "table" => "image"
                ];
            }

            if (move_uploaded_file($file["tmp_name"], $directory)) {
                return [
                    "type" => "success",
                    "message" => "O arquivo foi carregado.",
                    "table" => "image",
                    "src" => "storage/img-$name.$imageFileType"
                ];
            } else {
                return [
                    "type" => "fail",
                    "message" => "Ocorreu um erro ao enviar seu arquivo.",
                    "table" => "image"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage(),
                "table" => "image"
            ];
        }
    }
}
