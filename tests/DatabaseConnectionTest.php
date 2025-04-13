<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $host = 'db';
        $db = 'testdb';
        $user = 'root';
        $pass = 'root';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->assertTrue(true); // Connexion réussie
        } catch (PDOException $e) {
            $this->fail("Échec de connexion DB: " . $e->getMessage());
        }
    }
}
