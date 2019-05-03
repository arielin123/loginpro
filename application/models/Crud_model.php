<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
    public function __construct() 
    {

        $this->load->database();
        $this->load->library(array('form_validation'));

    }

    function createData($data) 
    {

        $this->db->insert('colegios', $data);
        return $this->db->insert_id();
    }

    function setColegioServicio($data) 
    {

        $this->db->insert('colegioservicio', $data); //enlace con tabla colegioservicio

    }

    function getAllData() 
    {

     $query = $this->db->query('SELECT 
        c.id,
        c.nombre,
        c.rbd,
        c.fecha_registro,
        p.nombre as provincia_nombre,
        o.nombre as comuna_nombre
        FROM colegios c
        LEFT JOIN provincias p ON p.id = c.provincias
        LEFT JOIN comunas o ON o.id = c.comunas');       
        return $query->result();

    }

    function getServicioscFromColegio($idcolegio) 
    {

        return $this->db->query("SELECT s.nombre
            FROM colegioservicio as cs
            LEFT JOIN servicios s ON s.id = cs.idservicios
            WHERE cs.idcolegio = ?", $idcolegio)->result();
    }

    function getProvincia()
    {

    // armamos la consulta
    $query = $this->db-> query('SELECT * FROM provincias');
    //if ($query->num_rows() > 0) {
        // almacenamos en una matriz bidimensional
      //  foreach($query->result() as $row)
      //     $arrProvincia[htmlspecialchars($row->id, ENT_QUOTES)] = htmlspecialchars($row->nombre, ENT_QUOTES);
      //   $query->free_result();
      //  return $arrProvincia;
     return $query->result(); //(es lo mismo que el codigo de arriba)       
    }

    function getComuna($id) 
    {

    $query = $this->db->query('SELECT * FROM comunas where id_provincia = ? ORDER BY nombre ASC',$id);
//si logra la consulta  
    return $query->result();
     
    }

    //function getcomunaservicio(){

      // $query = $this->db->query('SELECT s.*, (SELECT t.nombre FROM colegioservicio m WHERE m.id = c.servicios) as colegio_servicio, FROM colegioservicios s'); 

   // return $query->result();

    //}

    function getservicios() 
    {

    $query = $this->db->query('SELECT * FROM servicios');
//si logra la consulta    
    return $query->result();
     
    }

    function getData($id) 
    {
        // buscamos en la base de datos dentro del query y hacemos la consulta 
        $query = $this->db->query('SELECT * FROM colegios WHERE "id" ='.$id);
        return $query->row();
    }

    function updateData($id) {
        $data = array (
            'nombre' => $this->input->post('nombre'),
            'rbd' => $this->input->post('rbd'),
            'fecha_registro' => $this->input->post('fecha_registro'),
            'provincias' => $this->input->post('selProvincia'),
            'comunas' => $this->input->post('selcomuna')
        );
           // 'servicios' => $this->input->post('selservicios'),
            $idcolegio = $this->input->post('idcolegio');
            $servicios = $this->input->post('selservicios');

            //se deberían guardan los check seleccionados        

        $data_colegioservicio = []; // con el [] obtienes todos los datos seleccionados, si no, marca los ultimo

        $this->db->where('idcolegio',$idcolegio);
        $this->db->delete('colegioservicio');

        foreach ($servicios as $servicio) {

        //Obtiene la tabla de la base de datos, en este caso colegioservicios.
            $data_colegioservicio = [
                'idcolegio' => $idcolegio,
                'idservicios' => $servicio
            ];

            $this->Crud_model->setColegioServicio($data_colegioservicio);

        }
        
        $this->db->where('id',$id);
        $this->db->update('colegios',$data);
        $id_colegio=$this->db->insert_id();

    }

    function deleteData($id) {

        $this->db->where('idcolegio',$id);
        $this->db->delete('colegioservicio');

        $this->db->where('id', $id);
        $this->db->delete('colegios');

    }



}
