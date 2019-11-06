<?php  
namespace App\Models\ORM;
 
 use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class cd extends \Illuminate\Database\Eloquent\Model {  
  public $id;
  public $email;
  public $clave;
  public $tipo;
  public $rol;

  public function __construct($id, $email, $clave, $tipo, $rol) {
    $this->id = $id;
    $this->email = $email;
    $this->clave = $clave;
    $this->tipo = $tipo;
    $this->rol = $rol;
  }
}
