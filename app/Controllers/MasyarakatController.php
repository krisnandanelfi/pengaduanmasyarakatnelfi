<?php 
namespace App\Controllers;


use App\Models\masyarakat;
use CodeIgniter\HTTP\Request;

class masyarakatController extends BaseController{

    protected $masyrakats;

    function __construct()
    {
        $this->masyrakats = new masyarakat();
    }

    public function index()
    {
        $data['masyarakat']=$this->masyrakats->findAll();
        return view('masyarakat_view',$data);
    }
    public function create()
    {
        return view('fmasyarakat_view');
    }
    public function simpan()
    {
        $data= array(
            'nik' =>$this->request->getPost('nik'),
            'nama' =>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password'),
            'telp' =>$this->request->getPost('telp'),
        );
            
        return redirect('masyrakat');
    }
   public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')){
        
        }
        $data= array('nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'telp'=>$this->request->getPost('telp'),
            'level'=>$this->request->getPost('level'),
            
        );
        $this->masyrakats->update($id,$data);
        session()->getFlashdata("message","Data Berhasil Disimpan");
        return redirect('masyarakat');
    
    
    }

    public function delete($id)
    {
        $this->masyrakats->delete($id);
        session()->getFlashdata("message","Data Berhasil Dihapus");
        return redirect('masyarakat');
    
    
   }
}

    
   
