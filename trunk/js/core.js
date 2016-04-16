$(document).ready(function () {
    $('#table').DataTable({
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ]

    });

    //for drop down list
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
        '.chosen-select-width': {width: "95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    /* Init DataTables 
     var oTable = $('#table').DataTable();
     
     /* Apply the jEditable handlers to the table 
     oTable.$('td').editable('../example_ajax.php', {
     "callback": function (sValue, y) {
     var aPos = oTable.fnGetPosition(this);
     oTable.fnUpdate(sValue, aPos[0], aPos[1]);
     },
     "submitdata": function (value, settings) {
     return {
     "row_id": this.parentNode.getAttribute('id'),
     "column": oTable.fnGetPosition(this)[2]
     };
     },
     "width": "90%",
     "height": "100%"
     });*/

    $('[data-toggle="tooltip"]').tooltip();
});