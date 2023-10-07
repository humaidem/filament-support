@php
    $stat = min($getState(), 100);
@endphp
<div>
    @if($getDescriptionAbove())
        <div class="text-xs text-gray-500 dark:text-gray-400 text-center mt-1">{{$getDescriptionAbove()}}</div>
    @endif
    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700" x-data="{}" x-tooltip="{
            content: '{{$stat}}%',
            theme: $store.theme,
        }">
        @if($stat >= 90)
            <div class="bg-danger-600 text-xs text-danger-50 font-medium text-center p-0.5 leading-none rounded-full" style="width: {{$stat}}%"> {{$stat}}%</div>
        @elseif($stat > 75)
            <div class="bg-yellow-600 text-xs text-yellow-50 font-medium text-center p-0.5 leading-none rounded-full" style="width: {{$stat}}%"> {{$stat}}%</div>
        @else
            <div class="bg-success-600 text-xs text-success-50 text-center p-0.5 leading-none rounded-full" style="width: {{$stat}}%"> {{$stat}}%</div>
        @endif
    </div>
    @if($getDescriptionBelow())
        <div class="text-xs text-gray-500 dark:text-gray-400 text-center mt-1">{{$getDescriptionBelow()}}</div>
    @endif
</div>
