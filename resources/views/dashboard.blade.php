<h1>WELCOME</h1>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
    Log Out
</a>

@foreach ($posts as $post )
    <a href="{{ route('posts.show', $post->id) }}"><h2>{{ $post->title }}</h2></a>
    <hr> 
@endforeach
