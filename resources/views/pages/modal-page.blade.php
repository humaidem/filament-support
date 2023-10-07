@php
    use Filament\Actions\ActionGroup;
    use Filament\Support\Enums\Alignment;
    use function Filament\Support\is_slot_empty;
    $id = $this->getId();
    $closeEventName = 'close-modal';
@endphp

<div class="-m-6">
    <div class="flex flex-col gap-y-4">
        <div class="flex items-center px-6 pt-6 bg-white dark:bg-white/5 rounded-t-xl h-16 space-x-1 rtl:space-x-reverse">
            <div class="text-lg grow font-bold">
                {{ $this->getHeading() }}
            </div>
            @if ($actions = $this->getCachedHeaderActions())
                <x-filament-actions::actions
                    :actions="$actions"
                    @class([
                        'shrink-0'
                    ])
                />
                <div x-init="setTimeout(()=>{$wire.mountAction('')}, 500)"></div>
            @endif
            <x-filament::icon-button
                color="gray"
                icon="heroicon-o-x-mark"
                icon-alias="modal.close-button"
                icon-size="lg"
                :label="__('filament::components/modal.actions.close.label')"
                tabindex="-1"
                :x-on:click="'close()'"
                {{--                :x-on:click="filled($id) ? '$dispatch(' . \Illuminate\Support\Js::from($closeEventName) . ', { id: ' . \Illuminate\Support\Js::from($id) . ' })' : 'close()'"--}}
                class="fi-modal-close-btn -m-1.5"
            />
        </div>
        @if ($headerWidgets = $this->getVisibleHeaderWidgets())
            <x-filament-widgets::widgets
                :columns="$this->getHeaderWidgetsColumns()"
                :data="$widgetData"
                :widgets="$headerWidgets"
            />
        @endif
    </div>
    <div class="px-6 py-6 gap-y-4 flex flex-col">
        @foreach($this->getPageContent() as $pageContent)
            <div>
                {{ $pageContent }}
            </div>
        @endforeach
    </div>
    @if ($footerWidgets = $this->getVisibleFooterWidgets())
        <x-filament-widgets::widgets
            :columns="$this->getFooterWidgetsColumns()"
            :data="$widgetData"
            :widgets="$footerWidgets"
        />
    @endif
    @php
        $footerActions = $this->getActions();
        $footer = $this->getFooter();
        $footerActionsAlignment = $this->getFormActionsAlignment();
    @endphp
    @if ((! is_slot_empty($footer)) || (is_array($footerActions) && count($footerActions)) || (! is_array($footerActions) && ! is_slot_empty($footerActions)))
        <div
            @class([
                'fi-modal-footer w-full rounded-b-xl',
                'px-6 pb-6',
                'fi-sticky sticky bottom-0 bg-white dark:border-white/10 dark:bg-gray-900',
                ])>
            <div
                @class([
                    'fi-modal-footer-actions gap-3',
                    match ($footerActionsAlignment) {
                        Alignment::Center, 'center' => 'flex flex-col-reverse sm:grid sm:grid-cols-[repeat(auto-fit,minmax(0,1fr))]',
                        Alignment::End, Alignment::Right, 'end', 'right' => 'flex flex-row-reverse flex-wrap items-center',
                        Alignment::Left, Alignment::Start, 'left', 'start' => 'flex flex-wrap items-center',
                    },
                ])
            >
                @if (is_array($footerActions))
                    @foreach ($footerActions as $action)
                        {{ $action }}
                    @endforeach
                @else
                    {{ $footerActions }}
                @endif
            </div>
        </div>
    @endif
    @if ($footer = $this->getFooter())
        {{ $footer }}
    @endif
    <x-filament-actions::modals/>
</div>

