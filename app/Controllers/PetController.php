<?php

namespace App\Controllers;

use Faculdade\Moinhos\Render;
use Faculdade\Moinhos\Redirect;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use DateTime;

class PetController{

    protected function getModel(): string
    {
        return 'pets_model';
    }

    public function index($container, $request){

        $render = new Render;

        $id = $request->attributes->get(1); //PEGAR ID
        $ong = $container['ongs_model']->get(['id'=>$id]); //PEGAR ONG 
        $pets = $container[$this->getModel()]->all(['id_ong'=>$ong['id']]); //PEGAR PETS DA ONG 

        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container['ongs_model']->verifyUser($container, $ong['id'])) ){
            return $render('site/error', 'site', compact('container'));
        }

        $page = 'Pets da ONG | Mundo Pet';
        $keywords = "";
        $active = "user";
        
        return $render('site/user/pets', 'site', compact('page', 'active', 'keywords', 'container', 'ong', 'pets'));
    }

    public function store($container, $request){

        $redirect = new Redirect;
        $id = $request->attributes->get(1);
        $data = $request->request->all();

        // VALIDATE
        $validate = array();
        $validate['name'] = filter_input(INPUT_POST, 'name') ?? null;
        $validate['porte'] = filter_input(INPUT_POST, 'porte') ?? null;
        $validate['raca'] = filter_input(INPUT_POST, 'raca') ?? null;
        $validate['castrado'] = filter_input(INPUT_POST, 'castrado') ?? null;
        $validate['idade'] = filter_input(INPUT_POST, 'idade') ?? null;
        $validate['vacinado'] = filter_input(INPUT_POST, 'vacinado') ?? null;
        $validate['descricao'] = filter_input(INPUT_POST, 'descricao') ?? null;
        $validate['visible'] = filter_input(INPUT_POST, 'visible') ?? null;
        $validate['adotado'] = filter_input(INPUT_POST, 'adotado') ?? null;
        $validate['especie'] = filter_input(INPUT_POST, 'especie') ?? null;
        $validate['sexo'] = filter_input(INPUT_POST, 'sexo') ?? null;
        // MENSAGENS DE VALIDAÇÃO
        $message = array();
        if ( !((strlen($validate['name']) >= 3) && (strlen($validate['name']) <= 255)) ){$message['name'] = "Dado inválido!";}
        if ( !($validate['porte'] == 'Pequeno' || $validate['porte'] == 'Médio' || $validate['porte'] == 'Grande') ){$message['porte'] = "Dado inválido!";}
        if ( !((strlen($validate['raca']) >= 3) && (strlen($validate['raca']) <= 255)) ){$message['raca'] = "Dado inválido!";}
        if ( !($validate['castrado'] == 'Sim' || $validate['castrado'] == 'Não') ){$message['castrado'] = "Dado inválido!";}
        if ( !(filter_var($validate['idade'], FILTER_VALIDATE_INT)) ){$message['idade'] = "Dado inválido!";}
        if ( !($validate['vacinado'] == 'Sim' || $validate['vacinado'] == 'Não') ){$message['vacinado'] = "Dado inválido!";}
        if ( !((strlen($validate['descricao']) <= 60000)) ){$message['descricao'] = "Dado inválido!";}
        if ( !(($validate['visible'] == 0) || ($validate['visible'] == 1)) ){$message['visible'] = "Dado inválido!";}
        if ( !(($validate['adotado'] == 0) || ($validate['adotado'] == 1)) ){$message['adotado'] = "Dado inválido!";}
        if ( !($validate['sexo'] == 'Macho' || $validate['sexo'] == 'Fêmea') ){$message['sexo'] = "Dado inválido!";}
        if ( !((strlen($validate['especie']) >= 3) && (strlen($validate['especie']) <= 255)) ){$message['especie'] = "Dado inválido!";}
        
        // SE HÁ ERROS
        if( !empty($message) ){
            $_SESSION['old'] = $validate;
            $_SESSION['feedback'] = $message;
            return $redirect('/user/ong/'.$id.'/pets');
        }
        // USER
        $user = $_SESSION['auth'];
        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container['ongs_model']->verifyUser($container, $id)) ){
            return $render('site/error', 'site', compact('container'));
        }
        // PET
        $pet = $container[$this->getModel()]->create([
            'name'=>$data['name'] ?? '',
            'porte'=>$data['porte'] ?? '',
            'raca'=>$data['raca'] ?? '',
            'castrado'=>$data['castrado'] ?? '',
            'idade'=>$data['idade'] ?? '',
            'vacinado'=>$data['vacinado'] ?? '',
            'descricao'=>$data['descricao'] ?? '',
            'visible'=>$data['visible'] ?? '',
            'adotado'=>$data['adotado'] ?? '',
            'sexo'=>$data['sexo'] ?? '',
            'especie'=>$data['especie'] ?? '',
            'id_ong'=>$id,
        ]);

        return $redirect('/user/ong/'.$id.'/pets');

    }

    public function edit($container, $request){

        $render = new Render;

        $id = $request->attributes->get(1); //PEGAR ID
        $pet = $container[$this->getModel()]->get(['id'=>$id]); //PEGAR ONG 
        $galerias = $container['galerias_model']->all(['id_pet'=>$id]); //PEGAR ONG 
        $ong = $container['ongs_model']->get(['id'=>$pet['id_ong']]); //PEGAR ONG 

        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container['ongs_model']->verifyUser($container, $ong['id'])) ){
            return $render('site/error', 'site', compact('container'));
        }

        $page = 'Editar Pet | Mundo Pet';
        $keywords = "";
        $active = "user";    
        
        return $render('site/user/pet', 'site', compact('page', 'active', 'keywords', 'container', 'ong', 'pet', 'galerias'));

    }

    public function update($container, $request){

        $redirect = new Redirect;
        $id = $request->attributes->get(1);
        $pet = $container[$this->getModel()]->get(['id'=>$id]); //PEGAR PET 
        $data = $request->request->all();
        // VALIDATE
        $validate = array();
        $validate['name'] = filter_input(INPUT_POST, 'name') ?? null;
        $validate['porte'] = filter_input(INPUT_POST, 'porte') ?? null;
        $validate['raca'] = filter_input(INPUT_POST, 'raca') ?? null;
        $validate['castrado'] = filter_input(INPUT_POST, 'castrado') ?? null;
        $validate['idade'] = filter_input(INPUT_POST, 'idade') ?? null;
        $validate['vacinado'] = filter_input(INPUT_POST, 'vacinado') ?? null;
        $validate['descricao'] = filter_input(INPUT_POST, 'descricao') ?? null;
        $validate['visible'] = filter_input(INPUT_POST, 'visible') ?? null;
        $validate['adotado'] = filter_input(INPUT_POST, 'adotado') ?? null;
        $validate['especie'] = filter_input(INPUT_POST, 'especie') ?? null;
        $validate['sexo'] = filter_input(INPUT_POST, 'sexo') ?? null;
        // MENSAGENS DE VALIDAÇÃO
        $message = array();
        if ( !((strlen($validate['name']) >= 3) && (strlen($validate['name']) <= 255)) ){$message['name'] = "Dado inválido!";}
        if ( !($validate['porte'] == 'Pequeno' || $validate['porte'] == 'Médio' || $validate['porte'] == 'Grande') ){$message['porte'] = "Dado inválido!";}
        if ( !((strlen($validate['raca']) >= 3) && (strlen($validate['raca']) <= 255)) ){$message['raca'] = "Dado inválido!";}
        if ( !($validate['castrado'] == 'Sim' || $validate['castrado'] == 'Não') ){$message['castrado'] = "Dado inválido!";}
        if ( !(filter_var($validate['idade'], FILTER_VALIDATE_INT)) ){$message['idade'] = "Dado inválido!";}
        if ( !($validate['vacinado'] == 'Sim' || $validate['vacinado'] == 'Não') ){$message['vacinado'] = "Dado inválido!";}
        if ( !((strlen($validate['descricao']) <= 60000)) ){$message['descricao'] = "Dado inválido!";}
        if ( !(($validate['visible'] == 0) || ($validate['visible'] == 1)) ){$message['visible'] = "Dado inválido!";}
        if ( !(($validate['adotado'] == 0) || ($validate['adotado'] == 1)) ){$message['adotado'] = "Dado inválido!";}
        if ( !($validate['sexo'] == 'Macho' || $validate['sexo'] == 'Fêmea') ){$message['sexo'] = "Dado inválido!";}
        if ( !((strlen($validate['especie']) >= 3) && (strlen($validate['especie']) <= 255)) ){$message['especie'] = "Dado inválido!";}
      
        // SE HÁ ERROS
        if( !empty($message) ){
            $_SESSION['old'] = $validate;
            $_SESSION['feedback'] = $message;
            return $redirect('/user/pet/'.$id.'/edit');
        }

        // VERIFICAR SE O USUÁRIO LOGADO TEM PERMISSÃO PARA EDITAR A ONG
        if( !($container['ongs_model']->verifyUser($container, $pet['id_ong'])) ){
            return $render('site/error', 'site', compact('container'));
        }
          
        $pet = $container[$this->getModel()]->update(['id'=>$id], [
            'name'=>$data['name'] ?? '',
            'porte'=>$data['porte'] ?? '',
            'raca'=>$data['raca'] ?? '',
            'castrado'=>$data['castrado'] ?? '',
            'idade'=>$data['idade'] ?? '',
            'vacinado'=>$data['vacinado'] ?? '',
            'descricao'=>$data['descricao'] ?? '',
            'visible'=>$data['visible'] ?? '',
            'adotado'=>$data['adotado'] ?? '',
            'sexo'=>$data['sexo'] ?? '',
            'especie'=>$data['especie'] ?? ''
        ]);
        
        return $redirect('/user/pet/'.$pet['id'].'/edit');

    }

    public function delete($container, $request){

        $redirect = new Redirect;
        $user = $_SESSION['auth']; //PEGAR USUÁRIO LOGADO
        $id = $request->attributes->get(1); //PEGAR ID DA ONG
        $ong_user = $container['ongs_users_model']->get(['id_user'=>$user['id'], 'id_ong'=>$id]); //PEGAR RELACIONAMENTO ENTRE A ONG
        $ong_user = $container['ongs_users_model']->delete(['id'=>$ong_user['id']]); //APAGAR RELACIONAMENTO ENTRE A ONG
        $ong = $container[$this->getModel()]->delete(['id'=>$id]); //APAGAR ONG

        return $redirect('/user/ongs');

    }

    public function delete_item_galeria($container, $request){

        $redirect = new Redirect;
        $id = $request->attributes->get(1); //PEGAR ID DA ONG
        $galeria = $container['galerias_model']->delete(['id'=>$id]); //APAGAR ONG

        $galerias = $container['galerias_model']->all(['id_pet'=>$galeria['id_pet']]);

        foreach($galerias as $key => $galeria_item){
            $container['galerias_model']->update(['id'=>$galeria_item['id']], ['ordem'=>$key]);
        }

        return $redirect('/user/pet/'.$galeria['id_pet'].'/edit');

    }
    
    public function galeria($container, $request){

        $redirect = new Redirect;
 
        $id = $request->attributes->get(1); //PEGAR ID
        $pet = $container[$this->getModel()]->get(['id'=>$id]); //PEGAR PET 
        $galerias = $container['galerias_model']->all(['id_pet'=>$id]); //PEGAR ONG 
        $count = 1;
        foreach($_FILES as $key => $file){
            $this->uploadGaleriaFunction($file, $container, $id, 'photo', $count);
            $count ++;
        }

        return $redirect('/user/pet/'.$pet['id'].'/edit');

    }
    
    public function image($container, $request){

        $redirect = new Redirect;
 
        $id = $request->attributes->get(1); //PEGAR ID
        $pet = $container[$this->getModel()]->get(['id'=>$id]); //PEGAR PET 

        $this->uploadPhotoFunction($_FILES['photo'], $container, $id, 'photo');
        
        return $redirect('/user/pet/'.$pet['id'].'/edit');

    }

    public function uploadPhotoFunction($file, $container, $id, $table){
        
        if( $file['name'] && preg_match("/\.(png|jpg|jpeg|PNG|JPG|JPEG)$/", $file['name']) && $file['size'] < 10485760 ) {

            $file['name'] = uniqid(date('HisYmd')) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

            $diretorio = __DIR__ . "/../../public/upload/pet/";

            $uploadfile = $diretorio . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $file = $file['name'];
            }

            $container[$this->getModel()]->update(['id'=>$id], ["$table" => $file]);

        }

    }

    public function uploadGaleriaFunction($file, $container, $id, $table, $order){
        if( $file['name'] && preg_match("/\.(png|jpg|jpeg|PNG|JPG|JPEG)$/", $file['name']) && $file['size'] < 5485760 ) {
            
            $file['name'] = uniqid(date('HisYmd')) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

            $diretorio = __DIR__ . "/../../public/upload/pet/";

            $uploadfile = $diretorio . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $file = $file['name'];
            }

            $item_galeria = $container['galerias_model']->get(['id_pet'=>$id, 'ordem'=>$order]);
            if( empty($item_galeria) ){
                $container['galerias_model']->create([
                    'id_pet'=>$id,
                    'photo'=>$file,
                    'ordem'=>$order
                ]);
            }else{
                $container['galerias_model']->update(['id'=>$item_galeria['id']], ['photo'=>$file]);
            }
        }

    }

}