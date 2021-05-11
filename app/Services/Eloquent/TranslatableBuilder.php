<?php


namespace App\Services\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;

class TranslatableBuilder extends Builder
{

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        if(in_array($column, $this->translatableColumns())){
            $locale = App::getLocale();
            $column = "{$column}->{$locale}";
        }
        return parent::where($column, $operator, $value, $boolean);
    }

    /**
     * @return array
     */
    private function translatableColumns(): array
    {
        return $this->model->translatable ?? [];
    }
}
