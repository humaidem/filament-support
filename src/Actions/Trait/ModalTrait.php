<?php

namespace Humaidem\FilamentSupport\Actions\Trait;

use Closure;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;

trait ModalTrait
{
    protected string $page = '';
    protected array|Closure|null $parameters;

    public static function getDefaultName(): ?string
    {
        return 'modal-action';
    }

    public function page(string $page): self
    {
        $this->page = collect(explode('.', str($page)->replace('\\', '.')))
            ->map(function ($item) {
                return str($item)->kebab();
            })->implode('.');

        return $this;
    }

    public function getPage(): string
    {
        return $this->page;
    }

    public function getContent(): string|Htmlable|Closure|null
    {
        $para = $this->parameters;
        if ($this->parameters instanceof Closure) {

            $para = $this->evaluate($this->parameters);
        }
        $modalId = null;
        if ($this instanceof Action) {
            $modalId = $this->getLivewire()->getId().'-table-action';
        } elseif ($this instanceof \Filament\Actions\Action) {
            $modalId = $this->getLivewire()->getId().'-action';
        }
//        elseif ($this instanceof \Onexer\FilamentTreeTable\Actions\Action) {
//            $modalId = $this->getLivewire()->getId() . '-tree-table-action';
//        }

        return "@livewire(\"$this->page\", [".collect([...['modalId' => $modalId], ...$para])->map(fn($item, $key) => "'$key' => '$item'")->implode(',')."])";
    }

    public function parameters(array|Closure|null $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function createModal(): self
    {
        return $this;
    }

    public function editModal(): self
    {
        return $this;
    }

    public function viewModal(): self
    {
        return $this;
    }

    public function asViewButton(): self
    {
        $this->icon('fa-solid fa-eye');
        $this->label(__('filament-actions::view.single.label'));
        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->modalContent(view('filament-support::actions.modal', ['action' => $this]));
        $this->modalCancelAction(false);
        $this->modalSubmitAction(false);
        $this->label(null);
        $this->modalHeading(false);
        $this->icon('heroicon-o-list-bullet');
    }
}
