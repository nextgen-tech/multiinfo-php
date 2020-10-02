<?php

declare(strict_types=1);

namespace NGT\MultiInfo;

class Certificate
{
    /**
     * The path of the public key.
     *
     * @var string
     */
    protected string $publicKeyPath;

    /**
     * The path of the private key.
     *
     * @var string
     */
    protected string $privateKeyPath;

    /**
     * The password of the certificate.
     *
     * @var string
     */
    protected string $password;

    /**
     * The type of the certificate.
     *
     * @var string
     */
    protected string $type = 'PEM';

    /**
     * The certificate constructor.
     *
     * @param string      $publicKeyPath
     * @param string      $privateKeyPath
     * @param string      $password
     * @param string|null $type
     */
    public function __construct(
        string $publicKeyPath,
        string $privateKeyPath,
        string $password,
        string $type = null
    ) {
        $this->publicKeyPath   = $publicKeyPath;
        $this->privateKeyPath  = $privateKeyPath;
        $this->password        = $password;

        if ($type !== null) {
            $this->type = strtoupper($type);
        }
    }

    /**
     * Get the public key path of certificate.
     *
     * @return string
     */
    public function getPublicKeyPath(): string
    {
        return $this->publicKeyPath;
    }

    /**
     * Get the private key path of certificate.
     *
     * @return string
     */
    public function getPrivateKeyPath(): string
    {
        return $this->privateKeyPath;
    }

    /**
     * Get the password of certificate.
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the type of certificate.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Convert the certificate to format used by HTTP connection.
     *
     * @return array<int, string>
     */
    public function toHttp(): array
    {
        return [
            CURLOPT_SSLCERT       => $this->publicKeyPath,
            CURLOPT_SSLKEY        => $this->privateKeyPath,
            CURLOPT_SSLCERTPASSWD => $this->password,
            CURLOPT_SSLCERTTYPE   => $this->type,
        ];
    }
}
