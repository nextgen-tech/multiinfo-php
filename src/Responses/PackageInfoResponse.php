<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Responses;

use NGT\MultiInfo\Contracts\Response as ResponseContract;

class PackageInfoResponse extends Response implements ResponseContract
{
    protected int $packageId;

    protected int $recipientCount;

    protected int $leftRecipientCount;

    protected int $packageStatus;

    public function setPackageId(int $packageId): void
    {
        $this->packageId = $packageId;
    }

    public function setRecipientCount(int $recipientCount): void
    {
        $this->recipientCount = $recipientCount;
    }

    public function setLeftRecipientCount(int $leftRecipientCount): void
    {
        $this->leftRecipientCount = $leftRecipientCount;
    }

    public function setPackageStatus(int $packageStatus): void
    {
        $this->packageStatus = $packageStatus;
    }

    public function getPackageId(): int
    {
        return $this->packageId;
    }

    public function getRecipientCount(): int
    {
        return $this->recipientCount;
    }

    public function getLeftRecipientCount(): int
    {
        return $this->leftRecipientCount;
    }

    public function getPackageStatus(): int
    {
        return $this->packageStatus;
    }
}
