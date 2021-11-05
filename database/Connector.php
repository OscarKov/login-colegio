<?php

namespace Database;

class Connector
{
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = mysqli_connect(
                'localhost',
                'root',
                '',
                'colegiodb'
            );
        } catch (\Throwable $th) {
            die($th);
        }
    }

    public function connection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        mysqli_close($this->connection);
    }
}
