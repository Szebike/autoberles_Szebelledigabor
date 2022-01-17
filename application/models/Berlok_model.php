<?php 
//a kilistáztatáshoz egy új model-t hozok létre

defined('BASEPATH') OR exit('No direct script access allowed');

class Berlok_model extends CI_Model {

    public function __construct() { //construct function
        parent::__construct(); //ősosztály meghívása
        $this->load->database(); // adatbázis meghívása
    }
    //és egy függvényt írunk a listázásra a modelben
    public function berlok_listazasa()
    {
        //query builder a lekérdezést különboző függvényelből rakja össza, pl. get ->('tábla név') mondent kilistáz, de beírható limit ('táblanév,x,y), get helyett lehet select('mit'), vagy db->insert('tábla név', data tömb: 'kulcs'melyik oszlop=> ' mit' )
        return $this->db->get('berlok')->result_array(); // adjuk vissza a beillesztéskor létrejött id-t
    }

    public function displayrecordsById($id) // nem működik
	{
	$query=$this->db->query("select * from 'berlok' where 'nev'='".$id."'");
	return $query->result();
	}

    public function berlok_listazasa2($id)
    {
        //query builder a lekérdezést különboző függvényelből rakja össza, pl. get ->('tábla név') mondent kilistáz, de beírható limit ('táblanév,x,y), get helyett lehet select('mit'), vagy db->insert('tábla név', data tömb: 'kulcs'melyik oszlop=> ' mit' )
        return $this->db->select('berlok', $id)->result_array(); // adjuk vissza a beillesztéskor létrejött id-t
    }

//autok rögzítése függvény a modelben
    public function berlo_rogzitese($data)
    {
        $this->db->insert('berlok', $data);
        return $this->db->insert_id();
    }
    public function update_record($nev)
    {
        //$this->db->update('berlok', 'nev', $nev, 'id', $id); //nem jó a syntaxis!!!
        //$this->db->update('berlok', $nev,'id=3'); //UPDATE `berlok` SET `BereczI` = '' WHERE `id` = 3
        //$this->db->update('berlok','nev=$nev','id=3'); //UPDATE `berlok` SET `nev=$nev` = '' WHERE `id` = 3
        //$this->db->update('berlok','nev' ."$nev",'id=3'); //UPDATE `berlok` SET `nevBereczI` = '' WHERE `id` = 3
        $this->db->update('berlok',$nev,'id=3');// nem megfelelő szintaszis
        return $this->db->update_id();
    }

    public function update_record2($nev,$id)
    {
        //$query=$this->db->query("UPDATE berlok SET nev='$nev' where id='3'");
        //$query=$this->db->query("UPDATE `berlok` SET `nev`='$nev' where `id`='3'");
        $this->db->set('nev',$nev);
        $this->db->where('id',$id);
        $this->db->update('berlok');
    }

    

    
}

/* End of file Berlok_model.php */


?>