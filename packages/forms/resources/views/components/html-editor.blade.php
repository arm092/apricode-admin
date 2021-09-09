@pushonce('filament-styles:html-editor-component')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.css">

<style>
    .jodit-workplace {
        min-height: 250px;
        @apply px-3;
    }

    .jodit-container {
        @apply rounded-md;
        @apply border-secondary-100;
        @apply focus:border-blue-300;
        @apply focus:ring;
        @apply focus:ring-blue-200;
        @apply focus:ring-opacity-50 ;
    }

    .jodit-toolbar-button.jodit-toolbar-button_h1 {
        display: none;
    }
</style>
@endpushonce

@pushonce('filament-scripts:html-editor-component')
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.js"></script>
@endpushonce

<x-forms::field-group
    :column-span="$formComponent->getColumnSpan()"
    :error-key="$formComponent->getName()"
    :for="$formComponent->getId()"
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
                editor = new Jodit('#' + '{{$formComponent->getId()}}',{
                    'useSearch': false,
                    'disablePlugins': 'about,iframe,indent,print,preview,file',
                    'inline': true,
                    'toolbarInlineForSelection': true,
                    'showPlaceholder': false,
                    'buttons': 'source,paragraph,bold,italic,underline,strikethrough,eraser,ul,ol,left,center,right,fontsize,image,video,copyformat,hr,table,link'
                });
                editor.value = value;

                $watch('value', () => {
                    if (document.activeElement === $refs.jodit) return

                    editor.value = value;
                })
            "
        x-on:trix-attachment-add="
                if (! $event.attachment.file) return

                let attachment = $event.attachment

                let formData = new FormData()
                formData.append('directory', '{{ $formComponent->getAttachmentDirectory() }}')
                formData.append('disk', '{{ $formComponent->getAttachmentDiskName() }}')
                formData.append('file', attachment.file)

                fetch('{{ $formComponent->getAttachmentUploadUrl() }}', {
                    body: formData,
                    credentials: 'same-origin',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    method: 'POST',
                })
                .then((response) => response.text())
                .then((url) => {
                    attachment.setAttributes({
                        url: url,
                        href: url,
                    })
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
            <textarea {{ $formComponent->isAutofocused() ? 'autofocus' : null }}
                      id="{{ $formComponent->getId() }}"
                      placeholder="{{ __($formComponent->getPlaceholder()) }}"
                      x-ref="jodit"
                      class="block w-full prose placeholder-gray-400 placeholder-opacity-100 bg-white border-secondary-100 rounded shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 max-w-none"
                {!! Filament\format_attributes($formComponent->getExtraAttributes()) !!}></textarea>
        @else
            <div x-html="value" class="p-3 prose border border-secondary-100 rounded shadow-sm"></div>
        @endunless
    </div>
</x-forms::field-group>
