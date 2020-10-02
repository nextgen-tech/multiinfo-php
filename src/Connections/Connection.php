<?php

declare(strict_types=1);

namespace NGT\MultiInfo\Connections;

use NGT\MultiInfo\Certificate;
use NGT\MultiInfo\Url;

abstract class Connection
{
    /**
     * The API URL instance.
     *
     * @var \NGT\MultiInfo\Url
     */
    protected Url $url;

    /**
     * The certificate instance.
     *
     * @var \NGT\MultiInfo\Certificate
     */
    protected Certificate $certificate;

    /**
     * The abstract connection constructor.
     *
     * @param \NGT\MultiInfo\Url         $url
     * @param \NGT\MultiInfo\Certificate $certificate
     */
    public function __construct(Url $url, Certificate $certificate)
    {
        $this->url         = $url;
        $this->certificate = $certificate;
    }

    /**
     * Get the API URL of connection.
     *
     * @return \NGT\MultiInfo\Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * Get the certificate of connection.
     *
     * @return \NGT\MultiInfo\Certificate
     */
    public function getCertificate(): Certificate
    {
        return $this->certificate;
    }
}
