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
        try {            
            $imageFileType = 
                strtolower(
                    pathinfo(basename($file["upload-images"]["name"]), PATHINFO_EXTENSION)
                );
            $directory = PROJECT_DIRECTORY . "storage/img-$name.$imageFileType";

            // Check if image file is a actual image or fake image    
            if ( getimagesize( $file["upload-images"]["tmp_name"] ) === false ) {
                return [
                    "type" => "fail",
                    "message" => "O arquivo não é uma imagem.",
                    "table" => "image"
                ];
            }

            // Check file size
            if ($file["upload-images"]["size"] > 500000) {
                return [
                    "type" => "fail",
                    "message" => "O arquivo é muito grande.",
                    "table" => "image"
                ];
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                return [
                    "type" => "fail",
                    "message" => "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.",
                    "table" => "image"
                ];
            }

            if (move_uploaded_file($file["upload-images"]["tmp_name"], $directory)) {
                return [
                    "type" => "success",
                    "message" => "O arquivo foi carregado.",
                    "table" => "image"
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
