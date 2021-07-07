<div class="otherarticles">
    <div class="otherarticles-body">
        @foreach ($diaries as $diary)
        <article class="otherarticles-item">
            <a href="{{ route('diary.show', ['diary' => $diary->id]) }}"></a>
            <h2 class="otherarticles-item-title">{{ $diary->getTitle() }}</h2>
            <p class="otherarticles-item-date">{{ $diary->date->format('Y/m/d') }}</p>
            <p class="otherarticles-item-contents">{!! nl2br(e($diary->contents)) !!}</p>
        </article>
        @endforeach
    </div>
</div>
