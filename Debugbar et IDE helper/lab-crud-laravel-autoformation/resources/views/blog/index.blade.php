{{--  use the template  base and fill the section name content  with h1 as a content  --}}
{{--  lesaccolades font de l'echapement pour eviter le probleme d'injection   --}}
{{--  des recourcis @foreach($variable as $key => $value) @endforeach  --}}
{{--  methode magique links() permet de generer des liens --}}
@extends('base') 
@section('title', 'hi its me')


    @section('content')
    <h1>mon blog y here</h1>
  
        
  


 @dump($posts)

 @foreach($posts as $post )
    <article >
        <h2> {{ $post->title }}</h2>
        <p>
            {{ $post->content }}
        </p>
        <p>  
            <a href="{{route ('blog.show',['slug'=>$post ->slug ,'post'=>$post->id]) }}" class="btn btn-primary">lire la suite </a>
        </p>
    </article>
 @endforeach

  {{$posts->links()}}
 
    @endsection()

