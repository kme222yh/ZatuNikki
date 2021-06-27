<x-app-layout>
    <div class="otherarticles">
        <div class="otherarticles-body">
            @foreach ($diaries as $diary)
            <article class="otherarticles-item">
                <a href="{{ route('view', ['diary' => $diary->id]) }}"></a>
            </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
