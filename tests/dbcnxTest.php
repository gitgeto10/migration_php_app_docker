<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $host = 'db'; // le nom du service docker
        $db   = 'testdb';
        $user = 'root';
        $pass = 'root';
        $dsn = "mysql:host=$host;dbname=$db";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $this->assertInstanceOf(PDO::class, $pdo);
        } catch (PDOException $e) {
            $this->fail("Échec de connexion DB: " . $e->getMessage());
        }
    }
}
