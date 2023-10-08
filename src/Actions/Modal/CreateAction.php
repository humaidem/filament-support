<?php

namespace Humaidem\FilamentSupport\Actions\Modal;

class CreateAction extends \Filament\Actions\CreateAction
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->label('');
        $this->hiddenLabel();
        $this->link();
//        $this->extraAttributes(['class' => 'bg-primary-50 border border-primary-100 rounded-lg p-0.5 w-6 h-6', 'style' => 'font-size: 18px;text-decoration: none;']);
        $this->extraAttributes(['style' => 'font-size: 20px;text-decoration: none;']);
        $this->tooltip(__('filament-actions::create.single.modal.actions.create.label'));
        $this->icon('fa-light fa-plus');
        $this->createAnother(false);

    }
}
