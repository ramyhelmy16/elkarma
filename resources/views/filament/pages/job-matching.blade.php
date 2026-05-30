<x-filament-panels::page>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 space-y-4">
                <div class="text-lg font-medium text-gray-900 pb-6 border-b border-gray-200">
                    {{ $this->form }}
                </div>

                <div>
                    {{ $this->table }}
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
