<?php
\Laravel\Folio\name('dashboard');
?>

<x-layouts.portal title="Home">
    <main class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <livewire:list-incidents/>
        </div>
    </main>
</x-layouts.portal>
