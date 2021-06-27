<x-app-layout>
    <div class="owndiarylist">
        <div class="owndiarylist-body">
            @while ($i < count($diaries))
            <div class="owndiarylist-year">
                <span class="owndiarylist-year-head">{{ $date->year }}年</span>
                <ul class="owndiarylist-year-body">
                    @while ($i < count($diaries))
                    <li class="owndiarylist-month">
                        @php
                            $last = $date->copy();
                            $last->firstOfMonth();
                            $last->addDay(-1);
                        @endphp
                        <span class="owndiarylist-month-head">{{ $date->month }}月</span>
                        <ul class="owndiarylist-month-body">
                            @while ($i < count($diaries))
                            @if($diaries[$i]->year==$date->year && $diaries[$i]->month==$date->month && $diaries[$i]->day==$date->day)
                                <li class="owndiarylist-date">
                                    <a class="owndiarylist-date-body" href="{{ route('view', ['diary'=>$diaries[$i]->id]) }}">
                                        <span class="owndiarylist-date-head">{{ $date->day }}日</span>
                                        <span class="owndiarylist-date-title">{{ $diaries[$i]->getTitle() }}</span>
                                    </a>
                                </li>
                                @php
                                    $i++
                                @endphp
                            @endif
                            @php
                                $date->addDay(-1);
                            @endphp
                            @if($date->day==$last->day && $date->month==$last->month)
                                @break
                            @endif
                            @endwhile
                        </ul>
                    </li>
                    @if($date->month == 1)
                        @break
                    @endif
                    @endwhile
                </ul>
            </div>
            @endwhile
        </div>
    </div>
</x-app-layout>
