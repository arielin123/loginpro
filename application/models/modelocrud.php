<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelocrud extends CI_Model {

    public function __construct() {

        $this->load->database();
        $this->load->library(array('form_validation'));

    }

    function createData() {

        $data = array (
            'nombre' => $this->input->post('nombre'),

        );

        $this->db->insert('servicios', $data);
    }

   function gettodosd() {

        $query = $this->db->query('SELECT * FROM servicios');

        //('SELECT c.*, (SELECT p.nombre FROM provincias p WHERE p.id = c.provincias) as provincia_nombre, (SELECT o.nombre FROM comunas o WHERE o.id = c.comunas) as comuna_nombre FROM colegios c');
        return $query->result();

    }

    function getData($id) {

        $query = $this->db->query('SELECT * FROM servicios WHERE "id" =' .$id);

        return $query->row();
    }

    function updateData($id) {
        $data['nombre'] = $this->input->post('nombre');
        

        $this->db->where('id', $id);
        $this->db->update('servicios', $data);
    }

    function deleteData($id) {

        $this->db->where('id', $id);
        $this->db->delete('servicios');
    }
}

