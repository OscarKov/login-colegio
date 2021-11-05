<?php

namespace Helpers\Auth;

require_once('database/Connector.php');

use Database\Connector;

class AuthHelper
{
    private $connector;

    public function __construct()
    {
        $this->connector = new Connector;
    }

    function findByEmail($email)
    {
        $sql = "SELECT name, email FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($this->connector->connection(), $sql)) {
            $stmt->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }
            return null;
        }
    }

    public function registerUser($userData)
    {
        $user = $this->findByEmail($userData['email']);
        if (!$user) {
            $registerSQL = 'INSERT INTO users(name, email, password) VALUES(?,?,?)';
            if ($stmt = mysqli_prepare($this->connector->connection(), $registerSQL)) {
                $password = password_hash($userData['password'], PASSWORD_DEFAULT);
                mysqli_stmt_bind_param(
                    $stmt,
                    'sss',
                    $userData['name'],
                    $userData['email'],
                    $password
                );
                mysqli_stmt_execute($stmt);
                $this->connector->closeConnection();
                return true;
            }
        }
        return false;
    }
}
