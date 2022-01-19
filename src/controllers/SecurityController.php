<?php

require_once 'AppController.php';
require_once __DIR__ . "/../models/GlobUser.php";
require_once __DIR__ . "/../models/Group.php";
require_once __DIR__ . '/../repository/GlobUserRepository.php';

class SecurityController extends AppController
{

    //TODO: zrobic w js czy hasla sa takie same

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $GlobUserRepository;
    private $message = null;

    public function __construct()
    {
        parent::__construct();
        $this->GlobUserRepository = new GlobUserRepository();
    }


    public function logIntoAccount()
    {
        $this->message = null;

        $this->isPosted('logging');

        $globEmail = $_POST["globEmail"];
        $globPassword = $_POST["globPassword"];

        try {
            $globUser = $this->GlobUserRepository->getGlobUser($globEmail);
        } catch (InvalidArgumentException $exception) {
            return $this->render("logging", ["message" => $exception->getMessage()]);
        }

        $this->validatePassword($globPassword, $globUser->getGlobPassword(), $globUser->getGlobSalt(), 'logging');


        if ($this->message == null) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/groups");
        }


    }

    private function isPosted(string $template)
    {

        if (!$this->isPost()) {
            $this->render($template, ["message" => $this->message]);
            die();
        }

    }


    public function validatePassword($givenGlobPassword, $trueGlobPassword, $salt, $template)
    {
        $givenGlobPassword = hash("sha512", $givenGlobPassword . $salt);

        if ($trueGlobPassword !== $givenGlobPassword) {
            $this->message = "Wrong password!";
            $this->render($template, ["message" => $this->message]);
            die();
        }

    }

    public function createNewAccount()
    {

        $this->message = null;

        $this->isPosted('register');

        $globPhoto = $this->uploadPhoto('globPhoto', 'register');

        $globName = $_POST["globName"];
        $globPhoneNumber = $_POST["globPhoneNumber"];
        $globEmail = $_POST["globEmail"];
        $globPassword = $_POST["globPassword"];

        $globSalt = hash("sha512", rand(0, 100));
        $globPassword = hash("sha512", $globPassword . $globSalt);

        $globUserToCreate = new GlobUser($globName, $globPhoneNumber, $globEmail, $globPassword, $globSalt, $globPhoto);

        $message = $this->validateUniquenessOfNameEmailAndPhoneNumber($globUserToCreate, 'register');


        $this->GlobUserRepository->createGlobUser($globUserToCreate);

        if ($this->message == null) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/logging");
        }

    }

    private function validateUniquenessOfNameEmailAndPhoneNumber(GlobUser $globUserToAdd, string $template)
    {

        if ($this->GlobUserRepository->isGlobNameTaken($globUserToAdd->getGlobName())) {
            $this->message = "User with this name exists!";
            $this->render($template, ["message" => $this->message]);
            die();
        }

        if ($this->GlobUserRepository->isGlobEmailTaken($globUserToAdd->getGlobEmail())) {
            $this->message = "User with this email exists!";
            $this->render($template, ["message" => $this->message]);
            die();
        }

        if ($this->GlobUserRepository->isGlobPhoneNumberTaken($globUserToAdd->getGlobPhoneNumber())) {
            $this->message = "User with this phone number exists!";
            $this->render($template, ["message" => $this->message]);
            die();
        }

    }


    private function validatePhoto(array $file, string $template)
    {

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message = 'File is too large for destination file system.';
            $this->render($template, ["message" => $this->message]);
            die();
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message = 'File type is not supported.';
            $this->render($template, ["message" => $this->message]);
            die();
        }
    }


    private function isUploadedPhoto(string $inputName, string $template)
    {

        if (!is_uploaded_file($_FILES[$inputName]['tmp_name'])) {

            $this->message = 'File was not uploaded!';
            $this->render($template, ["message" => $this->message]);
            die();
        }

    }


    private function uploadPhoto(string $inputName, string $template)
    {
        $this->isUploadedPhoto($inputName, $template);
        $this->validatePhoto($_FILES[$inputName], $template);

        move_uploaded_file(
            $_FILES['globPhoto']['tmp_name'],
            dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['globPhoto']['name']
        );

        return $_FILES['globPhoto']['name'];

    }

    public function logOut()
    {
        http_response_code(200);

        if (isset($_COOKIE['globUser'])) {
            setcookie("globUser", "", time() - 3600);
        }

        if (isset($_COOKIE['group'])) {
            setcookie("group", "", time() - 3600);
        }
        if (isset($_COOKIE['IDGlobUserLocalUser'])) {
            setcookie("IDGlobUserLocalUser", "", time() - 3600);
        }

    }
}

?>