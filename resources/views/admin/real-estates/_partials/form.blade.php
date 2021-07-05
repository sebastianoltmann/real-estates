<x-form-input id="name"
              name="name"
              :value="$realEstate->name"
              :placeholder="__('Name')"
              :label="__('Name')"
              :required="true"
/>

<x-form-input id="slug"
              name="slug"
              :value="$realEstate->slug"
              :placeholder="__('Slug')"
              :label="__('Slug')"
              :required="true"
/>

<x-form-input id="alias"
              name="alias"
              :value="$realEstate->alias"
              :placeholder="__('Alias')"
              :label="__('Alias')"
              :required="true"
/>

<hr class="my-4">

<x-form-group :label="__('Type')">
    @foreach(\App\Services\RealEstates\RealEstateType::values() as $type)
        <x-form-radio :id="'type_'.$type->getValue()"
                      :name="'type'"
                      :value="$type->getValue()"
                      :checked="$type->getValue() === $realEstate->type"
                      autocomplete="off"
                      :label="$type->getValue()"
        />
    @endforeach
</x-form-group>

@if(!$users->isEmpty())
    <hr class="my-4">

    <x-form-group :label="__('Owner')">
        @foreach($users as $u)
            <x-form-radio :id="'owner_'.$u->uuid"
                          :name="'owner'"
                          :value="$u->uuid"
                          :checked="$realEstate->owner && $u->id === $realEstate->owner->id"
                          autocomplete="off"
                          :label="$u->full_name"
            >
                <x-slot name="help">
                    @can('update', $u)
                        <a class="btn btn-sm btn-link d-inline-flex align-items-center" href="{{ route('admin.users.edit', $u) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-pen mr-2" viewBox="0 0 16 16">
                                <path
                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>

                            Edit
                        </a>
                    @endcan
                </x-slot>
            </x-form-radio>
        @endforeach
    </x-form-group>
@endif
