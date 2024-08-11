<h1>WELCOME</h1>
@foreach ($users as $user )
<h2>{{$user->name}}=>{{$user->email}}</h2><hr> 
@endforeach
