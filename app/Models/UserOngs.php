<?php 

namespace App\Models;

use Pimple\Container;
use Faculdade\Moinhos\Model;

class UserOngs extends Model{

    protected $table = 'ongs_users';

    public function getOng($container, $id){
        return $container['ongs_model']->get(["id"=>$id]);
    }

}