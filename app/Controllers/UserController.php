<?php

namespace App\Controllers;

use Faculdade\Moinhos\Render;
use Faculdade\Moinhos\Redirect;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use DateTime;

class UserController{

    protected function getModel(): string
    {
        return 'users_model';
    }

    public function login($container, $request){

        $redirect = new Redirect;

        $data = $request->request->all();
        
        if($container['users_model']->login($container, $data['mail'], $data['password'])){
            return $redirect('/user/ongs');
        }else{
            $_SESSION['login_feedback'] = 'Usuário ou senha incorretos';
            return $redirect('/entrar');
        }

    }

    public function logout(){
        unset($_SESSION['auth']);
        header('location: /');
        die();
    }

    public function store($container, $request){

        $redirect = new Redirect;
        
        $data = $request->request->all();

        // VALIDATE
        $validate = array();
        $validate['name'] = filter_input(INPUT_POST, 'name') ?? null;
        $validate['mail'] = filter_input(INPUT_POST, 'mail') ?? null;
        $validate['password'] = filter_input(INPUT_POST, 'password') ?? null;
        $validate['confirm_password'] = filter_input(INPUT_POST, 'confirm_password') ?? null;
        // MENSAGENS DE VALIDAÇÃO
        $message = array();
        if ( !((strlen($validate['name']) >= 3) && (strlen($validate['name']) <= 255)) ){$message['name'] = "Dado inválido!";}
        if ( !(filter_var($validate['mail'], FILTER_VALIDATE_EMAIL)) ){$message['mail'] = "Dado inválido!";}
        if ( !((strlen($validate['password']) >= 6) && (strlen($validate['password']) <= 255)) ){$message['password'] = "Senha deve conter no mínimo 6 caracteres!";}
        if ( $validate['password'] != $validate['confirm_password'] ){$message['confirm_password'] = "Confirmação de senha inválida";}
        if ( !empty($container['users_model']->all(['mail'=>$validate['mail']])) ){$message['mail'] = "E-mail existente!";}
        

        // SE HÁ ERROS
        if( !empty($message) ){
            $_SESSION['old'] = $validate;
            $_SESSION['feedback'] = $message;
            return $redirect('/entrar');
        }

        $user = $container[$this->getModel()]->create([
            'name' => $validate['name'],
            'mail' => $validate['mail'],
            'password' => $validate['password']
        ]);

        if($container['users_model']->login($container, $data['mail'], $data['password'])){
            return $redirect('/user/ongs');
        }

        return $redirect('/');

    }

    public function ongs($container){

        $render = new Render;

        $user = $_SESSION['auth'];

        $ongs_user = $container['ongs_users_model']->all(['id_user'=>$user['id']]);

        $ongs = array();

        foreach($ongs_user as $ong_user){
            $ongs[] = $container['ongs_users_model']->getOng($container, $ong_user['id_ong']);
        }

        $page = 'Minhas ongs | Mundo Pet';
        $keywords = "";
        $active = "user";
        
        return $render('site/user/ongs', 'site', compact('page', 'active', 'keywords', 'container', 'ongs'));
    }

}