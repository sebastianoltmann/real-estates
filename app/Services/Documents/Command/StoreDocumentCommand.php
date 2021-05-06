<?php

namespace App\Services\Documents\Command;


use App\Services\CQRS\Command;
use App\Services\CQRS\CommandHelper;
use App\Services\RealEstates\Models\RealEstate;
use Illuminate\Http\UploadedFile;

class StoreDocumentCommand implements Command
{

    use CommandHelper;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var UploadedFile|null
     */
    protected UploadedFile|null $file = null;

    /**
     * @var string
     */
    protected string $category;

    /**
     * StoreDocumentCommand constructor.
     */
    public function __construct(
        array $params,
        protected RealEstate|null $realEstate = null
    )
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
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @return RealEstate|null
     */
    public function getRealEstate(): ?RealEstate
    {
        return $this->realEstate;
    }
}
