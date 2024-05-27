<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} - Register</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
    @stack('customStyle')
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8
                        offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="first_name">Nama Lengkap</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Lengkap" autofocus>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Masukkan Alamat Email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nomor WhatsApp</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </div>
                                                </div>
                                                <input name="nomor_hp" type="number" value="{{ old('nomor_hp') }}"
                                                    class="form-control phone-number
                                                    @error('nomor_hp') is-invalid @enderror">
                                            </div>
                                            @error('nomor_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="nama_instansi">Nama Instansi</label>
                                                <input name="nama_instansi" type="text"
                                                    value="{{ old('nama_instansi') }}"
                                                    class="form-control @error('nama_instansi') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Instansi">
                                                @error('nama_instansi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="nama_jurusan">Nama Jurusan/Prodi</label>
                                                <input name="nama_jurusan" type="text"
                                                    value="{{ old('nama_jurusan') }}"
                                                    class="form-control @error('nama_jurusan') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Jurusan">
                                                @error('nama_jurusan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input name="nim" type="text" value="{{ old('nim') }}"
                                                    class="form-control @error('nim') is-invalid @enderror"
                                                    placeholder="Masukkan NIM">
                                                @error('nim')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label>Link CV</label>
                                                <small class="text-muted" style="display: block;">Masukkan Link CV dari Google Drive</small>
                                                <input name="link_cv" type="text" value="{{ old('link_cv') }}"
                                                    class="form-control @error('link_cv') is-invalid @enderror"
                                                    placeholder="Masukkan Link CV">
                                                @error('link_cv')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label>Link Portofolio</label><br>
                                                <small class="text-muted" style="display: block;">Masukkan Link Porto dari Google Drive</small>
                                                <input name="link_porto" type="text"
                                                    value="{{ old('link_porto') }}"
                                                    class="form-control @error('link_porto') is-invalid @enderror"
                                                    placeholder="Masukkan Link Porto">
                                                @error('link_porto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="form-group">
                                                <label>Divisi</label>
                                                <select
                                                    class="form-control select2
                                                    @error('divisi_id') is-invalid @enderror"
                                                    id="divisi_id" name="divisi_id" data-placeholder="Pilih Divisi">
                                                    <option value=""></option>
                                                    @foreach ($divisi as $divisi2)
                                                        <option value="{{ $divisi2->id }}">
                                                            {{ $divisi2->nama_divisi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('divisi_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
