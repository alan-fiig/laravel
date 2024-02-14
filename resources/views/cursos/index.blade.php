@extends ('layouts.plantilla')

@section('title', 'Index')

@section('content')
    <h1>Bienvenido a los cursos</h1>
    <p>Título: <?php echo $title; ?></p>
    <p>Descripción: <?php echo $description; ?></p>
@endsection
