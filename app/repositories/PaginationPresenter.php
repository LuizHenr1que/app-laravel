<?php
namespace App\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use stdClass;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationPresenter implements PaginationInterface
{
        /**
     * Returns an array of stdClass objects.
     *
     * @var stdClass[]
     */
    private array $items;

    public function __construct(
            protected LengthAwarePaginator $paginator,
    ) {
        $this->items = $this->resolveItems($this->paginator->items());
    }
    /**
     * Returns an array of stdClass objects.
     *
     * @return stdClass[]
     */
    public function items(): array
    {
        return $this->items;
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage() ?? 0;
    }

    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }


    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }


    private function resolveItems(array $items): array
    {
        $response = [];
        foreach($items as $item) {
            $stdClassObject = new stdClass;
            foreach ($item->toArray() as $key => $value) {
                $stdClassObject->{$key} = $value;
            }
            array_push($response, $stdClassObject);
        }
        return $response;
    }
}
