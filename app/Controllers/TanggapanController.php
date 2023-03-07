<?php 
namespace App\Controllers;


use App\Models\tanggapan;
class tanggapanController extends BaseController{

    protected $tanggapans;

    function __construct()
    {
        $this->tanggapans = new tanggapan();
    }

    public function index()
    {
        $data['tanggapan']=$this->tanggapans->findAll();
        return view('tanggapan_view',$data);
    }
    public function ftanggapan()
    {
        return view('tanggapan_view');
    }
    public function simpan()
    {
        $this->tanggapans->insert([
            'id_pengaduan' =>$this->request->getPost('id_pengaduan'),
            'tgl_tanggapan' =>$this->request->getPost('tgl_pengaduan'),
            'tanggapan' =>$this->request->getPost('tanggapan'),
            'id_petugas' =>$this->request->getPost('id_petugas'),
        ]);
            
        return redirect('tanggapan');
    }
   public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')){
        
        }
        $data= array(
            'id_pengaduan'=>$this->request->getPost('id_pengaduan'),
            'tgl_tanggapan'=>$this->request->getPost('username'),
            'tanggapan'=>$this->request->getPost('tanggapan'),
            'id_petugas'=>$this->request->getPost('id_petugas'),
            
        );
        $this->tanggapans->update($id,$data);
        session()->getFlashdata("message","Data Berhasil Disimpan");
        return redirect('tanggapan');
    
    
    }

    public function delete($id)
    {
        $this->tanggapans->delete($id);
        session()->getFlashdata("message","Data Berhasil Dihapus");
        return redirect('tanggapan');
    
    
   }
}
