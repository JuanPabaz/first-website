@vite('resources/css/home.css')
@extends('layout')

@section('content')
<div class="home-container">
    <div class="home-content">
        <h1>Creando historias, contando historias.</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Nemo necessitatibus, facere laborum officiis voluptatibus 
            ut iure provident ex praesentium et! Dolor natus quo 
            accusantium nesciunt deserunt officia fugiat eius veritatis?
        </p>
        <div class="home-content-buttons">
            <button>Escribenos</button>
            <button>Siguenos</button>
        </div>
    </div>
    <div class="home-image">
        <img src="{{ asset('images/project-vuotta.jpeg') }}" alt="">
    </div>
</div>
@endsection