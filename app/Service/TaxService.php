<?php

namespace App\Service;

use App\Models\Tax;
use App\Models\User;
use App\Traits\Deletable;
use App\Traits\Searchable;
use App\Traits\Sortable;
use App\Traits\Statusable;
use Illuminate\Pagination\LengthAwarePaginator;

class TaxService
{

    use Searchable, Sortable, Statusable, Deletable;

    private ?int $perPage;
    private ?array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->perPage = empty($request['per_page']) ? null : (int)$request['per_page'];
        $this->setSearch(optional($request)['search']);
        $this->setSortBy(optional($request)['sort_by'], optional($request)['is_descending']);

        $this->setStatus(optional($request)['status'], optional($request)['id']);

        $this->setDelete(optional($request)['id']);
    }

    public function get(): LengthAwarePaginator
    {
        $searchProductBuilder = Tax::query();
        $searchProductBuilder->whereNull("deleted_at");
        $searchProductBuilder->orderBy('id', 'DESC');
        $searchProductBuilder->with('country');
        $searchProductBuilder->with('state');
        $searchProductBuilder = $this->applySearch($searchProductBuilder, ['country_id']);
        $searchProductBuilder = $this->applySorting($searchProductBuilder);

        return $searchProductBuilder->paginate($this->perPage);
    }

    public function statusUpdate()
    {
        $taxBuilder = Tax::query();
        return $this->applyStatus($taxBuilder);
    }

    public function taxDelete()
    {
        $taxBuilder = Tax::query();
        return $this->applyDelete($taxBuilder);
    }
}
