<?php
require './vendor/autoload.php';

$c = new \App\Controller\UserController;
$result = [];

if(isset($_GET['action'])) {

    if($_GET['action'] === 'user-add') {
        if(!empty($_POST['username']) && !empty($_POST['role'])) {
            $c->addUser(
                $_POST['username'],
                (int) $_POST['role']
            );

            $result = ['request' => true];
        }
    }

    if($_GET['action'] === 'user-list') {
        $users = [];
        /** @var \App\Model\User $user */
        foreach ($c->getUsers() as $user) {
            $users[] = [
                'id' => $user->getId(),
                'role' => $user->getRole()->getRoleName(),
                'username' => $user->getUsername()
            ];
        }

        $result = $users;
    }
}

echo json_encode($result);