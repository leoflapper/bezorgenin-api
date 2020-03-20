<?php

namespace App\DataTables;

use App\Models\Meal;
use App\Util\Currency;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MealDataTable extends DataTable
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
        $dataTable->editColumn('meal_category_id', function($meal)
        {
            return $meal->mealCategory->name;
        });
        $dataTable->editColumn('company_id', function($meal)
        {
            return $meal->company->name;
        });
        $dataTable->editColumn('price', function($meal)
        {
            return Currency::format($meal->price);
        });
        return $dataTable->addColumn('action', 'meals.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Meal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Meal $model)
    {
        return $model->newQuery();
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
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'meal_category_id', 'name' => 'meal_category_id', 'title' => 'Categorie', 'searchable' => false],
            ['data' => 'company_id', 'name' => 'company_id', 'title' => 'Bedrijf', 'searchable' => false],
            ['data' => 'name', 'name' => 'name', 'title' => 'Naam'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Prijs'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Omschrijving', 'searchable' => false],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'mealsdatatable_' . time();
    }
}
