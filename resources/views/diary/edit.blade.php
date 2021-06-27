<x-app-layout>
        <editor-component diary_str="{{ $diary }}" api="{{route('api.save', $parameters = [], $absolute = false)}}"></editor-component>
</x-app-layout>
