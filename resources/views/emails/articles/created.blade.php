@php
    $title = json_decode($article->title, true);
    $text = json_decode($article->text, true);
@endphp

@component('mail::message')
# New Article Created

Title (EN): {{ $title['en'] ?? 'N/A' }}  
Title (DE): {{ $title['de'] ?? 'N/A' }}

**Text (EN):**  
{{ $text['en'] ?? 'N/A' }}

**Text (DE):**  
{{ $text['de'] ?? 'N/A' }}

**View Count:** {{ $article->view_count }}

@if($article->image)
![Article Image]({{ asset( $article->image) }})
@endif

Thanks,  
{{ config('app.name') }}
@endcomponent
