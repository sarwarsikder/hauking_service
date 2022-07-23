<?php

namespace App\Service;

use App\Models\ProductsRegister;
use App\Models\Frequency;
use App\Models\User;
use App\Traits\Deletable;
use App\Traits\Searchable;
use App\Traits\Sortable;
use App\Traits\Statusable;
use Illuminate\Pagination\LengthAwarePaginator;

class FrequencyService
{
    use Searchable, Sortable, Statusable, Deletable;

    private ?int $perPage;

    public function __construct(array $request)
    {
        $this->perPage = empty($request['per_page']) ? null : (int)$request['per_page'];
        $this->setSearch(optional($request)['search']);
        $this->setSortBy(optional($request)['sort_by'], optional($request)['is_descending']);

        $this->setStatus(optional($request)['status'], optional($request)['id']);

        $this->setDelete(optional($request)['id']);
    }

    public function get(): LengthAwarePaginator
    {
        $searchProductBuilder = Frequency::query();
        $searchProductBuilder = $this->applySearch($searchProductBuilder, ['frequency_name']);
        $searchProductBuilder = $this->applySorting($searchProductBuilder);

        return $searchProductBuilder->paginate($this->perPage);
    }

    public function statusUpdate()
    {
        $frequencyBuilder = Frequency::query();
        return $this->applyStatus($frequencyBuilder);
    }

    public function frequencyDelete()
    {
        $frequencyBuilder = Frequency::query();
        return $this->applyDelete($frequencyBuilder);
    }

    public function create()
    {
        $frequencyBuilder = Frequency::query();
        return $this->applyDelete($frequencyBuilder);
    }


}
