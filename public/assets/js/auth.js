$(document).ready(function() {
  $('.iconlock').click(function() {
    let password = $('#password').attr('type');
    if(password == 'password') {
      $(this).html(`<i class="fas fa-fw fa-eye-slash"></i>`);
      $('#password, #password1').attr('type','text');
    } else {
      $(this).html(`<i class="fas fa-fw fa-eye"></i>`);
      $('#password, #password1').attr('type','password');
    }
  });
  
  $('#syaratketentuan').click(function() {
    if($(this).val() == 'true') {
      $('.confirm_terms').removeAttr('disabled');
      $(this).val('false');
    } else {
      $('.confirm_terms').attr('disabled','true');
      $(this).val('true');
    }
  });
  
  let title = $('#flashdata').data('title');
  
  if(title) {
    Swal.fire({
      title: title,
      text: $('#flashdata').data('pesan'),
      icon: $('#flashdata').data('type'),
    });
  }
  
  let customSelect = $('select.custom-select');
  
  if(customSelect) {
    $(customSelect).select2({
        theme: 'bootstrap4',
    });
  }
  
  let datepicker = $('.datepicker');
  // minimal berumur 13 tahun
  let maxYear = parseInt($(datepicker).data('year') - 13);
  // maksimal berumur 21 tahun
  let minYear = parseInt($(datepicker).data('year') - 21);
  // tahun dimulai dari range maxYear dan minYear
  let startYear = (maxYear + minYear) / 2;

  if(datepicker) {
    $(datepicker).daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minYear: minYear,
      maxYear: maxYear,
      "startDate": `11/11/${startYear}`,
      "opens": "right",
      locale: {
        format: 'DD/MM/YYYY'
      },
    });
  }
  
  $('#confirm_register').click(function(e) {
    e.preventDefault();
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    });
    
  });
});