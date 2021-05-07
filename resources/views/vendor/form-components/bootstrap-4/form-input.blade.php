<div class="@if($type === 'hidden') d-none @else form-group @endif">
    <x-form-label :label="$type === 'file' ? 'File' : $label" :for="$attributes->get('id') ?: $id()"/>

    <div class="input-group {{ $hasError($name) ? 'is-invalid' : '' }}">
        @isset($prepend)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            </div>
        @endisset

        @if($type === 'file')
            <div class="custom-file" x-data="file()">
                @endif


                <input {!! $attributes->merge([
                            'class' => 'form-control' . ($hasError($name) ? ' is-invalid' : '') . ($type === 'file' ? ' custom-file-input' : '')
                        ]) !!}
                       type="{{ $type }}"

                       @if($isWired())
                       wire:model{!! $wireModifier() !!}="{{ $name }}"
                       @else
                       name="{{ $name }}"
                       value="{{ $value }}"
                       @endif

                       @if($label && !$attributes->get('id'))
                       id="{{ $id() }}"
                    @endif

                    @change="handleChange"
                />

                @if($type === 'file')
                    <x-form-label class="custom-file-label"
                                  :label="$label ?: 'File'"
                                  :for="$attributes->get('id') ?: $id()"
                                  x-text="label"
                    />
            </div>
        @endif

        @isset($append)
            <div class="input-group-append">
                <div class="input-group-text">
                    {!! $append !!}
                </div>
            </div>
        @endisset
    </div>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name"/>
    @endif

    <script>
        function file(){
            return {
                label: '{{ $label ?? __('File')}}',
                defaultLabel: '{{ $label ?? __('File')}}',
                fileName: null,
                handleChange(e){
                    const files = e.target.files;

                    if(files.length > 1){
                        this.label = `Selected ${file.length} files`;
                    } else if(files.length == 1){
                        const [file] = files;
                        this.label = file.name;
                    } else{
                        this.label = this.defaultLabel;
                    }
                }
            }
        }
    </script>
</div>
