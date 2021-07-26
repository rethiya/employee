var oTable = $('#employee-datatable').DataTable({
    iDisplayLength: 25,
    lengthMenu: [[6, 10, 25, 50, 100, 150], [6, 10, 25, 50, 100, 150]],
    serverSide: true,
    processing: true,
    "bFilter" : false,
    bSort: false,
    dom: 'Blfrtip',
    buttons: [      
        {
            extend: 'excelHtml5',
            title: 'Customer',
            text:'Export to Excel' ,
            className: 'btn btn-success btn-xs mb-1',
            exportOptions: {
                columns: [0,1,2,3,4,5,6]
            }
        },
    ],
    "language": {
    "processing": "Please wait...",
    "infoFiltered": ""
    },
    "order": [[0, "ASC" ]],
    "searching": true,
    ajax: {
        url:'/list-employee',
        dataType: "json",
        type: "POST",
        data:  function (d){
          d._token = $('input[name=_token]').val();
        }
    },
    createdRow: function ( row, data, index ) {

    },
    initComplete: function(settings, json) {

    },
    drawCallback: function() {

    },
    columns: [
        // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'id', name: 'id'},  
        {data: 'name', name: 'name'},      
        {data: 'age', name: 'age'},   
        {data: 'gender', name: 'gender'},
        {data: 'address', name: 'address'},
        {data:'position', name: 'position'},
        {data: 'created_at', name: 'created_at'},
        {data: 'actions', name: 'actions', orderable: false, searchable: false}
    ]
});