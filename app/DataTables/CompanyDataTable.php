<?php

namespace App\DataTables;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CompanyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'companies.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Company $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Company $model)
    {
        if(auth()->user()->hasRole('admin')) {
            return $model->newQuery();
        } else {
            return $model->newQuery()->whereHas('users', function (Builder $query) {
                $query->where('id', auth()->user()->id);
            });;
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => $this->getButtons()
            ]);
    }

    private function getButtons()
    {
        $buttons = [
            ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
            ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
            ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
            ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
        ];
        if(auth()->user()->hasRole('admin')) {
            array_unshift($buttons,  ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',]);
        }
        return $buttons;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'email',
            'telephone',
            'vat_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'companiesdatatable_' . time();
    }
}
