<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $dbname = 'testdb';
        $user = 'root';
        $pass = 'root';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->assertInstanceOf(PDO::class, $pdo);
        } catch (PDOException $e) {
            $this->fail("Échec de connexion DB: " . $e->getMessage());
        }
    }
}
