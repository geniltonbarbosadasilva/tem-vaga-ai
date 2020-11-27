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
            $result = $this->getConnection()->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Senha</th><th>.</th></tr>";
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo
                        "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["password"] . "</td>
                            <td>
                                <a href='../app/controller.php?id=".$row["id"]."&operation=delete&table=users'> 
                                    deletar
                                </a> 
                            </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                return "0 results";
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Users WHERE id=$id";

        if ($this->getConnection()->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->getConnection()->error;
        }
    }

    public function all()
    {
    }

    public function query(string $sql)
    {
        // $sql = "SELECT * FROM Users";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
            }
        } else {
            return "0 results";
        }
        $this->connection->close();
    }
}
