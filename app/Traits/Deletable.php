<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

trait Deletable
{
    /**
     * @var string|null
     */
    protected ?int $id;

    /**
     * @param string|null $id
     */
    public function setDelete(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * applying status
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    private function applyDelete(Builder $builder): Builder
    {
        $builder->where('id', $this->id)->update(['deleted_at' => Carbon::now()]);
        return $builder;
    }

}
