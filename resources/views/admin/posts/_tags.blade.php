@foreach($post->tags as $tag)
    <span class="badge badge-success">
        {{ $tag->translate(Config('app.locale'))->title }}
    </span>
@endforeach