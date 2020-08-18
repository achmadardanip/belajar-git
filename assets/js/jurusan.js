$(document).ready(function() {
    var $button = $('#button');
    const $daftar_jurusan = $('#tablejurusan');
    $button.click(function () {
        alert('getSelections: ' + JSON.stringify($daftar_jurusan.bootstrapTable('getSelections')))
    })
    $daftar_jurusan.bootstrapTable( {
        ...config,
        detailFormatter:detailFormatter,
        exportOptions:{fileName: "Daftar Jurusan"},
        columns: [
            {
                radio:true,
            },
            {
                title:"No",
                formatter:numberFormatter,
                sortable:true,
            },
            {
                title:"Kode Jurusan",
                field:"kode_jurusan",
                sortable:true,
            },
            {
                title:"Nama Jurusan",
                field:"nama_jurusan",
                sortable:true,
            },
            {
                title:"Aksi",
                field:"id",
                sortable:false,
                searchable:false,
                forceHide:true,
                formatter:actionFormatter,
                class:"text-center",
            },
        ]
    })

    function numberFormatter(value, row, index){
        var options = $('#tablejurusan').bootstrapTable('getOptions')
        // alert(options["pageNumber"] + " " + options["pageSize"])
    
        var formula = 0
        if(!isNaN(options['pageSize'])) {
            formula = ((options["pageNumber"]-1) * options["pageSize"])
        }
        // console.log(options["pageSize"], options["pageNumber"], index, row)
        return index+1+formula;
    
    }
    function checkboxFormatter(value, row, index) {
        return false;
    }

    function detailFormatter(index, row) {
        var html = []
        const excludeType = ["undefined", "object"];
        $.each(row, function (key, value) {
        if(!excludeType.includes(typeof value)) {
          html.push('<p><b>' + key + ':</b> ' + value + '</p>')
        }
        })
        return html.join('')
    }
    
    
});
