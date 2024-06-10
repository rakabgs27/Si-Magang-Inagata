//const { update } = require("lodash");

$(document).ready(function(){
    isi();
    $('#level').select2({
        dropdownParent: $('#exampleModal')
    });
})

function kurik()
{
    event.preventDefault();
    $.ajax({
        url: kur,
        type: "get",
        success: function (data){
            $('#konten').html(data);
        },
    })
}


function isi() {
    $('#tabel1').DataTable({
        serverside: true,
        responsive: true,
        ajax: {
            url: data,
        },
        columns: [
            {data: 'nama', name: 'nama'},
            {data: 'universitas', name: 'universitas'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            // {data: 'level', name: 'level'},
            {data: 'aksi', name: 'aksi'},
        ]
    })
}

$('#simpan').on('click', function() {
    if ($(this).text() === 'edit') {
       edit();
    }else{
     tambah();
    }
})


$(document).on('click', '.edit', function() {
    let id = $(this).attr('id');
    $('#tambah').click();
    $('#simpan').text('edit');
    $.ajax({
        url: update,
        type: 'post',
        data: {
            id: id,
            _token: token,
        },
        success: function(res){
            $('#id').val(res.data.id_member);
            $('#nama').val(res.data.nama);
            $('#universitas').val(res.data.universitas);
            $('#name').val(res.data.name);
            $('#email').val(res.data.email).prop('disabled', true);
            $('#password').val(null).prop('disabled', true);
            $('#level').val(res.data.level);
            
        }
    })

});

function tambah()
{
    $('#simpan').on('click', function() {
    $.ajax({
        url: store,
        type: 'post',
        data: {
            nama: $('#nama').val(),
            universitas: $('#universitas').val(),
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            level: $('#level').val(),
            "_token": token,
        },
        success: function(res) {
            console.log(res);
            alert(res.text);
            $('#tutup').click();
            $('#tabel1').DataTable().ajax.reload();
            $('#nama').val(null);
            $('#universitas').val(null);
            $('#name').val(null);
            $('#email').val(null);
            $('#password').val(null);
            $('#level').val(null);
        },
        error: function(xhr) {
            alert(xhr.responJson.text);
        }
    })
})
}

function edit() {
$('#simpan').on('click', function() {
    $.ajax({
        url: mupdate,
        type: 'post',
        data: {
            id: $('#id').val(),
            nama: $('#nama').val(),
            universitas: $('#universitas').val(),
            name: $('#name').val(),
            level: $('#level').val(),
            "_token": token,
        },
        success: function(res) {
            console.log(res);
            alert(res.text);
            $('#tutup').click();
            $('#tabel1').DataTable().ajax.reload();
            $('#nama').val(null);
            $('#universitas').val(null);
            $('#name').val(null);
            $('#email').val(null);
            $('#password').val(null);
            $('#level').val(null);
            $('#simpan').text('save');
        },
        error: function(xhr) {
            alert(xhr.responJson.text);
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
            "_token" : token
        },
        success: function(params){
            alert(params.text)
            $('#tabel1').DataTable().ajax.reload();
        }
    })
})
