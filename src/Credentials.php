<?php

declare(strict_types=1);

namespace NGT\MultiInfo;

use NGT\MultiInfo\Contracts\Credentials as CredentialsContract;

class Credentials implements CredentialsContract
{
    /**
     * The login of credentials.
     *
     * @var string
     */
    protected string $login;

    /**
     * The password of credentials.
     *
     * @var string
     */
    protected string $password;

    /**
     * The service identifier of credentials.
     *
     * @var string
     */
    protected string $serviceId;

    /**
     * The credentials constructor.
     *
     * @param string $login
     * @param string $password
     * @param string $serviceId
     */
    public function __construct(string $login, string $password, string $serviceId)
    {
        $this->login     = $login;
        $this->password  = $password;
        $this->serviceId = $serviceId;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getServiceId(): string
    {
        return $this->serviceId;
    }

    public function toHttp(): array
    {
        return [
            'login'     => $this->login,
            'password'  => $this->password,
            'serviceId' => $this->serviceId,
        ];
    }
}
