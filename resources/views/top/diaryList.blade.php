<div class="diarylist">
    <div class="diarylist-body">
        @if(count($diaries)<=0)
        <div class="diarylist-null">
            <h1 class="diarylist-null-message">日記がありません…</h1>
            <img class="diarylist-null-image" src="{{ asset("images/logo/close_gray.png") }}" alt="">
        </div>
        @endif
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
