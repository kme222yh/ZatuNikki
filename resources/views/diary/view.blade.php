<x-app-layout>
    <div class="diarydetail">
        <div class="diarydetail-body">
            <h2 class="diarydetail-title">
                {{ $diary->getTitle() }}
            </h2>
            <span class="diarydetail-date">
                {{ $diary->date }}
            </span>
            <p class="diarydetail-content">
                {!! nl2br(e($diary->contents)) !!}
            </p>
        </div>
    </div>
</x-app-layout>
