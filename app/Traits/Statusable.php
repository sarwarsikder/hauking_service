<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;


trait Statusable
{
    /**
     * @var string|null
     */
    protected ?bool $status;

    /**
     * @var string|null
     */
    protected ?int $id;

    /**
     * @param string|null $status
     * @param string|null $id
     */
    public function setStatus(?string $status, ?string $id): void
    {
        $this->status = empty($status) ? false : $status;
        $this->id = $id;
    }

    /**
     * applying status
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    private function applyStatus(Builder $builder): Builder
    {
        $builder->where('id', $this->id)->update(['status' => $this->status]);
        return $builder;
    }
}
