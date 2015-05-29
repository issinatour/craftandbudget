$(document).ready(function() {

    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    console.log(base_url);
    $('.dataTables-example').dataTable({
        responsive: true,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": base_url+'/assets/backtheme/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf'
        }
    });

    /* Init DataTables */
    var oTable = $('#editable').dataTable();

    /* Apply the jEditable handlers to the table */
    oTable.$('td').editable( '../example_ajax.php', {
        "callback": function( sValue, y ) {
            var aPos = oTable.fnGetPosition( this );
            oTable.fnUpdate( sValue, aPos[0], aPos[1] );
        },
        "submitdata": function ( value, settings ) {
            return {
                "row_id": this.parentNode.getAttribute('id'),
                "column": oTable.fnGetPosition( this )[2]
            };
        },

        "width": "90%",
        "height": "100%"
    } );


});

