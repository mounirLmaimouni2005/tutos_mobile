<?php


require "./user.php";
require "./Auteur.php";

$users = [
    new User(),
    new Auteur()
];

foreach ($users as $user) {
    echo $user->getRoleName() . "<br>";
}
