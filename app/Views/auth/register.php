<?= $this->extend('layout/template_auth') ?>

<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/assets/css/auth/register.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<body class="hold-transition register-page">
<div class="register-box mb-4">
  <div class="register-logo mt-5 text-comprehension">
    <a href="/"><b>Sekolah</b>Ku</a>
  </div>

  <div class="card text-negotiate">
    <div class="card-body register-card-body">
      
      <div class="alert alert-success" role="alert">
        <h5 class="alert-heading">Perhatian:</h5>
        <p>Harap isi data pada formulir berikut dengan data yang sebenar-benarnya.</p>
        <p>
          Data yang kamu isi harus bisa dipertanggungjawabkan kebenarannya, sesuai dengan
          <a href="#" class="text-decoration-none font-weight-bold">Syarat dan Ketentuan</a> yang berlaku.
        </p>
      </div>
      
      <img src="/assets/image/auth/register.png" width="100%" class="d-none">
      
      <form action="register/proses-register" method="post">
        <?= csrf_field() ?>
        
        <h5 class="text-primary mt-4">Data Pribadi:</h5>
        
        <!-- siswa -->
        <div class="input-group mt-3 <?= ($valid->hasError('nama') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('nama') ? 'is-invalid' : '') ?>" 
          placeholder="Nama Lengkap"
          name="nama" value="<?= old('nama') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-fw fa-user"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('nama') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('nisn') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('nisn') ? 'is-invalid' : '') ?>" 
          placeholder="NISN"
          name="nisn" value="<?= old('nisn') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-address-card"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('nisn') ?></div>
        
        <?php $kelas = ['X','XI','XII']; ?>
        <div class="input-group mt-3 <?= ($valid->hasError('kelas') ? 'is-invalid' : '') ?>">
          <select name="kelas" class="form-control custom-select <?= ($valid->hasError('kelas') ? 'is-invalid' : '') ?>">
            <?php if(!old('kelas') || old('kelas') == '') : ?>
              <option value="">Pilih Kelas</option>
            <?php else : ?>
              <option value="<?= old('kelas') ?>">Kelas <?= old('kelas') ?></option>
            <?php endif; ?>
            
            <?php foreach ($kelas as $k) : ?>
              <?php if(old('kelas') !== $k) : ?>
                <option value="<?= $k ?>">Kelas <?= $k ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-bell"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('kelas') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('jurusan') ? 'is-invalid' : '') ?>">
          <select name="jurusan" class="form-control custom-select <?= ($valid->hasError('jurusan') ? 'is-invalid' : '') ?>">
            <?php if(!old('jurusan') || old('jurusan') == '') : ?>
              <option value="">Pilih Jurusan</option>
            <?php else : ?>
              <option value="<?= old('jurusan') ?>"><?= old('jurusan') ?></option>
            <?php endif; ?>
            
            <?php foreach ($dt_jurusan as $jurusan) : ?>
              <?php if(old('jurusan') !== $jurusan['jurusan']) : ?>
                <option value="<?= $jurusan['jurusan'] ?>"><?= $jurusan['jurusan'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-book"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('jurusan') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('tmp_lahir') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('tmp_lahir') ? 'is-invalid' : '') ?>" 
          placeholder="Tempat Lahir"
          name="tmp_lahir" value="<?= old('tmp_lahir') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-globe-asia"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('tmp_lahir') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('tgl_lahir') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control datepicker <?= ($valid->hasError('tgl_lahir') ? 'is-invalid' : '') ?>" 
          placeholder="Tanggal Lahir" data-year="<?= date('Y') ?>"
          name="tgl_lahir" value="<?= old('tgl_lahir') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-calendar-alt"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('tgl_lahir') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('no_hp') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('no_hp') ? 'is-invalid' : '') ?>" 
          placeholder="No. Hp"
          name="no_hp" value="<?= old('no_hp') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-phone"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('no_hp') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('alamat') ? 'is-invalid' : '') ?>">
          <textarea name="alamat" rows="3" class="form-control 
          <?= ($valid->hasError('alamat') ? 'is-invalid' : '') ?>" placeholder="Alamat Lengkap"
          autocomplete="off"><?= old('alamat') ?></textarea>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-home"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('alamat') ?></div>
        
        <h5 class="mt-3 text-primary">Data Akun:</h5>
        <!-- users -->
        <div class="input-group mt-3 <?= ($valid->hasError('username') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('username') ? 'is-invalid' : '') ?>" 
          placeholder="Username"
          name="username" value="<?= old('username') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-fw fa-envelope"></i>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('username') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('password') ? 'is-invalid' : '') ?>">
          <input type="password" class="form-control <?= ($valid->hasError('password') ? 'is-invalid' : '') ?>" 
          placeholder="Password" id="password"
          name="password" value="<?= old('password') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text iconlock">
              <span class="fa fa-fw fa-eye"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('password') ?></div>
        
        <div class="input-group mt-3 <?= ($valid->hasError('password1') ? 'is-invalid' : '') ?>">
          <input type="password" class="form-control <?= ($valid->hasError('password1') ? 'is-invalid' : '') ?>" 
          placeholder="Konfirmasi Password" id="password1"
          name="password1" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-fw fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('password1') ?></div>
        
        <?php
          $first = substr(rand(), 0, 3);
          $last = substr(rand(), 0, 1);
          
          $result = $first + $last;
        ?>
        <input type="hidden" name="resultCaptcha" value="<?= $result ?>">
        
        <button class="btn btn-warning btn-block mt-3" id="captcha_code" disabled>
          <?= $first.' + '.$last.' = ?' ?>
        </button>
        
        <div class="input-group <?= ($valid->hasError('captcha') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('captcha') ? 'is-invalid' : '') ?>"
          placeholder="Hasil Penjumlahan" id="captcha" name="captcha" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-fw fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('captcha') ?></div>
        
        <div class="icheck-primary mt-3">
          <input type="checkbox" id="syaratketentuan" name="syaratketentuan" value="true">
          <label for="syaratketentuan">
            <span class="font-weight-light">Saya setuju dengan <a href="#">syarat & ketentuan</a> <b>SekolahKu</b> </span>
          </label>
        </div>
        
        <!-- modal konfirmasi register -->
        <div class="modal fade" id="modalConfirmRegister" tabindex="-1" role="dialog" 
        aria-labelledby="modalConfirmRegisterLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modalConfirmRegisterLabel">Apakah kamu sudah yakin?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="/assets/image/fh2cj12864.png" width="100%">
                <p>pastikan data kamu sudah diisi dengan benar semua, kemudian mohon diingat baik-baik untuk
                username serta password kamu.</p>
                <p>jika terdapat kendala yang tidak dimengerti segera hubungi admin <a href="/">SekolahKu</a></p>
                
                <p class="text-danger"><i>"jangan pernah membagikan akun kamu kepada siapapun, 
                termasuk kepada admin <a href="/sekolahku" class="text-danger font-weight-bold">SekolahKu</a>"</i></p>
                
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-paper-plane"></i> Register
                </button>
                
              </div>
            </div>
          </div>
        </div>
        
        <button type="button" id="btn_confirm_register" class="btn btn-primary 
        btn-block my-3 confirm_terms" disabled>
          Register
        </button>
      </form>
      
      <div class="text-center">
        <a href="/login">saya sudah memiliki akun!</a>
      </div>
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?= $this->endSection() ?>