<?php
    declare(strict_types=1);
    require 'include/config.php';

    if (in_array('', $_POST)) {
        echo 'Il manque des éléments dans le formulaire';
        header('Location:sign-in.php?error=missingInput');
        exit();
    } else {
        $username = trim(htmlspecialchars($_POST['username'])); 
        $password = trim(htmlspecialchars($_POST['password']));
        // verif taper formulaire
    }

    if(strlen($username) < 3){
        echo "Le nom d'utilisateur est invalide";
        exit();
    }

    try{
        $sqlSearchUser = 'SELECT * FROM user WHERE username = :username';
        $reqSearchUser = $db->prepare($sqlSearchUser);
        $reqSearchUser->bindValue(':username', $username, PDO::PARAM_STR);
        $reqSearchUser->execute();
        // voir si marche avec les info taper

        $user = $reqSearchUser->fetch(); #Récupère un seul élément
    } catch(PDOException $e) {
        echo 'Erreur :'.$e->getMessage();
        exit();
    }

    if($user){
        if(!password_verify($password, $user['password'])){
            echo 'Le nom d\'utilisateur et le mot de passe ne correspondent pas';
            header('Location:sign-in.php?error=notMatching');
            exit();
        }else{
            $_SESSION['user'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['token'] = md5(uniqid('csrf', true));
            header('Location:index.php');
            exit();
            // lancer la session utilisateur
        }
    }