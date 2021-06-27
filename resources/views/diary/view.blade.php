<x-app-layout>
    <div class="diarydetail">
        <div class="diarydetail-body">
            <h2 class="diarydetail-title">
                {{ $diary->title }}
            </h2>
            <span class="diarydetail-date">
                {{ $diary->created_at }}
            </span>
            <p class="diarydetail-content">
                {{ $diary->contents }}
            </p>
        </div>
    </div>
</x-app-layout>
