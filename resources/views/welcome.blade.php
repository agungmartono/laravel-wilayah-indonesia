<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('icon.ico')}}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header">Sampel Data Wilayah Indonesia</div>

                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="province">Provinsi : {{ $provinsi }}</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="kabupaten">Kabupaten : {{ $kabupaten }}</label>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="kecamatan">Kecamatan : {{ $kecamatan }}</label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="desa">Desa : {{ $desa }}</label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="province">Provinsi</label>
                                        <select class="form-control" name="province" id="province">
                                            <option value="" selected disabled>Pilih Provinsi</option>
                                            @foreach ($allProvinsi as $provinsis => $value)
                                            <option value="{{ $provinsis }}">
                                                {{ $value }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="city">Kota</label>
                                        <select class="form-control" name="city" id="city">
                                            <option value="" selected disabled>Pilih Kota</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control" name="kecamatan" id="kecamatan">
                                            <option value="" selected disabled>Pilih Kecamatan</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="desa">Desa</label>
                                        <select class="form-control" name="desa" id="desa">
                                            <option value="" selected disabled>Pilih desa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src={{asset('js/wilayah.js')}}></script>

</body>

</html>
