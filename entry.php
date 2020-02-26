<?php
require './vendor/autoload.php';

$c = new \App\Controller\UserController;
$result = [];

if(isset($_GET['action'])) {

    if($_GET['action'] === 'user-add') {
        if(!empty($_POST['username']) && !empty($_POST['role'])) {
            $user = new \App\Model\User(
                0,
                $_POST['username'],
                (int) $_POST['role']
            );
            $c->addUser($user);

            $result = ['request' => true];
        }
    }

    if($_GET['action'] === 'user-list') {

        $_users = $c->getUsers();
        $_roles = $c->getRoles();

        $users = [];
        foreach ($_users as $user) {
            $newUser = [
                'id' => $user['id'],
                'username' => $user['username']
            ];

            foreach ($_roles as $role) {
                if($role['id'] === $user['role_id']) {
                    $newUser['role'] = $role['rolename'];
                }
            }

            $users[] = $newUser;
        }

        $result = $users;
    }
}

echo json_encode($result);