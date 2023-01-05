<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{isset($title) ? $title : 'Title tidak diatur' }}</title>
    <script src="https://kit.fontawesome.com/a284c48079.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h1>
                    <span>PUSKESMAS BERUNTUNG RAYA</span>
                </h1>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ url('dashboard/dashboard') }}"
                            class="{{ request()->is('dashboard/dashboard/*')?'active' :'' }}">
                            <span class="las la-tachometer-alt"></span>
                            <span>dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pegawai/pegawai') }}"
                            class="{{ request()->is('pegawai/pegawai*','pegawai/*')?'active' :'' }}">
                            <span class="las la-user-friends"></span>
                            <span>Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pasien/pasien') }}"
                            class="{{ request()->is('pasien/pasien','pasien/*')?'active' :'' }}">
                            <span class="las la-users"></span>
                            <span>Pasien</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('medis/medis') }}" class="{{ request()->is('medis/*')?'active' :'' }}">
                            <span class="las la-book-medical"></span>
                            <span>Rekam Medis</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('obat/obat')}}" class="{{ request()->is('obat/*')?'active' :'' }}">
                            <span class="las la-capsules"></span>
                            <span>Obat</span>
                        </a>
                    </li>
                    {{-- <li>
                    <a href="#" class="">
                        <span class="las la-notes-medical"></span>
                        <span>Resep</span>
                    </a>
                </li> --}}
                </ul>
            </div>
        </div>
        <div class="main-content">
            <header>
                <h1>
                    <label for="nav-toggle">
                        <span class="las la-bars" style="color: black"></span>
                    </label>
                    {{
        
                    isset($title) ? $title : 'Title tidak diatur'
                    
                    }}
                </h1>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </header>
            <main>
                @yield('content')
            </main>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function () {

                $("#selectObat").select2({
                    placeholder: 'Pilih nama Obat',
                    ajax: {
                        url: "{{route('obat.index')}}",
                        processResults: function({data }) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        id: item.nm_obat,
                                        text: item.nm_obat
                                    }
                                })
                            }
                        }
                    }
                });

                $("#selectObat").change(function () {
                    let nm_obat = $('#selectObat').val();

                    $("#selectid").select2({
                        placeholder: 'Pilih Id bat',
                        ajax: {
                            url: "{{url('selectobat')}}/" + nm_obat,
                            processResults: function ({
                                data
                            }) {
                                return {
                                    results: $.map(data, function (item) {
                                        return {
                                            id: item.id,
                                            text: item.id
                                        }
                                    })
                                }
                            }
                        }
                    });
                });
            });
        </script>
</body>

</html>