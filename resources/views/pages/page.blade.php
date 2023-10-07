<x-filament-panels::page>
    @foreach($this->getPageContent() as $pageContent)
        {{ $pageContent }}
    @endforeach
</x-filament-panels::page>
