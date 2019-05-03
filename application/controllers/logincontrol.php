<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logincontrol extends CI_Controller  //controlador colegio
    {
    const HASH = PASSWORD_BCRYPT;
    const COST = 14;
    // Almacenamiento de datos del usuario:
    public $data;

    public function __construct() {
        parent:: __construct();        
        $this->load->model('modeloslogin');        
      }

    public function index(){
        $this->load->view('newlogin');     
    }

    public function conectar(){
       $ExisteUsuarioyPassoword=$this->modeloslogin->validarpass($_POST['username']);   //   comprobamos que el usuario exista en la base de datos y la password ingresada sea correcta

        if($ExisteUsuarioyPassoword){   // La variable $ExisteUsuarioyPassoword recibe valor TRUE si el usuario existe y FALSE en caso que no. Este valor lo determina el modelo.

           $hash = password_hash($_POST['password'], PASSWORD_BCRYPT, ['COST' => 14]);

           echo $hash;
           echo "<br>";
           echo $ExisteUsuarioyPassoword->password;
           echo "<br>";

           if (password_verify($ExisteUsuarioyPassoword->password, $hash)) {
            echo 'contraseña correcta';
            $this->load->view('vistapdf.php');
           } else {
            echo 'contraseña incorrecta';
           }              
          
                 //   Si el usuario ingresó datos de acceso válido, imprimos un mensaje de validación exitosa en pantalla
      }          
//  }
  //  public function login($password) {
            // Primero comprobamos si se ha empleado una contraseña correcta:
//      echo "newlogin: ", $this->data->username, "\n";
 //   if (password_verify($password, $this->data->username)) {
            // Exito, ahora se comprueba si la contraseña necesita un rehash:
  //  if (password_needs_rehash($this->data->username, self->HASH, ['cost' => self->COST])) {
            // Tenemos que hacer rehash en la contraseña y guardarla.  Simplemente se llama a setPassword():
  //      $this->setPassword($password);
  //      $this->save();
  //    }
  //      $this->load->view('vistapdf.php'); //return true; // O hacer lo necesario para indicar que el usuario se ha logeado.
  //       }
  //    echo "fallaste";
            
    }
}
