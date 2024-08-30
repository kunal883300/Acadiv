
 $(document).ready(function() {

     toastr.options = {
         "closeButton": true, // true/false
         "debug": false, // true/false
         "newestOnTop": false, // true/false
         "progressBar": false, // true/false
         "positionClass": "toast-top-right", // toast-top-right / toast-top-left / 
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300", // in milliseconds
         "hideDuration": "1000", // in milliseconds
         "timeOut": "5000", // in milliseconds
         "extendedTimeOut": "1000", // in milliseconds
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }
 });
 
 function successMsg(msg) {
     NioApp.Toast(msg, 'success', {
      position: 'top-right'
    });
 }

function errorMsg(msg) {
     NioApp.Toast(msg, 'success', {
      position: 'top-right'
    });
 }
 
 function infoMsg(msg) {
     NioApp.Toast(msg, 'info', {
      position: 'top-right'
    });
 }
 
 function warningMsg(msg) {
     NioApp.Toast(msg, 'warning', {
      position: 'top-right'
    });
 }
 