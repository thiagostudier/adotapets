<?php

namespace App\Controllers;

use Faculdade\Moinhos\Render;
use Faculdade\Moinhos\Redirect;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use DateTime;

class OngController{

    protected function getModel(): string
    {
        return 'ongs_model';
    }

    public function store($container, $request){

        $redirect = new Redirect;
        $data = $request->request->all();

        // VALIDATE
        $validate = array();
        $validate['name'] = filter_input(INPUT_POST, 'name') ?? null;
        $validate['cep'] = filter_input(INPUT_POST, 'cep') ?? null;
        $validate['rua'] = filter_input(INPUT_POST, 'rua') ?? null;
        $validate['bairro'] = filter_input(INPUT_POST, 'bairro') ?? null;
        $validate['cidade'] = filter_input(INPUT_POST, 'cidade') ?? null;
        $validate['estado'] = filter_input(INPUT_POST, 'estado') ?? null;
        $validate['numero'] = filter_input(INPUT_POST, 'numero') ?? null;
        $validate['mail'] = filter_input(INPUT_POST, 'mail') ?? null;
        $validate['site'] = filter_input(INPUT_POST, 'site') ?? null;
        $validate['telefone'] = filter_input(INPUT_POST, 'telefone') ?? null;
        $validate['celular'] = filter_input(INPUT_POST, 'celular') ?? null;
        $validate['facebook'] = filter_input(INPUT_POST, 'facebook') ?? null;
        $validate['twitter'] = filter_input(INPUT_POST, 'twitter') ?? null;
        $validate['instagram'] = filter_input(INPUT_POST, 'instagram') ?? null;
        $validate['visible'] = filter_input(INPUT_POST, 'visible') ?? null;
        $validate['slug'] = filter_input(INPUT_POST, 'slug') ?? null;
        // MENSAGENS DE VALIDAÇÃO
        $message = array();
        if ( !((strlen($validate['name']) >= 3) && (strlen($validate['name']) <= 255)) ){$message['name'] = "Dado inválido!";}
        if ( !((strlen($validate['cep']) >= 3) && (strlen($validate['cep']) <= 255)) ){$message['cep'] = "Dado inválido!";}
        if ( !((strlen($validate['bairro']) >= 3) && (strlen($validate['bairro']) <= 255)) ){$message['bairro'] = "Dado inválido!";}
        if ( !((strlen($validate['cidade']) >= 3) && (strlen($validate['cidade']) <= 255)) ){$message['cidade'] = "Dado inválido!";}
        if ( !((strlen($validate['estado']) == 2)) ){$message['estado'] = "Dado inválido!";}
        if ( !(filter_var($validate['numero'], FILTER_VALIDATE_INT)) ){$message['numero'] = "Dado inválido!";}
        if ( !(filter_var($validate['mail'], FILTER_VALIDATE_EMAIL)) ){$message['mail'] = "Dado inválido!";}
        if ( !(strlen($validate['site']) <= 255) ){$message['site'] = "Dado inválido!";}
        if ( !(strlen($validate['telefone']) <= 255) ){$message['telefone'] = "Dado inválido!";}
        if ( !(strlen($validate['celular']) <= 255) ){$message['celular'] = "Dado inválido!";}
        if ( !(strlen($validate['facebook']) <= 255) ){$message['facebook'] = "Dado inválido!";}
        if ( !(strlen($validate['twitter']) <= 255) ){$message['twitter'] = "Dado inválido!";}
        if ( !(strlen($validate['instagram']) <= 255) ){$message['instagram'] = "Dado inválido!";}
        if ( !(($validate['visible'] == 0) || ($validate['visible'] == 1)) ){$message['visible'] = "Dado inválido!";}
        if ( !((strlen($validate['slug']) >= 3) && (strlen($validate['slug']) <= 255)) ){$message['slug'] = "Dado inválido!";}
        if (!preg_match('/^[ \w]+$/',$validate['slug'])) {$message['slug'] = "Dado inválido!";}
        if ( !empty($container['ongs_model']->all(['slug'=>$validate['slug']])) ){
            $message['slug'] = "Já há uma ONG cadastrada com esse link.";
        }
        // SE HÁ ERROS
        if( !empty($message) ){
            $_SESSION['old'] = $validate;
            $_SESSION['feedback'] = $message;
            return $redirect('/user/ongs');
        }
        // USER
        $user = $_SESSION['auth'];
        // ONG
        $ong = $container[$this->getModel()]->create($data);
        // USER X ONG
        $ong_user = $container['ongs_users_model']->create([
            'id_user' => $user['id'],
            'id_ong' => $ong['id'],
            'type' => 'admin'
        ]);

        return $redirect('/user/ongs');

    }

    public function edit($container, $request){

        $render = new Render;

        $id = $request->attributes->get(1); //PEGAR ID
        $ong = $container[$this->getModel()]->get(['id'=>$id]); //PEGAR ONG 
        
        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container[$this->getModel()]->verifyUser($container, $id)) ){
            return $render('site/error', 'site', compact('container'));
        }

        $page = 'Editar ONG | Mundo Pet';
        $keywords = "";
        $active = "user";    
        
        return $render('site/user/ong', 'site', compact('page', 'active', 'keywords', 'container', 'ong'));

    }

    public function update($container, $request){

        $redirect = new Redirect;
        $id = $request->attributes->get(1);
        $data = $request->request->all();
        // VALIDATE
        $validate = array();
        $validate['name'] = filter_input(INPUT_POST, 'name') ?? null;
        $validate['cep'] = filter_input(INPUT_POST, 'cep') ?? null;
        $validate['rua'] = filter_input(INPUT_POST, 'rua') ?? null;
        $validate['bairro'] = filter_input(INPUT_POST, 'bairro') ?? null;
        $validate['cidade'] = filter_input(INPUT_POST, 'cidade') ?? null;
        $validate['estado'] = filter_input(INPUT_POST, 'estado') ?? null;
        $validate['numero'] = filter_input(INPUT_POST, 'numero') ?? null;
        $validate['mail'] = filter_input(INPUT_POST, 'mail') ?? null;
        $validate['site'] = filter_input(INPUT_POST, 'site') ?? null;
        $validate['telefone'] = filter_input(INPUT_POST, 'telefone') ?? null;
        $validate['celular'] = filter_input(INPUT_POST, 'celular') ?? null;
        $validate['facebook'] = filter_input(INPUT_POST, 'facebook') ?? null;
        $validate['twitter'] = filter_input(INPUT_POST, 'twitter') ?? null;
        $validate['instagram'] = filter_input(INPUT_POST, 'instagram') ?? null;
        $validate['visible'] = filter_input(INPUT_POST, 'visible') ?? null;
        $validate['slug'] = filter_input(INPUT_POST, 'slug') ?? null;
      
        // MENSAGENS DE VALIDAÇÃO
        $message = array();
        if ( !((strlen($validate['name']) >= 3) && (strlen($validate['name']) <= 255)) ){$message['name'] = "Dado inválido!";}
        if ( !((strlen($validate['cep']) >= 3) && (strlen($validate['cep']) <= 255)) ){$message['cep'] = "Dado inválido!";}
        if ( !((strlen($validate['bairro']) >= 3) && (strlen($validate['bairro']) <= 255)) ){$message['bairro'] = "Dado inválido!";}
        if ( !((strlen($validate['cidade']) >= 3) && (strlen($validate['cidade']) <= 255)) ){$message['cidade'] = "Dado inválido!";}
        if ( !((strlen($validate['estado']) == 2)) ){$message['estado'] = "Dado inválido!";}
        if ( !(filter_var($validate['numero'], FILTER_VALIDATE_INT)) ){$message['numero'] = "Dado inválido!";}
        if ( !(filter_var($validate['mail'], FILTER_VALIDATE_EMAIL)) ){$message['mail'] = "Dado inválido!";}
        if ( !(strlen($validate['site']) <= 255) ){$message['site'] = "Dado inválido!";}
        if ( !(strlen($validate['telefone']) <= 255) ){$message['telefone'] = "Dado inválido!";}
        if ( !(strlen($validate['celular']) <= 255) ){$message['celular'] = "Dado inválido!";}
        if ( !(strlen($validate['facebook']) <= 255) ){$message['facebook'] = "Dado inválido!";}
        if ( !(strlen($validate['twitter']) <= 255) ){$message['twitter'] = "Dado inválido!";}
        if ( !(strlen($validate['instagram']) <= 255) ){$message['instagram'] = "Dado inválido!";}
        if ( !(($validate['visible'] == 0) || ($validate['visible'] == 1)) ){$message['visible'] = "Dado inválido!";}
        if ( !((strlen($validate['slug']) >= 3) && (strlen($validate['slug']) <= 255))){$message['slug'] = "Dado inválido!";}
        if (!preg_match('/^[ \w]+$/',$validate['slug'])) {$message['slug'] = "Dado inválido!";}
        if ( !empty($container['ongs_model']->get(['slug'=>$validate['slug']])) ){
            if( $container['ongs_model']->get(['slug'=>$validate['slug']])['id'] != $id ){
                $message['slug'] = "Já há uma ONG cadastrada com esse link.";
            }
        }

        // SE HÁ ERROS
        if( !empty($message) ){
            $_SESSION['old'] = $validate;
            $_SESSION['feedback'] = $message;
            return $redirect('/user/ong/'.$id.'/edit');
        }
        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container[$this->getModel()]->verifyUser($container, $id)) ){
            return $render('site/error', 'site', compact('container'));
        }
        
        $ong = $container[$this->getModel()]->update(['id'=>$id], $data);

        return $redirect('/user/ongs');

    }

    public function delete($container, $request){

        $redirect = new Redirect;
        $user = $_SESSION['auth']; //PEGAR USUÁRIO LOGADO
        $id = $request->attributes->get(1); //PEGAR ID DA ONG
        $ong_user = $container['ongs_users_model']->get(['id_user'=>$user['id'], 'id_ong'=>$id]); //PEGAR RELACIONAMENTO ENTRE A ONG
        $ong_user = $container['ongs_users_model']->delete(['id'=>$ong_user['id']]); //APAGAR RELACIONAMENTO ENTRE A ONG
        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container[$this->getModel()]->verifyUser($container, $id)) ){
            return $render('site/error', 'site', compact('container'));
        }
        $ong = $container[$this->getModel()]->delete(['id'=>$id]); //APAGAR ONG

        return $redirect('/user/ongs');

    }

    public function image($container, $request){

        $redirect = new Redirect;

        $id = $request->attributes->get(1); //PEGAR ID

        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container[$this->getModel()]->verifyUser($container, $id)) ){
            return $render('site/error', 'site', compact('container'));
        }
        
        $this->uploadPhotoFunction($_FILES['photo'], $container, $id, 'photo');
        
        return $redirect('/user/ongs');

    }

    public function uploadPhotoFunction($file, $container, $id, $table){
        
        if( $file['name'] && preg_match("/\.(png|jpg)$/", $file['name']) && $file['size'] < 5485760 ) {

            $file['name'] = uniqid(date('HisYmd')) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

            $diretorio = __DIR__ . "/../../public/upload/ong/";

            $uploadfile = $diretorio . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $file = $file['name'];
            }

            $container[$this->getModel()]->update(['id'=>$id], ["$table" => $file]);

        }

    }

}