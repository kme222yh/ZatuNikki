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
    @if($diary->user_id == Auth::id())
    <diary-menu-component
        deleteurl="{{ route('delete', ['diary'=>$diary->id]) }}"
        editurl="{{ route('write.edit', ['diary'=>$diary->id]) }}"
    ></diary-menu-component>
    @endif
</x-app-layout>
