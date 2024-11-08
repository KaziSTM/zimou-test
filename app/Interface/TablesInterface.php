<?php

namespace App\Interface;

interface TablesInterface
{
    public function actions(): array;

    public function columns(): array;

    public function setFilters(): array;

    public function defineBulkActions(): array;
}
