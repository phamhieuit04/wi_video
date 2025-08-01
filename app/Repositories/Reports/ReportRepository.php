<?php

namespace App\Repositories\Reports;

use App\Contracts\Repositories\ReportRepositoryInterface;
use App\Models\Report;
use App\Repositories\Eloquent\EloquentRepository;

class ReportRepository extends EloquentRepository implements ReportRepositoryInterface
{
    /**
     * Implement abstract method and base model
     *
     * @return mixed | model
     */
    public function getModel()
    {
        return Report::class;
    }

    // Deploy special methods.
}