<?php
\Laravel\Folio\name("incidents.show");
/**
 * @var \App\Models\Incident $incident
 */
?>

@php
    $incident->loadMissing([
        'medias',
        'factChecks'
    ]);
@endphp


<x-layouts.portal title="Home" :banner="$incident->title">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.6.1/github-markdown.min.css"
          integrity="sha512-heNHQxAqmr9b5CZSB7/7NSC96qtb9HCeOKomgLFv9VLkH+B3xLgUtP73i1rM8Gpmfaxb7262LFLJaH/hKXyxyA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <main class="container mx-auto my-3" style="max-width: 1200px">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
            <div>
                Date : {{ $incident->date?->format('d M Y') }}
            </div>
            <div class="markdown-body">
                {!! str($incident->description??'')->markdown() !!}
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-3 p-4">
            <h3 class="font-bold text-2xl underline mb-3">Attachments</h3>

            <div class="grid grid-cols-3 gap-3">
                @foreach($incident->medias as $media)
                    <a href="{{Storage::url($media->path)}}"
                       target="_blank"
                       class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $media->created_at->format('d M Y') }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Click to View Details
                        </p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-3 p-4">
            <h3 class="font-bold text-2xl underline mb-3">Fact Checks</h3>

            <ol class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                @foreach($incident->factChecks as $factCheck)
                    <li>
                        <a href="{{route('fact-checks.show',['factCheck'=>$factCheck->id])}}">
                            {{$factCheck->source}}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    </main>

</x-layouts.portal>
