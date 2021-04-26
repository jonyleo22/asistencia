$(document).ready(function () {
    $('#tabla-usuarios').DataTable();
});

$(document).ready(function () {
    $('#tabla-informe').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        "ordering": false,
        "pageLength": 50,
        mark: true,
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
                pageSize: 'LEGAL',
                download: 'open',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
            },
        ],
        columnDefs: [{
            visible: false
        }],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });
});
