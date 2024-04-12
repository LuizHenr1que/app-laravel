<?php
namespace App\Repositories;

use stdClass;

interface PaginationInterface
{
    /**
     * Returns an array of stdClass objects.
     *
     * @return stdClass[]
     */
    public function items(): array;
    public function total(): int;
    public function isFirstPage(): bool;
    public function isLastPage(): bool;
    public function currentPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;
}
