<?php

require_once 'AppController.php';
require_once __DIR__ . "/../models/GlobUser.php";
require_once __DIR__ . "/../models/Group.php";
require_once __DIR__ . '/../repository/GlobUserRepository.php';
require_once __DIR__ . '/../repository/LocalUserRepository.php';

class LocalUserController extends AppController
{


    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    const DEFAULT_DESCRIPTION = 'Write something here';

    private $GlobUserRepository;
    private $LocalUserRepository;
    private $message = null;

    public function __construct()
    {
        parent::__construct();
        $this->GlobUserRepository = new GlobUserRepository();
        $this->LocalUserRepository = new LocalUserRepository();
    }


    private function isPosted(string $template)
    {

        if (!$this->isPost()) {
            $this->render($template, ["message" => $this->message]);
            die();
        }

    }

    public function createLocalUserAccount()
    {
        try {
            $localUser = $this->LocalUserRepository->getLocalUser();
        } catch (Exception $exception) {
            $this->LocalUserRepository->createLocalUser();
        }


    }


    public function updateLocalUserAccount()
    {

        $this->message = null;

        $this->isPosted('personalSettings');

        $this->createLocalUserAccount();

        $localDescription = $_POST["localDescription"];

        if ($localDescription !== null && $localDescription !== self::DEFAULT_DESCRIPTION) {
            $this->LocalUserRepository->updateLocalUserDescription($localDescription);
        }

        $localName = $_POST["localName"];

        if ($localName !== null && $localName !== '') {
            $this->LocalUserRepository->updateLocalUserName($localName);
        }


        $localPhoto = $this->uploadPhoto('localPhoto', 'personalSettings');
        if ($localPhoto !== null && $localPhoto !== '') {
            $this->LocalUserRepository->updateLocalUserPhoto($localPhoto);
        }

        $IDcookie = json_decode($_COOKIE['IDGlobUserLocalUser'], true);
        $ID = $IDcookie['IDGlobUserLocalUser'];

        $this->LocalUserRepository->refreshLocalUserCookie($ID);

        if ($this->message == null) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/main");
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
            return false;
        }

        return true;
    }


    private function uploadPhoto(string $inputName, string $template)
    {
        if ($this->isUploadedPhoto($inputName, $template)) {
            $this->validatePhoto($_FILES[$inputName], $template);
            move_uploaded_file(
                $_FILES[$inputName]['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES[$inputName]['name']
            );

            return $_FILES[$inputName]['name'];

        };

        return null;
    }
}

?>