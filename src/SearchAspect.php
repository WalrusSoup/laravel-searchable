<?php

namespace Spatie\Searchable;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class SearchAspect
{
    /** @var int */
    protected $limit;
    protected $pageSize;
    protected $offset;

    abstract public function getResults(string $term): Collection;

    public function getType(): string
    {
        if (isset(static::$searchType)) {
            return static::$searchType;
        }

        $className = class_basename(static::class);

        $type = Str::before($className, 'SearchAspect');

        $type = Str::snake(Str::plural($type));

        return Str::plural($type);
    }

    public function limit($limit) : void
    {
        $this->limit = $limit;
    }

    public function offset($offset) : void
    {
        $this->offset = $offset;
    }

    public function pageSize($pageSize) : void
    {
        $this->pageSize = $pageSize;
    }
}
