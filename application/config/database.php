<?php defined('BASEPATH') or exit('No direct script access allowed');

$query_builder = true;
$parts = explode('.', $_SERVER['HTTP_HOST']);
$subdomain = array_shift($parts);
//$subdomain = join('.', explode('.', $_SERVER['HTTP_HOST'], -1));

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => getenv("DB_HOSTNAME"),
	'username' => getenv("DB_USERNAME"),
	'password' => getenv("DB_PASSWORD"),
	'database' => $subdomain."_db",
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE,
    'multi_branch' => false,
);

$active_group = 'default';

$mydb   = $db['default'];
$mysqli = new mysqli($mydb['hostname'], $mydb["username"], $mydb["password"], $mydb["database"]);

if ($mysqli->connect_errno) {
    printf("connection failed: %s\n", $mysqli->connect_error());
    exit();
}

if ($results = $mysqli->query("SHOW TABLES LIKE 'multi_branch'")) {
    if ($results->num_rows == 1) {

        if ($result = $mysqli->query("SELECT * FROM multi_branch where is_verified =1")) {
            while ($row = $result->fetch_assoc()) {
                $short_name                      = "branch_" . $row['id'];
                $db[$short_name]['hostname']     = $row['hostname'];
                $db[$short_name]['username']     = $row['username'];
                $db[$short_name]['password']     = $row['password'];
                $db[$short_name]['database']     = $row['database_name'];
                $db[$short_name]['dbdriver']     = 'mysqli';
                $db[$short_name]['dbprefix']     = '';
                $db[$short_name]['pconnect']     = false;
                $db[$short_name]['db_debug']     = false;
                $db[$short_name]['cache_on']     = false;
                $db[$short_name]['cachedir']     = '';
                $db[$short_name]['char_set']     = 'utf8';
                $db[$short_name]['dbcollat']     = 'utf8_general_ci';
                $db[$short_name]['swap_pre']     = '';
                $db[$short_name]['autoinit']     = false;
                $db[$short_name]['stricton']     = false;
                $db[$short_name]['multi_branch'] = true;

            }
        }
    }
}

$mysqli->close();