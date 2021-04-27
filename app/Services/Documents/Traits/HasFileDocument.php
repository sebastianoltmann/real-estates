<?php


namespace App\Services\Documents\Traits;


use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;

trait HasFileDocument
{

    use InteractsWithMedia;

    /**
     * @return string
     */
    private function getFileDocumentCollectionName(): string
    {
        return 'document';
    }

    /**
     * @return string
     */
    private function getFileDocumentDiskName(): string
    {
        return 'document';
    }

    /**
     * @param bool $strict
     * @return bool
     */
    public function hasFileDocument(bool $strict = true): bool
    {
        $check = (bool)$this->hasMedia($this->getFileDocumentCollectionName());
        if ($strict)
            return $check && file_exists($this->getFileDocument()->getPath());
        return $check;
    }

    /**
     * @return Media|null
     */
    public function getFileDocument(): ?Media
    {
        return $this->getFirstMedia($this->getFileDocumentCollectionName());
    }

    /**
     * @return int|null
     */
    public function getFileDocumentId(): ?int
    {
        return $this->getFileDocument()->id ?? null;
    }

    /**
     * @return bool
     * @throws MediaCannotBeDeleted
     */
    public function deleteFileDocument(): bool
    {

        if ($file = $this->getFileDocument()) {
            $this->deleteMedia($file);
            return true;
        }
        return false;
    }


    /**
     * @param UploadedFile $file
     * @return Media|null
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function setFileDocument(UploadedFile $file): ?Media
    {
        $this->clearMediaCollection($this->getFileDocumentCollectionName());
        return $this->addMedia($file)
            ->toMediaCollection(
                $this->getFileDocumentCollectionName(),
                $this->getFileDocumentDiskName()
            );
    }

    /**
     * @return Media|null
     */
    public function getFileDocumentAttribute(): ?Media
    {
        if (!$this->hasFileDocument()) return null;
        return $this->getFileDocument();
    }
}
