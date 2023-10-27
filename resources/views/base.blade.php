<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        {{-- <link href="
https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/sketchy/bootstrap.min.css
" rel="stylesheet">  --}}
    <style>
        @layer demo {
            button {
                all: unset;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar  bg-primary navbar-expand-lg ">
        <div class="container-fluid">
            <a @class([
                ' nav-link',
                'text-white active' =>
                    request()->route()->getName() === 'blog.index',
            ]) class="navbar-brand" href="/"><svg xmlns="http://www.w3.org/2000/svg"
                    width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg></a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                  @guest
                    <li class="nav-item ">
                        <a class="nav-link  mr-auto text-white" href="{{ route('auth.login') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                          <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                        </svg></a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item ">
                        
                      <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                        @method('DELETE')
                        @csrf
      
      
                        <button class="text-danger">      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-slash" viewBox="0 0 16 16">
                          <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                        </svg></button>
                        </form>
                      
                
                    </li>
                    @endauth

                </ul>
                
 
            </div>
        </div>



    </nav>


    {{-- @php
          dd(Request::route()->getName())
      @endphp --}}
    {{-- @php 
dd(Request::route()->getPrefix());
@endphp --}}












@auth
    


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <!-- Votre barre latérale ici -->



                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark"
                    style="min-height: 100vh; width: 280px;">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap" />
                        </svg>
                        <span class="fs-4">Accueil du blog</span>
                    </a>
                    <hr>
                    <ul class=" nav nav-pills flex-column mb-auto">
                        <li class="nav-item ">
                            <a @class([
                                ' nav-link',
                                'text-white active' =>
                                    request()->route()->getName() === 'admin.index',
                            ]) href="{{ route('admin.index') }}"
                                class="nav-link text-white" aria-current="page">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="" />
                                </svg>
                                Liste des posts
                            </a>
                        </li>
                        <li>
                            <a @class([
                                ' nav-link',
                                'text-white active' =>
                                    request()->route()->getName() === 'admin.create',
                            ]) href="{{ route('admin.create') }}"
                                class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Ajout de publications
                            </a>
                        </li>
                        <li>
                            <a @class([
                                ' nav-link',
                                'text-white active' =>
                                    request()->route()->getName() === 'admin.create.categories',
                            ]) href="{{ route('admin.create.categories') }}"
                                class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#table" />
                                </svg>
                                Gestion des catégories
                            </a>
                        </li>
                        <li>
                            <a @class([
                                ' nav-link',
                                'text-white active' =>
                                    request()->route()->getName() === 'admin.tag',
                            ]) href="{{ route('admin.tag') }}" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#grid" />
                                </svg>
                                Gestion des tags
                            </a>
                        </li>
                        {{-- <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Customers
                </a>
              </li> --}}
       
                    </ul>

                    <hr>

                </div>
            </div>


            @endauth
            <div class="col-md-9 col-lg-10">
                <div class="container">
                    <!-- Votre contenu ici -->







                    <div class="container">
                        {{-- @dump(request()->route()->getName()) --}}

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}

                            </div>
                        @endif

                        @yield('content')









                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
