<?php


namespace App\Common\Traits\Eloquent;


use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCreator
{

    /**
     * Boot function from Laravel.
     */
    protected static function bootHasCreator(): void
    {
        static::creating(function ($model) {
            $model->updateCreators();
        });
        static::updating(function ($model) {
            $model->updateCreators();
        });
    }

    public function updateCreators(): void
    {
        $updatedByColumn = $this->getUpdatedByColumn();

        if (! is_null($updatedByColumn) && ! $this->isDirty($updatedByColumn)) {
            $this->setUpdatedBy();
        }

        $createdByColumn = $this->getCreatedByColumn();

        if (! $this->exists && ! is_null($createdByColumn) && ! $this->isDirty($createdByColumn)) {
            $this->setCreatedBy();
        }
    }

    /**
     * Get the name of the "created by" column.
     *
     * @return string|null
     */
    public function getCreatedByColumn(): ?string
    {
        return static::CREATED_BY;
    }

    /**
     * Get the name of the "updated by" column.
     *
     * @return string|null
     */
    public function getUpdatedByColumn(): ?string
    {
        return static::UPDATED_BY;
    }

    /**
     * Set the value of the "created by" attribute.
     *
     * @return $this
     */
    public function setCreatedBy(): self
    {
        $this->{$this->getCreatedByColumn()} = auth()->user()->id;

        return $this;
    }

    /**
     * Set the value of the "updated by" attribute.
     *
     * @return $this
     */
    public function setUpdatedBy(): self
    {
        $this->{$this->getUpdatedByColumn()} = auth()->user()->id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorModel(): string
    {
        return User::class;
    }

    /**
     * @return BelongsTo|null
     */
    public function creator(): ?BelongsTo
    {
        $createdByColumn = $this->getCreatedByColumn();

        if (! is_null($createdByColumn) ) {
            return $this->belongsTo($this->getCreatorModel(), $createdByColumn);
        }
        return null;
    }

    /**
     * @return BelongsTo|null
     */
    public function updator(): ?BelongsTo
    {
        $updatedByColumn = $this->getUpdatedByColumn();

        if (! is_null($updatedByColumn) ) {
            return $this->belongsTo($this->getCreatorModel(), $updatedByColumn);
        }
        return null;
    }
}
