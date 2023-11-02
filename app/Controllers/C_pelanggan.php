<?php

namespace App\Controllers;

use App\Models\M_pelanggan;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;



class C_pelanggan extends BaseController
{

    public function index()
    {
        helper('form');
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM pelanggan');
        $results = $query->getResultArray();

        $data = array(
            'daftarPelanggan' => $results,
        );

        try {
            // $user = $userModel->find($id);
            return view('ps/index', $data);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }

    public function create(): string
    {
        return view('ps/create');
    }

    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Form nama wajib diisi'
                ]
            ],
            'alamat'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Form alamat wajib diisi'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return view('ps/create', [
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $pelanggan = new M_pelanggan();

            //insert data into database
            $pelanggan->insert([
                'nama'   => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'tgl' => Time::now('Asia/Jakarta'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Pelanggan Berhasil Ditambah');

            return redirect()->to(base_url('/'));
        }
    }

    /**
     * edit function
     */
    public function edit($id)
    {
        $pelanggan = new M_pelanggan();

        $data = array(
            'pelanggan' => $pelanggan->find($id)
        );

        return view('ps/edit', $data);
    }

    /**
     * update function
     */
    public function update($id)
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Form nama wajib diisi'
                ]
            ],
            'alamat'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Form alamat wajib diisi'
                ]
            ],
        ]);

        if (!$validation) {

            //model initialize
            $pelanggan = new M_pelanggan();

            //render view with error validation message
            return view('ps/edit', [
                'pelanggan' => $pelanggan->find($id),
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $pelanggan = new M_pelanggan();

            //insert data into database
            $pelanggan->update($id, [
                'nama'   => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
            ]);

            session()->setFlashdata('message', 'Data Pelanggan Berhasil Diupdate');

            return redirect()->to(base_url('/'));
        }
    }

    public function delete($id)
    {
        //model initialize
        $pelanggan = new M_pelanggan();
        $findPelanggan = $pelanggan->find($id);

        if ($findPelanggan) {
            $pelanggan->delete($id);
            //flash message
            session()->setFlashdata('message', 'Data Pelanggan Berhasil Dihapus');
            return redirect()->to(base_url('/'));
        }
    }
}
