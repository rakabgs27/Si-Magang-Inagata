
$(document).ready(function() {
    
    $('#tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: kurikulum,
        },
        columns: [
            {
                data: 'kategori',
                name: 'kategori',
                // render: function(data, type, full, meta) {
                //     return "<img src={{ URL::to('/') }}/img/" +
                //      data + " width='100'\
                //     class='img-thumbnail' />"
                // },
                orderable: false,
            },
            {
            data: 'aksi',
            name: 'aksi'
             },
        ]
    })

   

  
})

    function tambah() {
        $(document).on('click', '#upload', function() {
            $('#edit').remove();
            $.ajax({
                url: kstore,
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    $('#tabel').DataTable().ajax.reload();
                }
            })
        })
    }
    
    $(document).on('click', '.hapus', function() {
         let id = $(this).attr('id');
        $.ajax({
           url: hapus,
           type: "post",
           data: {
               id: id,
               "_token": token,
           },
           success: function(params) {
            $('#tabel').DataTable().ajax.reload();
           }
        })
    })



