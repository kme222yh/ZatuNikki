<x-app-layout>
    <div class="otherarticles">
        <div class="otherarticles-body">
            @foreach ($diaries as $diary)
            <article class="otherarticles-item">
                <a href="{{ route('view', ['diary' => $diary->id]) }}"></a>
                <h2 class="otherarticles-item-title">{{ $diary->getTitle() }}</h2>
                <p class="otherarticles-item-date">{{ $diary->date }}</p>
                <p class="otherarticles-item-contents">{!! nl2br(e($diary->contents)) !!}</p>
            </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
