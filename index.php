<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path,PHP_URL_PATH);


// url nazwa strony, ktora ma sie zaladowac po wpisaniu w pasek
Router::get('', 'DefaultController');
Router::get('addingGroup', 'DefaultController');
Router::get('creatingGroup', 'DefaultController');
//Router::get('calendar', 'DefaultController');
//Router::get('chosen', 'DefaultController');
Router::get('creatingEvent', 'DefaultController');
//Router::get('groups', 'DefaultController');
Router::get('groups', 'GroupController');
//Router::get('main', 'DefaultController');
Router::get('main', 'EventController');
Router::get('chosen', 'EventController');
Router::get('calendar', 'EventController');
Router::get('addEvent', 'EventController');

//Router::get('groupDetails', 'DefaultController');
Router::get('personalSettings', 'DefaultController');
Router::get('logging', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('join', 'GroupController');
Router::get('logOut','SecurityController');
Router::get('groupDetails', 'LocalUserController');

//Metody, które po przesłaniu formularza sprawdzaja, czy wszystko git i jesli tak to przekierowuja do nastepnego widoku zmieniajac swoj header, a jak nie to rendereuja te strone na nowo z komunikatem
Router::post('logIntoAccount', 'SecurityController');
Router::post('createNewAccount', 'SecurityController');
Router::post('createNewGroup','GroupController');
Router::post('addNewGroup','GroupController');
Router::post('setPersonalAccount','SecurityController');
Router::post('createEvent','EventController');
Router::post('search','GroupController');
Router::post('setGroupCookie','GroupController');
Router::post('updateLocalUserAccount','LocalUserController');



Router::run($path);




?>
