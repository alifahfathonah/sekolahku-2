<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\SiswaModel;
use App\Models\NisnModel;
use App\Models\JurusanModel;

class Auth extends BaseController
{
  protected $users;
  protected $siswa;
  protected $nisn;
  protected $jurusan;
  
  public function __construct() 
  {
    $this->users   = new UsersModel();  
    $this->siswa   = new SiswaModel();  
    $this->nisn    = new NisnModel();  
    $this->jurusan = new JurusanModel();  
  }
  
	public function index()
	{
	  $data = [
      'title' => 'Login Page',
      'valid' => \Config\Services::validation(),
	  ];

		return view('auth/index', $data);
	}
	
	public function register()
	{
	  $data = [
      'title'      => 'registrasi siswa/i',
      'valid'      => \Config\Services::validation(),
      'dt_jurusan' => $this->jurusan->findAll(),
	  ];
	  
		return view('auth/register', $data);
	}
	
	public function proses_register()
	{
	  // cek nisn tersedia/tidak
	  $nisn = $this->nisn->getNisn($this->request->getVar('nisn'));
	  if($nisn == null)
	  {
	    $this->_pesan('maaf nisn yang anda masukkan salah/tidak terdaftar!', 'error');
	    return redirect()->to('/register')->withInput();
	  } else {
	    // cek apakah nisn sudah digunakan/belum
	    $nisn_id = $this->siswa->getNisnId($nisn['id']);
  	  
  	  if($nisn_id !== null)
  	  {
  	    $this->_pesan('nisn yang anda masukkan sudah terkait dengan akun SekolahKu.
  	    jika dirasa ada orang lain yang menggunakan nisn anda, segeralah melapor ke pihak administrator', 'error');
  	    return redirect()->to('/register')->withInput();
  	  }
	  }
	  
	  // cek jurusan yang dipilih benar/tidak
	  $jurusan = $this->jurusan->getJurusan($this->request->getVar('jurusan'));
	  if($jurusan == null)
	  {
	    $this->_pesan('maaf jurusan yang anda pilih salah/tidak terdaftar!', 'error');
	    return redirect()->to('/register')->withInput();
	  }

	  // cek captcha benar/tidak
	  if($this->request->getVar('captcha') !== $this->request->getVar('resultCaptcha'))
	  {
	    $this->_pesan('maaf hasil penjumlahan kamu salah! harap ulangi','error');
	    return redirect()->to('/register')->withInput();
	  }
	  
	  if(!$this->validate([
	    // tabel siswa
	    'nama' => [
	      'label' => 'Nama Lengkap',
	      'rules' => 'required|min_length[3]|max_length[120]'
	    ],
	    'nisn' => [ // nisn_id
	      'label' => 'NISN',
	      'rules' => 'required|numeric|min_length[6]|max_length[6]'
	    ],
	    'kelas' => [
	      'label' => 'Kelas',
	      'rules' => 'required|max_length[3]'
	    ],
	    'tmp_lahir' => [
	      'label' => 'Tempat Lahir',
	      'rules' => 'required|min_length[5]|max_length[60]'
	    ],
	    'tgl_lahir' => [
	      'label' => 'Tanggal Lahir',
	      'rules' => 'required|min_length[10]|max_length[10]'
	    ],
	    'jurusan' => [ // jurusan_id
	      'label' => 'Jurusan',
	      'rules' => 'required|min_length[5]|max_length[120]'
	    ],
	    'no_hp' => [
	      'label' => 'No. Hp',
	      'rules' => 'required|min_length[10]|max_length[15]|numeric'
	    ],
	    'alamat' => [
	      'label' => 'Alamat Lengkap',
	      'rules' => 'required|min_length[20]|max_length[120]'
	    ],
	    // tabel users
	    'username' => [
	      'label' => 'Username',
	      'rules' => 'required|min_length[6]|max_length[20]|is_unique[users.username]'
	    ],
	    'password' => [
	      'label' => 'Password',
	      'rules' => 'required|min_length[6]'
	    ],
	    // konfirmasi users
	    'password1' => [
	      'label' => 'Konfirmasi Password',
	      'rules' => 'required|min_length[6]|matches[password]'
	    ],
	    'captcha' => [
	      'label' => 'Hasil Penjumlahan',
	      'rules' => 'required|min_length[3]|max_length[4]|numeric'
	    ]
	  ])) {
	    return redirect()->to('/register')->withInput();
	  }
	  
	  
	  $this->users->save([
      'username'  => $this->request->getVar('username'),
      'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      'status_id' => 1, // aktif
      'level_id'  => 2 // siswa
	  ]);
	  
	  $this->siswa->save([
      'nama'       => $this->request->getVar('nama'),
      'nisn_id'    => $nisn['id'],
      'kelas'      => $this->request->getVar('kelas'),
      'jurusan_id' => $jurusan['id'],
      'tmp_lahir'  => $this->request->getVar('tmp_lahir'),
      'tgl_lahir'  => $this->request->getVar('tgl_lahir'),
      'no_hp'      => $this->request->getVar('no_hp'),
      'alamat'     => $this->request->getVar('alamat'),
      'status_id'  => 1 // aktif
	  ]);
	  
	  $this->_pesan('registrasi berhasil, silahkan login!');
	  return redirect()->to('/login');
	}
	
	public function proses_login()
	{
	  if(!$this->validate([
	    'username' => [
	      'label' => 'Username',
	      'rules' => 'required|min_length[6]|max_length[120]'
	    ],
	    'password' => [
	      'label' => 'Password',
	      'rules' => 'required|min_length[6]|max_length[16]'
	    ]
	  ])) {
	    return redirect()->to('/login')->withInput();
	  }
	  
	  $username = $this->request->getVar('username');
	  $password = $this->request->getVar('password');
	  
	  $user = $this->users->getUsername($username);
	  
	  if($user == null) {
	    $this->_pesan('username kamu belum terdaftar!', 'error');
	    return redirect()->to('/login')->withInput();
	  }
	  
	  if(!password_verify($password, $user['password'])) {
	    $this->_pesan('password kamu salah!', 'error');
	    return redirect()->to('/login')->withInput();
	  }
	  
	  if($user['status_id'] !== 1)
	  {
	    $this->_pesan('sepertinya akun kamu belum/tidak aktif, silahkan hubungi 
      administrator untuk mengaktifkan akun kamu kembali', 'error');
      
      return redirect()->to('/login')->withInput();
	  }
	  
	  session()->set([
      'username'  => $user['username'],
      'level_id'  => $user['level_id']
	  ]);
	  
	  $this->_pesan('selamat datang administrator');
	  return redirect()->to('/home');
	}
	
	public function logout()
	{
	  session()->remove(['username','status_id','level_id']);
	  $this->_pesan('selamat anda berhasil logout!');
	  return redirect()->to('/login');
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