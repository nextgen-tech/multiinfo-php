<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Requests;

use NGT\MultiInfo\Contracts\Request as RequestContract;
use NGT\MultiInfo\Parsers\PackageInfoParser;

class PackageInfoRequest extends Request implements RequestContract
{
    /**
     * The ID of package.
     *
     * @var int
     */
    protected int $packageId;

    public function getHttpAction(): string
    {
        return 'packageinfo.aspx';
    }

    public function getParser(): PackageInfoParser
    {
        return new PackageInfoParser();
    }

    public function setPackageId(int $packageId): self
    {
        $this->packageId = $packageId;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'packageId' => $this->packageId,
        ];
    }
}
