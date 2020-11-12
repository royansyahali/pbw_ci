<?php
namespace App\Controllers;

use App\Models\Agama_Model;

class Agama extends BaseController {

    public function __construct() 
    {
        $this->session = \Config\Services::session();  
        $this->agamaModel =  new Agama_Model();   
       
    }

    public function index() 
    {
        
        
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataAgama'] = $this->agamaModel->findAll();
        $data['segment'] = $this->segment;
        $data['isLogin'] = $this->session->get('username');
        
        // dd($data);
        echo view('header_v',$data);
        echo view('agama_v', $data);
        echo view('footer_v');
    }

    public function add() {
        $data['segment'] = $this->segment;
        echo view('header_v',$data);
        echo view('agama_form_v');
        echo view('footer_v');
    }

    public function edit($id) 
    {

        $data['dataAgama'] = $this->agamaModel->find($id);
        $data['segment'] = $this->segment;

        
        echo view('header_v',$data);
        echo view('agama_form_v', $data);
        echo view('footer_v');
    }

    public function save() 
    {
        $data = [
            'agama' => $this->request->getPost('agama'),
        ];
      
        $id = $this->request->getPost('id');

        if (empty($id)) { //Insert
            $response = $this->agamaModel->insert($data);

            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan. ']);
            }
        } else { // Update
            $where = ['kode_agama' => $id];

            $response = $this->agamaModel->update($where, $data);
          
            if ($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data berhasil disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data gagal disimpan.']);
            }
        }

        return redirect()->to(site_url('Agama'));
    }

    public function delete($id) 
    {

        $response = $this->agamaModel->delete($id);
        
        if ($response) {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data berhasil dihapus.']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data gagal dihapus. ']);
        }

        return redirect()->to(site_url('Agama'));
    }
}