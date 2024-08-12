<?php
\Laravel\Folio\name('fact-checks.show');
?>
<x-layouts.portal title="Home" :banner="$factCheck->source">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.6.1/github-markdown.min.css"
          integrity="sha512-heNHQxAqmr9b5CZSB7/7NSC96qtb9HCeOKomgLFv9VLkH+B3xLgUtP73i1rM8Gpmfaxb7262LFLJaH/hKXyxyA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <main class="container mx-auto my-3" style="max-width: 1200px">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
            @dump($factCheck)
        </div>
    </main>
</x-layouts.portal>
