<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
	  if(!session()->get('username'))
    {
      $this->_pesan('sepertinya kamu belum login? silahkan login terlebih dahulu', 'error');
      return redirect()->to('/login');
    }
    
		d(session()->get('username'));
	}
	
  private function _pesan($pesan, $type = null)
  {
    if($type == null)
    {
      session()->setFlashdata([
        'title' => 'berhasil diproses!',
        'pesan' => $pesan,
        'type'  => 'success'
      ]);
    } else {
      session()->setFlashdata([
        'title' => 'gagal diproses!',
        'pesan' => $pesan,
        'type'  => $type
      ]);
    }
  }
	//--------------------------------------------------------------------//
}