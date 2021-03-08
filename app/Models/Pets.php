<?php 

namespace App\Models;

use Pimple\Container;
use Faculdade\Moinhos\Model;

class Pets extends Model{

    protected $table = 'pets';

    public function getOng($container){

        return 'oi';
        
    }    

}