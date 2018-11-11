<?php
class PDO_connect{
	protected $pdo;
	public static function connect(){
	$host = 'localhost';
	$database = 'ChatTwo';
	$user = 'root';
	$pass = '';
	$dsn = "mysql:host=$host;dbname=$database;";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	return $pdo;
	}
}
?>