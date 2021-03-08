<?php

namespace App\Controllers;

use Faculdade\Moinhos\Render;
use Faculdade\Moinhos\Redirect;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use DateTime;

class SiteController{
    
    public function index($container){

        $render = new Render;

        $page = 'Home | Adota Pets';
        $keywords = "";
        $active = "home";

        $pets = $container['pets_model']->all(['adotado'=>0,'visible'=>1]); //PEGAR PETS NÃO ADOTADOS
        $adotados = $container['pets_model']->all(['adotado'=>1,'visible'=>1]); //PEGAR PETS ADOTADOS
        
        return $render('site/index', 'site', compact('page', 'active', 'keywords', 'container', 'adotados', 'pets'));
    }

    public function about($container){

        $render = new Render;

        $page = 'Sobre | Adota Pets';
        $keywords = "";
        $active = "about";
        
        return $render('site/about', 'site', compact('page', 'active', 'keywords', 'container'));
    }

    public function contato($container){

        $render = new Render;

        $page = 'Contato | Adota Pets';
        $keywords = "";
        $active = "contato";
        
        return $render('site/contato', 'site', compact('page', 'active', 'keywords', 'container'));
    }

    public function send_contato($container, $request){

        $redirect = new Redirect;

        $data = $request->request->all();

        // VALIDATE
        $validate = array();
        $validate['name'] = filter_input(INPUT_POST, 'name') ?? null;
        $validate['email'] = filter_input(INPUT_POST, 'email') ?? null;
        $validate['telefone'] = filter_input(INPUT_POST, 'telefone') ?? null;
        $validate['assunto'] = filter_input(INPUT_POST, 'assunto') ?? null;
        $validate['descricao'] = filter_input(INPUT_POST, 'descricao') ?? null;
        // MENSAGENS DE VALIDAÇÃO
        $message = array();
        if ( !((strlen($validate['name']) >= 3) && (strlen($validate['name']) <= 255)) ){$message['name'] = "Dado inválido!";}
        if ( !(filter_var($validate['email'], FILTER_VALIDATE_EMAIL)) ){$message['email'] = "Dado inválido!";}
        if ( !((strlen($validate['telefone']) >= 3) && (strlen($validate['telefone']) <= 255)) ){$message['telefone'] = "Dado inválido!";}
        if ( !((strlen($validate['assunto']) >= 3) && (strlen($validate['assunto']) <= 255)) ){$message['assunto'] = "Dado inválido!";}
        if ( !((strlen($validate['descricao']) >= 1)) && !((strlen($validate['descricao']) <= 60000)) ){$message['descricao'] = "Dado inválido!";}

        // SE HÁ ERROS
        if( !empty($message) ){
            $_SESSION['old'] = $validate;
            $_SESSION['feedback'] = $message;
            return $redirect('/contato');
        }

        // ENVIAR E-MAIL
        $host = 'contato@adotapets.com.br';
        $para = 'contato@adotapets.com.br';
        $password = 'mklxmklx13';

        try{

            $phone = $data['telefone'];
            $name = $data['name'];
            $assunto = $data['assunto'];
            $descricao = $data['descricao'];
            $de = $data['email'];

            if( empty($phone) || empty($name) || empty($assunto) || empty($descricao) || empty($de) ){
                $redirect = new Redirect;
                return $redirect('/error');
            }

            $message = "Usuário: " . $name . "\nE-mail: " . $de . "\nTelefone: " . $phone . "\nAssunto: " . $assunto . "\nDescrição: " . $descricao;
            
            $mail = new PHPMailer();
            $mail->IsSMTP(); 
            $mail->CharSet = 'UTF-8';
            $mail->True;
            $mail->Host = "smtp.kinghost.net"; // Servidor SMTP
            $mail->SMTPSecure = "tls"; // conexão segura com TLS
            $mail->Port = 587; 
            $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
            $mail->Username = $host; // SMTP username
            $mail->Password = $password; // SMTP password
            $mail->From = $para; // From
            $mail->FromName = "Contato - Adotapets" ; // Nome de quem envia o email
            $mail->AddAddress($para, "thiago"); // Email e nome de quem receberá //Responder
            $mail->WordWrap = 50; // Definir quebra de linha
            $mail->IsHTML = true ; // Enviar como HTML
            $mail->Subject = $assunto ; // Assunto
            $mail->Body = '<br/>' . $message . '<br/>' ; //Corpo da mensagem caso seja HTML
            $mail->AltBody = "$message" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

            $mail->Send();
            
        } catch (Exception $e) {

            return $redirect("/error");
        
        }

        $_SESSION['feedback_sucess'] = true;

        return $redirect('/contato');

    }

    public function error($container){

        $render = new Render;

        $page = 'Página não encontrada | Adota Pets';
        $keywords = "";
        $active = "home";
        
        return $render('site/error', 'site', compact('page', 'active', 'keywords', 'container'));
    }
    
    public function pet($container, $request){

        $render = new Render;

        $page = 'PET | Adota Pets';
        $keywords = "";
        $active = "pet";

        $id = $request->attributes->get(1); //PEGAR ID
        $pet = $container['pets_model']->get(['id'=>$id]); //PEGAR PET
        if(empty($pet)){$this->error($container);die();} //SE NÃO HOUVER A ONG
        $pets = $container['pets_model']->all(['id_ong'=>$pet['id_ong']]); //PEGAR PETS
        $galerias = $container['galerias_model']->all(['id_pet'=>$id]); //PEGAR GALERIA
        $ong = $container['ongs_model']->get(['id'=>$pet['id_ong']]); //PEGAR ONG 

        return $render('site/pet', 'site', compact('page', 'active', 'keywords', 'container', 'pet', 'galerias', 'ong', 'pets'));
    }

    public function search($container, $request){

        $render = new Render;
        $data = $request->request->all();
        $search = array();
        $search_place = array();

        $page = 'Pets pesquisados | Adota Pets';
        $keywords = "";
        $active = "pet";
        // SE HOUVER ESTADO FILTRADO
        if( $data['estado'] != '' ){
            // SE HOUVER CIDADE FILTRADA
            if( $data['cidade'] != '' ){
                $ongs = $container['ongs_model']->all(['estado'=>$data['estado'],'cidade'=>$data['cidade']]);
                foreach($ongs as $ong){$search_place[] = $ong['id'];}
            }else{
                $ongs = $container['ongs_model']->all(['estado'=>$data['estado']]);
                foreach($ongs as $ong){$search_place[] = $ong['id'];}
            }
        }
        // PEGAR DADOS DA PESQUISA
        foreach($data as $val => $search_item){
            if($search_item != ''){
                $search[$val] = $search_item;
            }
        }
        unset($search['estado']); //REMOVER ESTADO DO ARRAY 
        unset($search['cidade']); //REMOVER CIDADE DO ARRAY 
        // PEGAR PETS PESQUISADOS
        $pets = $container['pets_model']->all($search);
        $new_pets = [];
        foreach($pets as $pet){
            if(in_array($pet['id_ong'], $search_place)){
                $new_pets[] = $pet;
            }
        }
        if( !empty($new_pets) ){
            $pets = $new_pets;
        }

        $pesquisa = 'Você pesquisou por:';
        foreach($search as $item){
            $pesquisa .= ' <b>'.$item.'</b>;';
        }
        $pesquisa = substr($pesquisa, 0, -1);

        return $render('site/search', 'site', compact('page', 'active', 'keywords', 'container', 'pets', 'pesquisa'));

    }

    public function ongs($container){

        $render = new Render;

        $page = 'ONGs | Adota Pets';
        $keywords = "";
        $active = "ong";

        $ongs = $container['ongs_model']->all(['visible'=>1]); //PEGAR ONG 
        
        return $render('site/ongs', 'site', compact('page', 'active', 'keywords', 'container', 'ongs'));
    }

    public function ong($container, $request){

        $render = new Render;

        $page = 'ONG | Adota Pets';
        $keywords = "";
        $active = "ong";
        
        $id = $request->attributes->get(1); //PEGAR ID
        $ong = $container['ongs_model']->get(['slug'=>$id]); //PEGAR ONG
        if(empty($ong)){$this->error($container);die();} //SE NÃO HOUVER A ONG
        $pets = $container['pets_model']->all(['id_ong'=>$ong['id']]); //PEGAR ONG
        return $render('site/ong', 'site', compact('page', 'active', 'keywords', 'container', 'ong', 'pets'));
    }
    
    public function register($container){

        $render = new Render;

        $page = 'Cadastro de ONG | Adota Pets';
        $keywords = "";
        $active = "register";
        
        return $render('site/register', 'site', compact('page', 'active', 'keywords', 'container'));
    }

    public function entrar($container){

        $render = new Render;

        $page = 'Login | Adota Pets';
        $keywords = "";
        $active = "login";
        
        return $render('site/login', 'site', compact('page', 'active', 'keywords', 'container'));
    }

}