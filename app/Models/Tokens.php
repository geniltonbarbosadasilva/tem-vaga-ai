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
            [
                "id_user" => $id_user,
                "code_hash" => $code_hash
            ] = $token;

            $sql = "INSERT INTO Tokens ( id_user, code_hash)
                    VALUES ( '$id_user', '$code_hash')";
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
                "id_user" => $id_user,
                "code_hash" => $code_hash
            ] = $record;

            $sql = "UPDATE Tokens SET id_user='$id_user', code_hash='$code_hash' WHERE id=$id";

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
                return $results->fetch_array(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage()
            ];
        }
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM Tokens";
            $results = $this->getConnection()->query($sql);

            if ($results->num_rows > 0) {
                return $results->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } catch (\Throwable $th) {
            return [
                "type" => "fail",
                "message" => "Exceção capturada: " . $th->getMessage()
            ];
        }
    }

    public function deleteAll()
    {
        $tokens = $this->all();
        foreach ($tokens as $token) {
            $this->delete($token["id"]);
        }
    }
}
