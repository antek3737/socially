<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function addingGroup()
    {
        $this->render('addingGroup');
    }

    public function creatingGroup()
    {
        $this->render('creatingGroup');
    }

    public function calendar()
    {
        $this->render('calendar');
    }

    public function chosen()
    {
        $this->render('chosen');
    }

    public function creatingEvent()
    {
        $this->render('creatingEvent');
    }

//    public function groupDetails()
//    {
//        $this->render('groupDetails');
//    }

//    public function groups()
//    {
//        $this->render('groups');
//    }

    public function logging()
    {
        $this->render('logging',array('message'=>'hello'));
    }

    public function main()
    {
        $this->render('main');
    }

    public function personalSettings()
    {
        $this->render('personalSettings');
    }

    public function register()
    {
        $this->render('register');
    }

    public function index()
    {
        $this->render('index');
    }

}

