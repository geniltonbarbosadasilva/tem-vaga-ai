<?php

class Images extends DataBase
{
    private static $message = [                        
        1 => "O arquivo enviado excede o limite de tamanho.",
        2 => "O arquivo enviado excede o limite de tamanho.",
        3 => "O upload do arquivo foi feito parcialmente.",
        4 => "Nenhum arquivo foi enviado.",
        6 => "Pasta temporária ausênte.",
        7 => "Falha em escrever o arquivo em disco.",
        8 => "Uma extensão do PHP interrompeu o upload do arquivo."
    ];

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
            if ($image = $this->getRecordById($id)) {                
                unlink(PROJECT_DIRECTORY . $image["src"]);
            }
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

    public function uploadImages( $id_property, $imgs)
    {
        try {
            foreach ($imgs as $img) {
                if ( $img["error"] != 0) {                    
                    return [
                        "type" => "fail",
                        "message" => Images::$message[$img["error"]],
                        "table" => "image"
                    ];
                }
            }

            foreach ($imgs as $img) {
                $response = $this->store( $img, $this->getLastId() );
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
            return [
                "type" => "success",
                "message" => "Amazenadas com sucesso",
                "table" => "image"
            ];
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

    public function getLastId()
    {
        try {
            $sql = "SELECT * FROM Images ORDER BY id DESC LIMIT 1";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                [ "id" => $id ] = $results->fetch_array(MYSQLI_ASSOC);
                return $id;
            } else {
                return 0;
            }
        } catch (\Throwable $th) {
            return -1;
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
                return false;
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
                    pathinfo(basename($file["name"]), PATHINFO_EXTENSION)
                );
            $directory = PROJECT_DIRECTORY . "storage/img-$name.$imageFileType";

            if(!is_dir(PROJECT_DIRECTORY . "storage/")){                
                $oldmask = umask(0);
                mkdir(PROJECT_DIRECTORY . "storage/", 0777, true);
                umask($oldmask);
            }            
            
            if ( $file["error"] != 0) {                    
                return [
                    "type" => "fail",
                    "message" => Images::$message[$file["error"]],
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

            // Check if image file is a actual image or fake image    
            if ( getimagesize( $file["tmp_name"] ) === false ) {
                return [
                    "type" => "fail",
                    "message" => "Imagen inválido",
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
