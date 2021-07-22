<div class="diarylist">
    <div class="diarylist-body">
        @foreach ($diaries as $diary)
        <article class="diarylist-item">
            <a href="{{ route('diary.show', ['diary' => $diary->id]) }}"></a>
            <h2 class="diarylist-item-title">{{ $diary->getTitle() }}</h2>
            <p class="diarylist-item-date">{{ $diary->date->format('Y/m/d') }}</p>
            <p class="diarylist-item-contents">{!! nl2br(e($diary->contents)) !!}</p>
        </article>
        @endforeach
    </div>
</div>
