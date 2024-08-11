<h1>WELCOME</h1>
@foreach ($posts as $post )
<a href="{{route('posts.show',$post->id)}}"><h2>{{$post->title}}</h2></a><hr> 
@endforeach
