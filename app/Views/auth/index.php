<?= $this->extend('layout/template_auth') ?>

<?= $this->section('content') ?>
<body class="hold-transition register-page">
<div class="register-box mb-4">
  <div class="register-logo mt-3 text-comprehension">
    <a href="/"><b>Sekolah</b>Ku</a>
  </div>
  
  <div class="card text-negotiate">
    <div class="card-body register-card-body">
      <p class="text-center">silahkan login terlebih dahulu untuk dapat menggunakan fitur-fitur di <b>sekolahku</b></p>
      <img src="/assets/image/auth/login.png" width="100%">
      
      <form action="/login/proses-login" method="post">
        <?= csrf_field() ?>
        
        <div class="input-group mt-3 <?= ($valid->hasError('username') ? 'is-invalid' : '') ?>">
          <input type="text" class="form-control <?= ($valid->hasError('username') ? 'is-invalid' : '') ?>" 
          placeholder="Username"
          name="username" value="<?= old('username') ?>" autocomplete="off">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fw fa-user-check"></span>
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
              <span class="fas fa-fw fa-eye"></span>
            </div>
          </div>
        </div>
        <div class="invalid-feedback mt-1 ml-1"><?= $valid->getError('password') ?></div>
        
        <div class="icheck-primary mt-3">
          <input type="checkbox" id="syaratketentuan" name="syaratketentuan" value="true">
          <label for="syaratketentuan">
            <span class="font-weight-light">Saya setuju dengan <a href="#">syarat & ketentuan</a> <b>SekolahKu</b> </span>
          </label>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block my-3 confirm_terms" disabled>Login</button>
      </form>
      
      <div class="text-center">
        <a href="/register">saya belum memiliki akun!</a>
      </div>
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?= $this->endSection() ?>