@pushonce('filament-styles:html-editor-component')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.css">

<style>
    .jodit-workplace {
        min-height: 250px;
        padding: .5rem .75rem;
    }

    .jodit-toolbar__box:not(:empty) {
        border-radius: .375rem;
        border: 1px solid rgba(157, 153, 134, 1);
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-right: none;
        border-left: none;
        background-color: rgba(248, 248, 242, 1);
    }

    .jodit-icon {
        stroke: rgba(39, 40, 34, 1);
        fill: rgba(39, 40, 34, 1);
    }

    .jodit-container {
        border-radius: .375rem;
        border: 1px solid rgba(157, 153, 134, 1);
        border-top: none;
    }

    .jodit-toolbar-button.jodit-toolbar-button_h1 {
        display: none;
    }

    .jodit-wysiwyg {
        cursor: text;
    }
</style>
@endpushonce

@pushonce('filament-scripts:html-editor-component')
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.js"></script>
@endpushonce
@php($uuid = uniqid())
<x-forms::field-group
    :column-span="$formComponent->getColumnSpan()"
    :error-key="$formComponent->getName()"
    :for="$formComponent->getId().$uuid"
    :help-message="$formComponent->getHelpMessage()"
    :hint="$formComponent->getHint()"
    :label="$formComponent->getLabel()"
    :required="$formComponent->isRequired()"
>
    <div
        x-data="{
            value: @entangle($formComponent->getName()).defer,
        }"
        @unless ($formComponent->isDisabled())
        x-init="
            editor = new Jodit('#' + '{{$formComponent->getId().$uuid}}',{
                'useSearch': false,
                'disablePlugins': 'about,iframe,indent,print,preview,file',
                'inline': true,
                'toolbarInlineForSelection': false,
                'showPlaceholder': false,
                'buttons': '{{implode(',',$formComponent->getToolbarButtons())}}',
                'buttonsMD': '{{implode(',',$formComponent->getToolbarButtons())}}',
                'buttonsSM': '{{implode(',',$formComponent->getToolbarButtons())}}',
                'buttonsXS': '{{implode(',',$formComponent->getToolbarButtons())}}',
            });

            editor.value = value;

            $watch('value', () => {
                if (document.activeElement === $refs.jodit{{$uuid}}) return

                editor.value = value;
            })
        "
        x-on:change="
            value = editor.value;
        "
        @endunless
        x-cloak
        wire:ignore
    >
        @unless ($formComponent->isDisabled())
            <textarea
                {!! $formComponent->isAutofocused() ? 'autofocus' : null !!}
                {!! $formComponent->getId() ? "id=\"{$formComponent->getId()}$uuid\"" : null !!}
                {!! $formComponent->getName() ? "{$formComponent->getBindingAttribute()}=\"{$formComponent->getName()}\"" : null !!}
                {!! $formComponent->getPlaceholder() ? "placeholder=\"{$formComponent->getPlaceholder()}\"" : null !!}
                {!! $formComponent->isRequired() ? 'required' : null !!}
                x-ref="jodit{{$uuid}}"
                wire:key="{{$uuid}}"
                class="block w-full prose placeholder-gray-400 placeholder-opacity-100 bg-white border-secondary-100 rounded shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 max-w-none"
                {!! Filament\format_attributes($formComponent->getExtraAttributes()) !!}></textarea>
        @else
            <div x-html="value" class="p-3 prose border border-secondary-100 rounded shadow-sm"></div>
        @endunless
    </div>
</x-forms::field-group>
