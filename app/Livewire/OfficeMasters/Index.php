<?php

namespace App\Livewire\OfficeMasters;

use App\Models\OfficeMaster;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class Index extends DataTableComponent
{
    public ?int $perPage = 10;
    
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPaginationEnabled()
            ->setPerPageAccepted([10, 25, 50, 100])
            ->setPerPage($this->perPage)
            ->setSearchEnabled()
            ->setSearchLive();
            
        $this->setTableWrapperAttributes([
            'class' => 'overflow-x-auto overflow-y-auto max-h-[500px] border rounded-lg shadow-sm',
        ]);
        $this->setTableAttributes([
            'class' => 'min-w-full text-sm text-gray-700 text-center overflow-x-auto',
        ]);
        $this->setTheadAttributes([
            'class' => 'bg-violet-800 text-xs uppercase py-3 px-4 text-white',
        ]);
        $this->setThAttributes(function ($column) {
            return [
                'class' => 'px-4 py-3 text-white bg-violet-800 text-xs',
            ];
        });
        $this->setTdAttributes(function ($row) {
            return [
                'class' => 'px-4 py-3 text-gray-700 text-center',
            ];
        });
        $this->setTbodyAttributes([
            'class' => 'px-4 py-3 divide-y divide-gray-200 bg-white overflow-y-auto',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Address", "address")
                ->sortable()
                ->searchable(),
            Column::make("Zip", "zip")
                ->sortable()
                ->searchable(),
            Column::make("Status", "is_active")
                ->format(fn($value) => $value ? 'Active' : 'Inactive')
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('coulmn_button.ConfirmDeleteButton', [
                    'itemId' => $row->id,
                    'action' => 'delete',
                    'title' => 'Delete Office',
                    'message' => "Are you sure you want to delete {$row->name}?",
                    'tooltip' => 'Delete Office Master',
                ])->render())
                ->html(),
        ];
    }

    public function builder(): Builder
    {
        return OfficeMaster::query();
    }
}
