<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
//1. controller fgv. automatikusan megkreálódik a ci extension segítségével
class kolcsonzes extends CI_Controller {
//az adatbázist kell először konstruktorral betölteni
    public function __construct() {
        parent::__construct(); //ősosztály konstruktorát meg kell adnunk minden esetben
        $this->load->helper('url'); //elérési út miatt be kell tölteni       
        $this->load->model('kolcsonzes_model');        
        $this->load->library('session');
    }
// egy adott model-t auto model nevű változó, ahol az autok listázását akarom meghívni
    public function index()
    {
        $kolcsonzes = $this->kolcsonzes_model->kolcsonzes_listazasa();
        $data['kolcsonzes'] = $kolcsonzes;
        // load- view val az autok/listaz meghívása történik
        $this->load->view('kolcsonzes/listaz', $data); //a view() 2 paramétere melyik oldal és mit
    }

    public function kolcsonzes_rogzit()
    {
        switch ($_SERVER['REQUEST_METHOD']) { //switch arra hogy a request GET vagy POST a kérés ($_SERVER request method) super
            case 'GET':
                $this->load->view('kolcsonzes/rogzit'); //a view 1 paraméterrel melyik oldal    
                break;
            case 'POST': //POST eljárással küldjük el a rögzített adatokat, action-t nem adunk mert önmagának küldi
                $this->load->library('form_validation'); //form validation betöltése a codeigniter userguide alapján
                $this->form_validation->set_rules('berloid','Bérlő id','required'); //trim-elje be és required a validáló feltétel
                $this->form_validation->set_rules('autoid','Autó id','required'); //trim-elje be és required a validáló feltétel
                //$this->form_validation->set_rules('tipus', 'Típus', 'trim|required');
                $this->form_validation->set_rules('berletkezdete', 'Bérlet kezdete', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                    $errors = validation_errors();
                    $array['errors'] = $errors; //errors user data-ba tegye bele
                    $array['last_request'] = $this->input->post(); //ha azt akarom, hogy újratöltődjön: a last request változóba a post értékét teszem bele- hogy ne kelljen újra tölteni!
                    $this->session->set_flashdata( $array ); // beadott változók flashdata újratöltése a session-ön keresztül, egy átirányításig lesz érvényben, azután megszűnik
                    redirect('kolcsonzes/kolcsonzes_rogzit');
                }
                else
                {
                    $data = []; // beillesztendő data tömb a rögzítésbe
                    $data['berloid'] = $this->input->post('berloid'); // mi kell ezen belül a posztból így tudom lekérdezni
                    $data['autoid'] = $this->input->post('autoid'); // mi kell ezen belül a posztból így tudom lekérdezni
                    $data['berletkezdete'] = $this->input->post('berletkezdete');
                    $data['napokszama'] = $this->input->post('napokszama');
                    $data['napidij'] = $this->input->post('napidij');
                    $id = $this->kolcsonzes_model->kolcsonzes_rogzites($data); // rögzítés meghívása modelben, a $data tömb a paramétere
                    $success = "<p>Sikeres Rögzítés, a létrehozott kölcsönzés azonosítója: $id</p>"; // az azonosítóval kiíratjuk a sikeres rögzítést
                    $array['success'] = $success;
                    $this->session->set_flashdata( $array );
                    redirect('kolcsonzes/kolcsonzes_rogzit');
                }
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