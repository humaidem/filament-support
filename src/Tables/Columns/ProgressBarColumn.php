<?php

namespace Humaidem\FilamentSupport\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Concerns\HasDescription;

class ProgressBarColumn extends Column
{
    use HasDescription;

    protected string $view = 'filament-support::tables.columns.progress-bar';

}

