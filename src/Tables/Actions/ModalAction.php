<?php

namespace Humaidem\FilamentSupport\Tables\Actions;

use Filament\Tables\Actions\Action;
use Humaidem\FilamentSupport\Actions\Trait\ModalTrait;

class ModalAction extends Action
{
    use ModalTrait;

    public function closeModal(): void
    {

    }
}
