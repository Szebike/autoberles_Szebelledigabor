<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
//1. controller fgv. automatikusan megkreálódik a ci extension segítségével
class Autok extends CI_Controller {
//az adatbázist kell először konstruktorral betölteni
    public function __construct() {
        parent::__construct(); //ősosztály konstruktorát meg kell adnunk minden esetben
        $this->load->helper('url'); //elérési út miatt be kell tölteni       
        $this->load->model('autok_model');        
        $this->load->library('session');
    }
// egy adott model-t auto model nevű változó, ahol az autok listázását akarom meghívni
    public function index()
    {
        $autok = $this->autok_model->autok_listazasa();
        $data['autok'] = $autok;
        // load- view val az autok/listaz meghívása történik
        $this->load->view('autok/listaz', $data); //a view() 2 paramétere melyik oldal és mit
    }

    public function autok_rogzit()
    {
        switch ($_SERVER['REQUEST_METHOD']) { //switch arra hogy a request GET vagy POST a kérés ($_SERVER request method) super
            case 'GET':
                $this->load->view('autok/rogzit'); //a view 1 paraméterrel melyik oldal    
                break;
            case 'POST': //POST eljárással küldjük el a rögzített adatokat, action-t nem adunk mert önmagának küldi
                $this->load->library('form_validation'); //form validation betöltése a codeigniter userguide alapján
                $this->form_validation->set_rules('rendszam','tipus', 'evjarat', 'szin','trim|required'); //trim-elje be és required a validáló feltétel
                //$this->form_validation->set_rules('tipus', 'Típus', 'trim|required');
                //$this->form_validation->set_rules('evjarat', 'Évjárat', 'trim|numeric|greater_than[1900]|less_than_equal_to[2022]|required');

                /*if ($this->form_validation->run() == FALSE)
                {
                    $errors = validation_errors();
                    $array['errors'] = $errors; //errors user data-ba tegye bele
                    $array['last_request'] = $this->input->post(); //ha azt akarom, hogy újratöltődjön: a last request változóba a post értékét teszem bele- hogy ne kelljen újra tölteni!
                    $this->session->set_flashdata( $array ); // beadott változók flashdata újratöltése a session-ön keresztül, egy átirányításig lesz érvényben, azután megszűnik
                    redirect('autok/autok_rogzit');
                }
                else
                {*/
                    $data = []; // beillesztendő data tömb a rögzítésbe
                    $data['rendszam'] = $this->input->post('rendszam'); // mi kell ezen belül a posztból így tudom lekérdezni
                    $data['tipus'] = $this->input->post('tipus');
                    $data['evjarat'] = $this->input->post('evjarat');
                    $data['szin'] = $this->input->post('szin');
                    $id = $this->autok_model->auto_rogzitese($data); // rögzítés meghívása modelben, a $data tömb a paramétere
                    $success = "<p>Sikeres Rögzítés, a létrehozott autó azonosítója: $id</p>"; // az azonosítóval kiíratjuk a sikeres rögzítést
                    $array['success'] = $success;
                    $this->session->set_flashdata( $array );
                    redirect('autok');
                //}
                /**POST
                 * Adatok validálása
                 * Adatok elküldése az adatbázisba
                 * Átirányítás a formra
                 * Visszajelzés a sikerről
                 */
                break;
        }
    }
}

/* End of file Autok.php */

?>