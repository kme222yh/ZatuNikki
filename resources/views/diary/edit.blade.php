<x-app-layout>
    <div class="about">
        <div class="editor">
            <editor-component diary_str="{{ $diary }}" api="{{route('api.save', $parameters = [], $absolute = false)}}"></editor-component>
        </div>
    </div>
</x-app-layout>
