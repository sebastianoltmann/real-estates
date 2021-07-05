<?php

namespace App\Services\Users\Command;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHelper;

class CreateUserCommand implements Command
{
    use CommandHelper;

    /**
     * @var string|null
     */
    protected string|null $attention = null;

    /**
     * @var string
     */
    protected string $first_name;

    /**
     * @var string
     */
    protected string $last_name;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string[]
     */
    protected array $projects;

    /**
     * @var string[]|null
     */
    protected array|null $real_estates = null;


    /**
     * CreateUserCommand constructor.
     */
    public function __construct(array $params)
    {
        $this->setParams($params);
    }

    /**
     * @return string
     */
    public function getAttention(): string
    {
        return $this->attention;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * @return string[]|null
     */
    public function getRealEstates(): ?array
    {
        return $this->real_estates;
    }

}
