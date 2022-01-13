<?php include "Includes/bbddConex.php" ?>

<?php

    $sql = 'DROP DATABASE IF EXISTS `cinetics`;';
    $db->query($sql);

    $sql = 'CREATE DATABASE IF NOT EXISTS `cinetics` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;';
    $db->query($sql);

    $sql = 'USE `cinetics`;';
    $db->query($sql);

    $sql = 'CREATE TABLE `users` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `mail` VARCHAR(40) UNIQUE NOT NULL,
        `username` VARCHAR(16) UNIQUE NOT NULL,
        `passHash` VARCHAR(60) NOT NULL,
        `userFirstName` VARCHAR(60),
        `userLastName` VARCHAR(120),
        `creationDate` DATETIME NOT NULL,
        `removeDate` DATETIME,
        `lastSignIn` DATETIME,
        `active` TINYINT(1) NOT NULL,
        PRIMARY KEY (`id`)
    );';
    $db->query($sql);

?>