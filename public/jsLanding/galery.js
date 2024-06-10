
$(document).ready(function() {
    
    isi();

    $(document).on('click', '#upload', function(event) {
        $.ajax({
            url: store,
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            "_token": token,
            success: function(res) {
                let html = "";
                $('#tabel').DataTable().ajax.reload();
            }
        })
    })

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

})
