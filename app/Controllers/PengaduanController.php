<?php 
namespace App\Controllers;


use App\Models\pengaduan;
class PengaduanController extends BaseController{

    protected $pengaduans;

    function __construct()
    {
        $this->pengaduans = new pengaduan();
    }

    public function index()
    {
        $data['pengaduan']=$this->pengaduans->findAll();
        return view('pengaduan_view',$data);
    }
    public function fpengaduan()
    {
        return view('fpengaduan');
    }
    public function simpan(){

    $dataFile = $this->request->getFile('foto');
    $Filename = $dataFile->getRandomName();


    $this->pengaduans->insert([
        'tgl_pengaduan' =>$this->request->getPost('tgl_pengaduan'),
        'nik' =>$this->request->getPost('nik'),
        'isi_laporan' =>$this->request->getPost('isi_laporan'),
        'foto'=>$Filename,
        'status' => "0",
    ]);
        
    return redirect('pengaduan');

        
}
   public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')){
        
        }
        $data= array(
            'tgl_pengaduan'=>$this->request->getPost('tgl_pengaduan'),
            'nik'=>$this->request->getPost('nik'),
            'isi_laporan' =>$this->request->getPost('isi_laporan'),
            'foto'=>$this->request->getPost('foto'),
            'status'=>$this->request->getPost('status'),
            
        );
        $this->pengaduans->update($id,$data);
        session()->getFlashdata("message","Data Berhasil Disimpan");
        return redirect('pengaduan');
    
    
    }

    public function delete($id)
    {
        $this->pengaduans->delete($id);
        session()->getFlashdata("message","Data Berhasil Dihapus");
        return redirect('pengaduan');
    
    
   }
}
