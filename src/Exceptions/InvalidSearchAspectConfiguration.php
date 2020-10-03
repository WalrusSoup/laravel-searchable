<?php

namespace Spatie\Searchable\Exceptions;

use Exception;

class InvalidSearchAspectConfiguration extends Exception
{
    public static function paginationUnavailable(int $aspects) : self
    {
        return new self("Pagination for multiple aspects is not supported. Please limit to one search aspect for paginated results. Currently using: {$aspects}");
    }
}
