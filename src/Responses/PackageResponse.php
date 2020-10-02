<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use NGT\MultiInfo\Contracts\Response as ResponseContract;

class PackageResponse extends Response implements ResponseContract
{
    protected int $packageId;

    public function setPackageId(int $packageId): void
    {
        $this->packageId = $packageId;
    }

    public function getPackageId(): int
    {
        return $this->packageId;
    }
}
