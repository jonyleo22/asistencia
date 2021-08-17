$(document).ready(function () {
    $('#tabla-siap').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'print',
                autoPrint: false,
                text: 'Imprimir',
                title: 'Tesoreria de la Provincia de Misiones',
                messageTop: 'Listado de asistencias',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Tesoreria de la Provincia de Misiones',
                messageTop: 'Listado de asistencias',
                orientation: 'landscape',
                pageSize: 'A4',
                download: 'open',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
            },
        ],
    });
});
