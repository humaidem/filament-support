<?php

namespace SmartEntity\FilamentSupport\Pages;


class ModalPage extends \Filament\Pages\Page
{

    protected static string $view = 'filament-support::pages.modal-page';
    protected static bool $shouldRegisterNavigation = false;
    public ?string $modalId = null;

    public function getPageContent(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getHeading(): string
    {
        return __($this->heading);
    }

    public function getModalId(): string
    {
        return $this->modalId;
    }

    public function closeModal(): void
    {
        $this->dispatch('close-modal', id: $this->modalId);
    }

}
