<div class="diarylist">
    @if(count($recomendations)>0)
    <p class="diarylist-recommendtext"><i class="fas fa-undo-alt"></i> 今日はこの日記を振り返ってみましょう</p>
    <div class="diarylist-body">
        @foreach ($recomendations as $diary)
        <article class="diarylist-item">
            <a href="{{ route('diary.show', ['diary' => $diary->id]) }}"></a>
            <h2 class="diarylist-item-title">{!! e($diary->getTitle()) !!}</h2>
            <p class="diarylist-item-date">{{ $diary->date->format('Y/m/d') }}</p>
            <p class="diarylist-item-contents">{!! nl2br(e($diary->getContentOnly5Rows(true))) !!}</p>
        </article>
        @endforeach
    </div>
    @endif

    @if(count($books)>0)
    <p class="diarylist-recommendtext"><i class="fas fa-undo-alt"></i> 今日はこの感想を振り返ってみましょう</p>
    <div class="diarylist-body">
        @foreach ($books as $diary)
        <article class="diarylist-item">
            <a href="{{ route('book.reading.show', ['reading' => $diary->id]) }}"></a>
            <h2 class="diarylist-item-title">{!! e($diary->title) !!}</h2>
            <p class="diarylist-item-date">{{ $diary->updated_at }}</p>
            <p class="diarylist-item-contents">{!! nl2br(e($diary->contents)) !!}</p>
        </article>
        @endforeach
    </div>
    @endif

    <div class="diarylist-body">
        @if(count($diaries)<=0 && count($recomendations)<=0)
        <div class="diarylist-null">
            <h1 class="diarylist-null-message">日記がありません…</h1>
            <img class="diarylist-null-image" src="{{ asset("images/logo/close_gray.png") }}" alt="">
        </div>
        @endif
        @foreach ($diaries as $diary)
        <article class="diarylist-item">
            <a href="{{ route('diary.show', ['diary' => $diary->id]) }}"></a>
            <h2 class="diarylist-item-title">{!! e($diary->getTitle()) !!}</h2>
            <p class="diarylist-item-date">{{ $diary->date->format('Y/m/d') }}</p>
            <p class="diarylist-item-contents">{!! nl2br(e($diary->getContentOnly5Rows(true))) !!}</p>
        </article>
        @endforeach
    </div>
</div>
