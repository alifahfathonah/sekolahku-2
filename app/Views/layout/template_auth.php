<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SekolahKu | <?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/adminlte/dist/css/adminlte.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/sweetalert2/sweetalert2.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/select2/css/select2.css">
  <link rel="stylesheet" href="/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DateRangePicker -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="/assets/css/fonts.css">
</head>
  
  <?= $this->renderSection('content') ?>
  
  <div class="d-none" id="flashdata"
  data-title="<?= session()->getFlashdata('title') ?>" 
  data-pesan="<?= session()->getFlashdata('pesan') ?>"
  data-type="<?= session()->getFlashdata('type') ?>">
  </div>

  <!-- jQuery -->
  <script src="/assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/assets/adminlte/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="/assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Select2 -->
  <script src="/assets/adminlte/plugins/select2/js/select2.js"></script>
  <!-- Moment -->
  <script src="/assets/adminlte/plugins/daterangepicker/moment.min.js"></script>
  <!-- DateRangePicker -->
  <script src="/assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Auth -->
  <script src="/assets/js/auth.js"></script>
</body>
</html>