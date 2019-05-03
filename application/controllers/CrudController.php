<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller  //controlador colegio
    {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Crud_model');
        $this->load->library(array('form_validation'));

    }

public function index() 

    {
        $data['provincias'] = $this->Crud_model->getProvincia();      
        $data['colegios'] = $this->Crud_model->getAllData();
        $data['servicios'] = $this->Crud_model->getservicios(); 

        $this->load->view('crudView', $data);
    }

    public function create() 

        {
        //funcion create siempre va en el controlador

            $data = array ( //se crean en un array

            'nombre' => $this->input->post('nombre'), //Se ahiere a bd
            'rbd' => $this->input->post('rbd'),
            'fecha_registro' => $this->input->post('fecha_registro'),
            'provincias' => $this->input->post('selProvincia'),
            'comunas' => $this->input->post('selcomuna'),

        );
             

        $idcolegio = $this->Crud_model->createData($data);
        //creamos , id creado en clase colegioservicio
 
        $servicios = $this->input->post('selservicios');  

        //se deberían guardan los check seleccionados        

        $data_colegioservicio = []; // con el [] obtienes todos los datos seleccionados, si no, marca los ultimo

        foreach ($servicios as $servicio) {

        //Obtiene la tabla de la base de datos, en este caso colegioservicios.
            $data_colegioservicio = [
                'idcolegio' => $idcolegio,
                'idservicios' => $servicio
            ];

            $this->Crud_model->setColegioServicio($data_colegioservicio);

        }
        redirect("CrudController");
    }
    

    public function edit($id) 
    {

        $data['provincias'] = $this->Crud_model->getProvincia($id);
        $data['row'] = $this->Crud_model->getData($id);
        $data['servicios'] = $this->Crud_model->getservicios();

        $this->load->view('crudEdit', $data);
      
    }

    public function update($id)
    {

        $this->Crud_model->updateData($id);
        redirect("CrudController"); 

    }

    public function delete($id) 
    {

        $this->Crud_model->deleteData($id);
        redirect("CrudController");

    }

    public function getcomuna()
    {

        $id = $this->input->post('provincias');
        $comunas = $this->Crud_model->getComuna($id);
        foreach ($comunas as $comuna) 
            echo '<option value="' . $comuna->id . '">' . $comuna->nombre . '</option>';

    }

    
}
