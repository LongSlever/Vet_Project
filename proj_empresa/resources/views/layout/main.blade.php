<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Clinic</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" href="style.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <div class="container">
        <nav class="navbar navbar-expand-lg navbar-config">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img style="width: 150px; border-radius: 150px" src="{{ asset('img/logoaisa.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col justify-content-center">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/client">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/pet">Your Pets</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="/procedure"-1" aria-disabled="true">Procedures</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="/vet"-1" aria-disabled="true">Vets</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="/consultation"-1" aria-disabled="true">Consultations</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="/report"-1" aria-disabled="true">Reports</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

            @hasSection('body')
                @yield('body')
            @endif


  </div>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

   @component('layout.footer')
      @endcomponent

</body>
</html>
