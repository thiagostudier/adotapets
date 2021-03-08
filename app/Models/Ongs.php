<?php 

namespace App\Models;

use Pimple\Container;
use Faculdade\Moinhos\Model;

class Ongs extends Model{

    protected $table = 'ongs';

    public function verifyUser($container, $id){
        $user = $_SESSION['auth']; // USER
        $ong_user = $container['ongs_users_model']->get(['id_user'=>$user['id'], 'id_ong'=>$id]);
        if( isset($ong_user['id']) && $ong_user['id'] > 0 ){
            return true;
        }else{
            return false;
        }
    }

}