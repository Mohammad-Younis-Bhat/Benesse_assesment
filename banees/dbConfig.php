<?php
class dbConnect{
    private static $conn;

    public static function getConnection($servername, $username, $password, $database) {
      
        if (self::$conn === null) {
            self::$conn = new mysqli($servername, $username, $password, $database);
            if (self::$conn->connect_error) {
                die("Connection failed: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }

    public static function closeConnection() {
        if (self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
?>