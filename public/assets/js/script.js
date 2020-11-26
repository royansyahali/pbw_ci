
$(document).ready(function () {
  $('#cancel').click(function(){
    window.history.go(-1);
  });
  $('table').DataTable({
    // info:false
    dom: '<"row"<"col-2"l><"col-7"B><"col-3"f><"col-12"t><"col-6"i><"col-6"p>>',
    buttons: [
      // 'colvis',
      {
        extend: 'colvis',
        text: '<i class="fa fa-columns"> Column Visibility</i>',
      },
      {
        extend: 'copy',
        exportOptions: {
          columns: ':visible'
        },
        text: '<i class="fa fa-files-o"> Copy</i>',
      },
      {
        extend: 'pdf',
        exportOptions: {
          columns: ':visible'
        },
        text: '<i class="fa fa-file-pdf-o"> PDF</i>',
        download: 'open'
      },
      {
        extend: 'csv',
        exportOptions: {
          columns: ':visible'
        },
        text: '<i class="fa fa-file-o"> CSV</i>'
      },
      {
        extend: 'excel',
        exportOptions: {
          columns: ':visible'
        },
        text: '<i class="fa fa-file-excel-o"> Excel</i>',
        
      },
      {
        extend: 'print',
        exportOptions: {
          columns: ':visible'
        },
        text: '<i class="fa fa-print"> Print</i>'
      },
    ]

  });

});CSV