
$(document).ready(function(){
    isi();
    $('#id_member').select2({
        dropdownParent: $('#exampleModal')
    });
})

// function isi() {
//     $('#tabel').DataTable({
//         serverside: true,
//         responsive: true,
//         ajax: {
//             url: show,
//         },
//         columns: [
//             {data: 'link', name: 'link'},
//             {data: 'keterangan', name: 'keterangan'},
//             {data: 'nama', name: 'nama'},
//             {data: 'aksi', name: 'aksi'},
//         ]
//     })
// }

function tambah() {
        $(document).on('click', '#simpan', function() {
            $.ajax({
                url: store,
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
            "_token" : token,
        },
        success: function(params){
            $('#tabel').DataTable().ajax.reload();
        }
    })
})

