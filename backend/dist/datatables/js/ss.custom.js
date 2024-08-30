$(document).ready(function () {
        var table = $('.example').DataTable({
            "aaSorting": [],           
            rowReorder: {
            selector: 'td:nth-child(2)'
            },
            //responsive: 'false',
            dom: '<"row justify-between g-2 with-export"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"Bl>>><t>>ip',
			"language": {
              search: "",
              searchPlaceholder: "Type in to Search",
              lengthMenu: "<span class='d-none d-sm-inline-block'>Show</span><div class='form-control-select'> _MENU_ </div>",
              info: "_START_ -_END_ of _TOTAL_",
              infoEmpty: "0",
              infoFiltered: "( Total _MAX_  )",
              paginate: {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Prev"
              }
            },
            buttons: [

                {
                    extend: 'copyHtml5',
                    text: '<em class="icon ni ni-copy"></em>',
                    titleAttr: 'Copy',
                    title: $('.download_label').html(),
                     exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
                },

                {
                    extend: 'excelHtml5',
                    text: '<em class="icon ni ni-file-xls"></em>',
                    titleAttr: 'Excel',
					className: "btn-xls text-success",
                    title: $('.download_label').html(),
                     exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
                },

                {
                    extend: 'csvHtml5',
                    text: '<i class="fa fa-file-csv"></i>',
                    titleAttr: 'CSV',
                    title: $('.download_label').html(),
                     exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
                },

         

                {
                  extend:    'pdf',
                  text:      '<em class="icon ni ni-file-pdf"></em>',
                  titleAttr: 'PDF',
                  className: "btn-pdf text-danger",
                  title: $('.download_label').html(),
                    exportOptions: {
                      
                      columns: ["thead th:not(.noExport)"]
                    },
  
              },


                {
                    extend: 'print',
                    text: '<em class="icon ni ni-printer"></em>',
                    titleAttr: 'Print',
					className: "text-primary",
                    title: $('.download_label').html(),
                 customize: function ( win ) {

                    $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                    $(win.document.body).find('td').addClass('display').css('text-align', 'left');
                    $(win.document.body).find('table').addClass('display').css('font-size', '14px');
                    // $(win.document.body).find('table').addClass('display').css('text-align', 'center');
                    $(win.document.body).find('h1').css('text-align', 'center');
                },
                     exportOptions: {
                      stripHtml:false,
                    columns: ["thead th:not(.noExport)"]
                  }
                },

                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Columns',
                    title: $('.download_label').html(),
                    postfixButtons: ['colvisRestore']
                },
            ]
        });
    });


/*--dropify--*/
$(document).ready(function(){
                // Basic
                $('.filestyle').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('filestyle')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
/*--end dropify--*/

/*--nprogress--*/
 $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
/*--nprogress--*/    
// _selector, // selector  class of table
// _url, // url is url of controller where data to be fetch
// params={}, is parameter of post method
// rm_export_btn=[], // var rm_export_btn = ["btn-pdf"] //"btn-copy","btn-excel","btn-csv","btn-pdf","btn-print" // btn-all
// pageLength=100, //per page data
// aoColumnDefs=[{ "bSortable": false, "aTargets": [ -1 ] ,'sClass': 'dt-body-right'}],
// searching=true,
// aaSorting=[],
// dataSrc="data" it is array source of data


   function initDatatable(_selector,_url,params={},rm_export_btn=[],pageLength=100,aoColumnDefs=[{ "bSortable": false, "aTargets": [ -1 ] ,'sClass': 'dt-body-right'}],searching=true,aaSorting=[],dataSrc="data"){
        if ($.fn.DataTable.isDataTable('.'+_selector)) { // if exist datatable it will destrory first
         $('.'+_selector).DataTable().destroy();
       }
        table= $('.'+_selector)
    .on( 'preInit.dt', function (e, settings ) {

     var api = new $.fn.dataTable.Api( settings );
     $.each(rm_export_btn, function(key, expt_select) {
     if(expt_select === "btn-all"){
       api.buttons().remove();

     }else{
       api.buttons('.'+expt_select).remove();

     }
    });

    }).DataTable({
        // "scrollX": true,
		
       dom: '<"row justify-between g-2 with-export"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"Bl>>><t>>ip',
         //lengthMenu: [[100, -1], [100, "All"]],

          buttons: [
            {
                extend:    'copy',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                 className: "btn-copy",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
            },
            {
                extend:    'excel',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                className: "btn-excel text-success",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
            },
            {
                extend:    'csv',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                className: "btn-csv",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
            },
            {
                extend:    'pdf',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                className: "btn-pdf text-danger",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  },

            },
            {
                extend:    'print',
                text: '<em class="icon ni ni-printer"></em>',
                titleAttr: 'Print',
                className: "text-primary",
                title: $('.'+_selector).data("exportTitle"),
                customize: function ( win ) {

                    $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                    $(win.document.body).find('table').addClass('display').css('font-size', '14px');
                     $(win.document.body).find('td').addClass('display').css('text-align', 'left');
                    $(win.document.body).find('h1').css('text-align', 'center');
                },
                exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                    
                  }

            }
        ],
      
         // "scrollY":        "320px",
         
            "language": {
              search: "",
              searchPlaceholder: "Type in to Search",
              lengthMenu: "<span class='d-none d-sm-inline-block'>Show</span><div class='form-control-select'> _MENU_ </div>",
              info: "_START_ -_END_ of _TOTAL_",
              infoEmpty: "0",
              infoFiltered: "( Total _MAX_  )",
              paginate: {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Prev"
              }
            },
        "pageLength": pageLength,
        "searching": searching,
        "aaSorting": aaSorting, // default sorting [ [0,'asc'], [1,'asc'] ]
        "aoColumnDefs": aoColumnDefs, //disable sorting { "bSortable": false, "aTargets": [ 1,2 ] }
        "processing": true,
        "serverSide": true,

        "ajax":{
        "url": baseurl+_url,
        "dataSrc": dataSrc,
        "type": "POST",
        'data': params,
     }
     
    });
    }

   function emptyDatatable(_selector,dataSrc="data"){
          
        $('.'+_selector).DataTable({
        "searching": false,
        "processing": true,
        "paging":   false,
        "ordering": false,
        "info":     true,
        "ajax": {
            "url": base_url+'backend/json-files/datatable_empty.json',
            "dataSrc": dataSrc
        }
    });
    }