<?php 

namespace App\Models;

use Pimple\Container;
use Faculdade\Moinhos\Model;

class Users extends Model{

    protected $table = 'users';

    public function login($container, $mail, $password) {

        $mail = filter_input(INPUT_POST, 'mail');
        $password = filter_input(INPUT_POST, 'password');
    
        if(is_null($mail) or is_null($password)){
            var_dump('parou');
            return false;
        }
    
        $user = $container['users_model']->get(["mail"=>$mail]);
    
        if(!$user){
            return false;
        }
    
        if($password == $user['password']){
            unset($user['password']);
            $_SESSION['auth'] = $user;
            return true;
        }
    
        return false;
    
    }

    public function ifLogin(){
        if(isset($_SESSION['auth'])){
            return true;
        }else{
            return false;
        }
    }
    
}