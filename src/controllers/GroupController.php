<?php

require_once 'AppController.php';
require_once __DIR__ . "/../models/Group.php";
require_once __DIR__ . '/../repository/GlobUserRepository.php';
require_once __DIR__ . '/../repository/GroupRepository.php';

class GroupController extends AppController
{

    private $GroupRepository;
    private $message = null;

    public function __construct()
    {
        parent::__construct();
        $this->GroupRepository = new GroupRepository();
    }

    public function groups()
    {
        $groups = $this->GroupRepository->getGlobUserGroups();
        $this->render('groups', ['groups' => $groups]);
    }

    public function createNewGroup()
    {
        $this->message = null;

        $this->isPosted('creatingGroup');

        $groupName = $_POST["groupName"];
        $groupPassword = $_POST["groupPassword"];

        $groupSalt = hash("sha512", rand(0, 100));
        $groupPassword = hash("sha512", $groupPassword . $groupSalt);


        $groupToCreate = new Group($groupName, $groupPassword, $groupSalt);

        $this->validateUniquenessOfGroupName($groupToCreate->getGroupName(), 'creatingGroup');

        $this->GroupRepository->createGroup($groupToCreate);


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


    public function validatePassword($givenGroupPassword, $trueGroupPassword, $salt, $template)
    {
        $givenGroupPassword = hash("sha512", $givenGroupPassword . $salt);

        if ($trueGroupPassword !== $givenGroupPassword) {
            $this->message = "Wrong password!";
            $this->render($template, ["message" => $this->message]);
            die();
        }

    }

    public function validateUniquenessOfGroupName(string $groupName, string $template)
    {
        if ($this->GroupRepository->isGroupNameTaken($groupName)) {
            $this->message = "Group with this name exists!";
            $this->render($template, ["message" => $this->message]);
            die();
        }
    }


    public function addNewGroup()
    {
        $this->message = null;

        $this->isPosted('addingGroup');

        $groupName = $_POST['groupName'];
        $groupPassword = $_POST['groupPassword'];


        try {
            $group = $this->GroupRepository->getGroup($groupName);
            $globUserWithIDArray = json_decode($_COOKIE['globUser'], true);
            $IDglobUserlocalUser = $this->GroupRepository->generateLocalUserAccount($globUserWithIDArray['IDglobUser']);
            $IDglobUserlocalUsergroup = $this->GroupRepository->connectLocalUserWithGroup($IDglobUserlocalUser, $group->getIDgroup());

        } catch (InvalidArgumentException $exception) {
            return $this->render("addingGroup", ["message" => $exception->getMessage()]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/groups");


    }


    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);


            echo json_encode($this->GroupRepository->getGlobUserGroupsByGroupName($decoded['search']));
        }
    }

    public function setGroupCookie(){

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            http_response_code(200);


                $groupName = $decoded['groupName'];
                $givenGroup = $this->GroupRepository->getGroup($groupName);
                if($givenGroup == null) die;
                $cookie_name = "group";
                $value['groupID']=$givenGroup->getIDgroup();
                $value['groupName']=$givenGroup->getGroupName();
                $cookie_value =json_encode($value);
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }

        echo "done";

    }
    public function join(int $groupID){

        http_response_code(200);
        $givenGroup =  $this->GroupRepository->getGroupByGroupID($groupID);
        $cookie_name = "group";

        $groupValue['groupName']=$givenGroup->getGroupName();
        $groupValue['groupID']=$givenGroup->getIDgroup();
        $cookie_value = json_encode($groupValue);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }


}

?>