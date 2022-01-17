
<?php
//1.The first segment represents the controller class that should be invoked.
//2.The second segment represents the class function, or method, that should be called.
//3.The third, and any additional segments, represent the ID and any variables that will be passed to the controller.




defined('BASEPATH') OR exit('No direct script access allowed');
//1. controller fgv. automatikusan megkreálódik a ci extension segítségével


class Berlok extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //elérési út miatt be kell tölteni       
        $this->load->model('berlok_model');        
        $this->load->library('session');
    }
    public function index()
    {
        $berlok = $this->berlok_model->berlok_listazasa();
        $data['berlok'] = $berlok;
        // load- view val az autok/listaz meghívása történik
        $this->load->view('berlok/listaz', $data); //a view() 2 paramétere melyik oldal és mit
    }
    public function berlok_rogzit()
    {
        switch ($_SERVER['REQUEST_METHOD']) { //switch arra hogy a request GET vagy POST a kérés ($_SERVER request method) super
            case 'GET':
                $this->load->view('berlok/rogzit'); //a view 1 paraméterrel melyik oldal    
                break;
            case 'POST': //POST eljárással küldjük el a rögzített adatokat, action-t nem adunk mert önmagának küldi
                $this->load->library('form_validation'); //form validation betöltése a codeigniter userguide alapján
                $this->form_validation->set_rules('nev','jogositvany', 'telefon', 'trim|required'); //trim-elje be és required a validáló feltétel
               

                /*if ($this->form_validation->run() == FALSE)
                {
                    $errors = validation_errors();
                    $array['errors'] = $errors; //errors user data-ba tegye bele
                    $array['last_request'] = $this->input->post(); //ha azt akarom, hogy újratöltődjön: a last request változóba a post értékét teszem bele- hogy ne kelljen újra tölteni!
                    $this->session->set_flashdata( $array ); // beadott változók flashdata újratöltése a session-ön keresztül, egy átirányításig lesz érvényben, azután megszűnik
                    redirect('berlok/berlok_rogzit');
                }
                else
                {*/
                    $data = []; // beillesztendő data tömb a rögzítésbe
                    $data['nev'] = $this->input->post('nev'); // mi kell ezen belül a posztból így tudom lekérdezni
                    $data['jogositvany'] = $this->input->post('jogositvany'); // mi kell ezen belül a posztból így tudom lekérdezni
                    $data['telefon'] = $this->input->post('telefon');
                    $id = $this->berlok_model->berlo_rogzitese($data); // rögzítés meghívása modelben, a $data tömb a paramétere
                    $success = "<p>Sikeres Rögzítés, a létrehozott bérlő azonosítója: $id</p>"; // az azonosítóval kiíratjuk a sikeres rögzítést
                    $array['success'] = $success;
                    $this->session->set_flashdata( $array );
                    redirect('berlok');
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
    public function berlok_modosit()
    {
        
            $data = array();
            $get = $this->uri->uri_to_assoc();
            $id=$this->input->get('id');
            //$id=3;
            $nev=$this->input->get('nev');
            echo $nev;
            //$result['berlok']=$this->berlok_Model->displayrecordsById($id); //$result['data']=$this->Hello_Model->displayrecordsById($id);
            $data['berlok'] = $this->berlok_model->berlok_listazasa();

            
            $this->load->view('berlok/modosit', $data);
            if ($this->input->post('update')) {

                //$data['nev']=$this->input->post('nev');
                $nev=$this->input->post('nev');
                echo'OK';
                $this->berlok_model->update_record2($nev,$id); 
                //$this->berlok_model->update_record($nev); // nem működik
                //$this->Berlok_model->update_record($nev); //model meghívása és update function meghívása
                echo'OK';
            }
            else{
                //echo'error';
            }

        
        }

}


   
    ?>