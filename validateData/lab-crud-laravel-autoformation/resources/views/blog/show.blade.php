{{--  use the template  base and fill the section name content  with h1 as a content  --}}
{{--  lesaccolades font de l'echapement pour eviter le probleme d'injection   --}}
{{--  des recourcis @foreach($variable as $key => $value) @endforeach  --}}
{{--  methode magique links() permet de generer des liens --}}
@extends('base') 
@section('title', $post->title)
    @section('content')
    <article >
        <h1> {{ $post->title }}</h1>
        <p>
            {{ $post->content }}
        </p>
      
    </article>



 
    @endsection()

