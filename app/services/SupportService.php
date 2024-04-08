<?php
namespace App\Services;

use App\DTO\createSupportDTO;
use App\DTO\UpdateSupportDTO;
use GuzzleHttp\Promise\Create;
use stdClass;

class SupportService
{
    protected $repository;

    public function __construct()
    {

    }


    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new( createSupportDTO $dto ): stdClass
    {
        return $this->repository->new($dto);
    }


    public function update(UpdateSupportDTO $dto): stdClass | null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}