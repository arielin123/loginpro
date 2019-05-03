
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controladorcrud extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('modelocrud');
    }

public function index() {     
        $data['result'] = $this->modelocrud->gettodosd();
        $this->load->view('vistacrud', $data);
    }

    public function create() {
        $this->modelocrud->createData();
        redirect("controladorcrud");
    }

    public function edit($id) {
        $data['row'] = $this->modelocrud->getData($id);
        $this->load->view('editarcrud', $data);

        //foreach ($comunas as $comuna) {           
        
        //echo '<option value="' . $comuna->id . '">' . $comuna->nombre . '</option>';

        
    }

    public function update($id) {
        $this->modelocrud->updateData($id);
        redirect("controladorcrud");
    }

    public function delete($id) {
        $this->modelocrud->deleteData($id);
        redirect("controladorcrud");
    }


        //$id = $this->input->post('provincias');
        //$comunas = $this->Crud_model->getComuna($id);

        //foreach ($comunas as $comuna) {
            
        
        //echo '<option value="' . $comuna->id . '">' . $comuna->nombre . '</option>';     
        
    
}
