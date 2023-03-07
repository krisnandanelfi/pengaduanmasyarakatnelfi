<?php
namespace App\Controllers;

use App\Models\Masyarakat;
use App\Models\petugas;

 class LoginController extends BaseController
{
/**
 * Instance of the main Request object
 * 
 * @var HTTP\incomingRequest
 */

 protected $petugass,$masyarakats;

 function __construct(){
    $this->masyarakats = new Masyarakat();
 }
 
public function index()
 {
    return view("login_view");
 }

 public function login()
 {
    $petugass = new Petugas();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password')."";

        $dataPetugass = $petugass->where([
            'username' => $username,
        ])->first();
        d($dataPetugass);
        if($dataPetugass) {
            if(password_verify($password, $dataPetugass['password'])) {
                session()->set(
                    [
                        'id_petugas' => $dataPetugass['id_petugas'],
                        'nama_petugas' => $dataPetugass['nama_petugas'],
                        'username'=>$dataPetugass['username'],
                        'telp' =>$dataPetugass['telp'],
                        'level'=>$dataPetugass['level'],
                        'logged_in' => true,
                    ]
                );
                return $this->response->redirect('/');
            } else {
                session()->setFlashdata('error','Username atau Password salah');
                return $this->response->redirect('/login');
            }
        } else {
            session()->setFlashdata('error','Username tidak ditemukan');
            return $this->response->redirect('/login');
    }
 }
 function logout()
 {
    session()->destroy();
    return $this->response->redirect('/login');
 }
 public function register(){
    return view('register_view');
 }

 //register
 public function pregister(){
    $this->masyarakats->insert([
        'nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
            'telp'=>$this->request->getPost('telp'),
    ]);

        return redirect('login');
 
 }
}