@props([
    'title' => '', 
])

<div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 bg-white border-b border-gray-200"
     style="text-align: center; font-weight: bold; font-size: 1.5rem; padding: 1rem 0;">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div class="text-center sm:text-left">
            {{ $title }}
        </div>
    </div>
</div>