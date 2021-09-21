
$(document).ready(function () {
    $('#tabla-siap2').DataTable({
        dom: 'Bfrtip',
        "ordering": false,
        "pageLength": 50,
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
