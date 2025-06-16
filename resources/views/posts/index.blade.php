<h1>All Posts</h1>

<ul>
@foreach($posts as $post)
    <li>{{ $post->title }} - {{ $post->content }}</li>
@endforeach
</ul>

<form method="POST" action="/posts">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>
    <button type="submit">Create</button>
</form>
