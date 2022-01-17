<?php 
//a kilistáztatáshoz egy új model-t hozok létre

defined('BASEPATH') OR exit('No direct script access allowed');

class Kolcsonzes_model extends CI_Model {

    public function __construct() {
        parent::__construct(); //ősosztály meghívása
        $this->load->database();
    }
    //és egy függvényt a listázásra a modelben
    public function kolcsonzes_listazasa()
    {
        //query builder a lekérdezést különboző függvényelből rakja össza, pl. get ->('tábla név') mondent kilistáz, de beírható limit ('táblanév,x,y), get helyett lehet select('mit'), vagy db->insert('tábla név', data tömb: 'kulcs'melyik oszlop=> ' mit' )
        return $this->db->get('kolcsonzes')->result_array(); // adjuk vissza a beillesztéskor létrejött id-t
    }
//autok rögzítése függvény a modelben
    public function kolcsonzes_rogzites($data)
    {
        $this->db->insert('kolcsonzes', $data);
        return $this->db->insert_id();
    }
}

/* End of file Autok_model.php */


?>