<?php
    include_once "controllerLinks.php";

    if (isset($_POST['login']) && $_POST['login'] == "Let me in") {
        $user = new Signin($_POST['username'], $_POST['password']);
        $user->login();
    } else if  (isset($_POST['addStudent']) && $_POST['addStudent'] == "Save") {
        $student = new CreateUser($_POST['f'], $_POST['l'],$_POST['p'], $_POST['r'],$_POST['i']);
        $student->addStudent();
    } else if  (isset($_POST['addSupervisor']) && $_POST['addSupervisor'] == "Save") {

        $supervisor = new CreateUser($_POST['f'], $_POST['l'],$_POST['p'], $_POST['s'],$_POST['i']);
        $supervisor->addSupervisor();
    }else if  (isset($_POST['changePrivilage']) && $_POST['changePrivilage'] == "Save") {

        $privilage = new CreateUser($_POST['s'], $_POST['s'],$_POST['s'], $_POST['s'],$_POST['pre']);
        $privilage->modifyPrivilage();
    }

    else if  (isset($_POST['changePassword']) && $_POST['changePassword'] == "Save") {
        $changePs = new MyPassword($_POST['o'], $_POST['n'],$_POST['c']);
        $changePs->changePassword();
    } else if  (isset($_POST['addPost']) && $_POST['addPost'] == "Save") {
        $post = new CreatePost($_POST['p'], $_POST['a'],$_POST['desc'], $_POST['o'], $_POST['d'], $_POST['pi']);
        $post->addPost();
    } else if  (isset($_POST['addRequest']) && $_POST['addRequest'] == "Save") {

        $request = new CreateRequest($_POST['p'], $_POST['s'],$_POST['e'], $_POST['r']);
        $request->addRequest();
    } else if  (isset($_GET['deleteRequest']) && $_GET['deleteRequest'] == $_GET['deleteRequest']) {

        $request = new CreateRequest($_GET['deleteRequest'], $_GET['deleteRequest'],$_GET['deleteRequest'], $_GET['deleteRequest']);
        $request->deleteRequest();
    } else if  (isset($_POST['assignedSupervisor']) && $_POST['assignedSupervisor'] == 'Save') {

        $accepted = new CreateRequest($_POST['suid'], $_POST['suid'],$_POST['stid'], $_POST['rid']);
        $accepted->acceptedRequest();
    } else if  (isset($_GET['addReport']) && $_GET['addReport'] == $_GET['addReport']) {
        echo "this is the first to arraive here ";
        
        // $request = new CreateReport($_GET['deleteRequest'], $_GET['deleteRequest'],$_GET['deleteRequest'], $_GET['deleteRequest']);
        // $request->deleteRequest();
    }

     else {
        header("location:../");
    }
?>

<!-- addReport -->


