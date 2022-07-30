<?php

namespace App\Service;

use App\Models\EmailSettings;
use App\Traits\Deletable;
use App\Traits\Searchable;
use App\Traits\Sortable;
use App\Traits\Statusable;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailsService
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
        $searchProductBuilder = EmailSettings::query();
        $searchProductBuilder->whereNull("deleted_at");
        $searchProductBuilder = $this->applySearch($searchProductBuilder, ['email_subject']);
        $searchProductBuilder = $this->applySorting($searchProductBuilder);
        return $searchProductBuilder->paginate($this->perPage);
    }

    public function statusUpdate()
    {
        $emailBuilder = EmailSettings::query();
        return $this->applyStatus($emailBuilder);
    }

    public function emailDelete()
    {
        $emailBuilder = EmailSettings::query();
        return $this->applyDelete($emailBuilder);
    }

}
