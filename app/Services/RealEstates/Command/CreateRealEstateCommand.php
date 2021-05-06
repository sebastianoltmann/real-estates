<?php

namespace App\Services\RealEstates\Command;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHelper;

class CreateRealEstateCommand implements Command
{

    use CommandHelper;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string|null
     */
    protected string|null $slug = null;

    /**
     * @var string|null
     */
    protected string|null $alias = null;

    /**
     * @var string|null
     */
    protected string|null $owner = null;

    /**
     * CreateRealEstateCommand constructor.
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->setParams($params);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return string|null
     */
    public function getOwner(): ?string
    {
        return $this->owner;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
