<?php

namespace SmartEntity\FilamentSupport\Tables\Actions;

use Filament\Tables\Actions\Action;
use SmartEntity\FilamentSupport\Actions\Trait\ModalTrait;

class ModalAction extends Action
{
    use ModalTrait;

    public function closeModal(): void
    {

    }
}
