<?php

namespace App\Service;

use App\Models\ProductsRegister;
use App\Models\User;
use App\Traits\Searchable;
use App\Traits\Sortable;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    use Searchable, Sortable;

    private ?int $perPage;

    public function __construct(array $request)
    {
        $this->perPage = empty($request['per_page']) ? null : (int)$request['per_page'];
        $this->setSearch(optional($request)['search']);
        $this->setSortBy(optional($request)['sort_by'], optional($request)['is_descending']);
    }

    public function get(): LengthAwarePaginator
    {
        $searchProductBuilder = User::query();
        $searchProductBuilder = $this->applySearch($searchProductBuilder, ['first_name']);
        $searchProductBuilder = $this->applySorting($searchProductBuilder);

        return $searchProductBuilder->paginate($this->perPage);
    }

}
