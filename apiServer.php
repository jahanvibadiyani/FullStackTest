<?
// Auloloading all the required classes
	function __autoload($class_name) {
      require_once $class_name . '.php';
  }

//************* API code to receive data from client starts here*************//

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$userData = json_decode(file_get_contents('php://input'),true);

//**************API code ends here********************************//

//initialising object for user model class to pass the user data
$st = new iStorageImple;
$st->save($userData);
?>