<?php

namespace Spatie\Searchable\Tests;

use Illuminate\Support\Arr;
use ReflectionObject;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;
use Spatie\Searchable\Tests\Models\TestModel;
use Spatie\Searchable\Tests\stubs\CustomNameSearchAspect;

class SearchPaginationTest extends TestCase
{
    /** @test */
    public function it_can_return_paginated_results()
    {
        $search = new Search();

        TestModel::createWithName('android 16');
        TestModel::createWithName('android 17');
        TestModel::createWithName('android 18');
        TestModel::createWithName('android 19');

        $search->registerModel(TestModel::class, 'name');
        $firstPaginator = $search->performWithPagination('android', 1, 1);
        $secondPaginator = $search->performWithPagination('android', 2, 1);
        $thirdPaginator = $search->performWithPagination('android', 0, 4);
        $this->assertNotEquals($firstPaginator->firstItem(), $secondPaginator->firstItem());

        $this->assertCount(4, $thirdPaginator->all());
    }
}
