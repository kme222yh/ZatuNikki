@props(['errors'])

@if ($errors->any())
    <div class="validation-errors">
        <div class="validation-errors-head">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="validation-errors-body">
            @foreach ($errors->all() as $error)
                <li class="validation-errors-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
