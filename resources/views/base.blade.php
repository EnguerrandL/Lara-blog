<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @layer demo{
            button {
                all: unset;
            }
        }

    </style>
</head>
<body>
    <nav class="navbar  bg-primary navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a @class([' nav-link', 'text-white active' => request()->route()->getName() === 'blog.index' ])
                class=" nav-link  " aria-current="page" href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
      
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


    


    
          







    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-lg-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
          <!-- Votre barre latérale ici -->



          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="min-height: 100vh; width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              <span class="fs-4">Gestion du blog</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="{{route('admin.index')}}" class="nav-link active" aria-current="page">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href=""/></svg>
                  Liste des posts
                </a>
              </li>
              <li>
                <a href="{{route('admin.create')}}" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Ajout de posts
                </a>
              </li>
              <li>
                <a href="{{route('admin.create.categories')}}" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                  Gestion de catégories
                </a>
              </li>
              <li>
                <a href="{{route('admin.tag')}}" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                  Gestion de tags
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
        <div class="col-md-9 col-lg-10">
          <div class="container">
            <!-- Votre contenu ici -->







            <div class="container">
              {{-- @dump(request()->route()->getName()) --}}
          
              @if(session('success'))
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