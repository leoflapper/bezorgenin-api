<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OrderDataTable extends DataTable
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

        $dataTable->editColumn('is_pickup', function($order)
        {
            $result = 'Bezorgen';

           if(true == $order->is_pickup) {
               $result = 'Afhalen';
           }
           return $result;
        });

        $dataTable->editColumn('company_id', function($order)
        {
            return $order->company->name;
        });

        $dataTable->editColumn('street', function($order)
        {
            if(true == $order->is_pickup) {
                return '-';
            }

            $address = $order->street . ' '. $order->housenumber;
            if($order->housenumber_addition) {
                $address .= $order->housenumber_addition;
            }

            $address .= ', '.$order->postcode . ' ' . $order->city ;
            return $address;
        });

        $dataTable->editColumn('created_at', function($order)
        {
            return $order->created_at->format('d-m-Y H:i:s');
        });

        return $dataTable->addColumn('action', 'orders.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        if(auth()->user()->hasRole('admin')) {
            return $model->newQuery();
        } else {
            return $model->newQuery()->whereHas('company', function (Builder $query) {

                $ids = [];
                foreach (auth()->user()->companies as $company) {
                    $ids[] = $company->id;
                }
                $query->whereIn('id', $ids);

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
                'order'     => [[2, 'desc']],
                'buttons'   => $this->getButtons()
            ]);
    }

    /**
     * @return array
     */
    private function getButtons(): array
    {
        $buttons = [
            ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
            ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
            ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
            ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
        ];
        //if(auth()->user()->hasRole('admin')) {
        //array_unshift($buttons,  ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',]);
        //}
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
            ['data' => 'company_id', 'name' => 'company_id', 'title' => 'Bedrijf'],
            ['data' => 'number', 'name' => 'number', 'title' => 'Bestelnummer'],
            ['data' => 'is_pickup', 'name' => 'is_pickup', 'title' => 'Verzendmethode'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Datum'],
            ['data' => 'first_name', 'name' => 'first_name', 'title' => 'Voornaam'],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => 'Achternaam'],
            ['data' => 'street', 'name' => 'street', 'title' => 'Adres'],
            ['data' => 'email', 'name' => 'email', 'title' => 'E-mail'],
            ['data' => 'telephone', 'name' => 'telephone', 'title' => 'Tel. nr']

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ordersdatatable_' . time();
    }
}
