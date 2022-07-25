<?php

namespace App\Service;

use App\Models\LanguageSettings;
use App\Traits\Deletable;
use App\Traits\Searchable;
use App\Traits\Sortable;
use App\Traits\Statusable;
use Illuminate\Pagination\LengthAwarePaginator;

class LanguageService
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
        $searchProductBuilder = LanguageSettings::query();
        $searchProductBuilder->whereNull("deleted_at");
        $searchProductBuilder = $this->applySearch($searchProductBuilder, ['language_name']);
        $searchProductBuilder = $this->applySorting($searchProductBuilder);

        return $searchProductBuilder->paginate($this->perPage);
    }

    public function statusUpdate()
    {
        $userBuilder = LanguageSettings::query();
        return $this->applyStatus($userBuilder);
    }

    public function userDelete()
    {
        $userBuilder = LanguageSettings::query();
        return $this->applyDelete($userBuilder);
    }

}