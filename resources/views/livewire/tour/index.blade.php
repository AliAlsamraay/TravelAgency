<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('tour_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Tour" format="csv" />
                <livewire:excel-export model="Tour" format="xlsx" />
                <livewire:excel-export model="Tour" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.tour.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.start_date') }}
                            @include('components.table.sort', ['field' => 'start_date'])
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.end_date') }}
                            @include('components.table.sort', ['field' => 'end_date'])
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.tour_package') }}
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.hotel') }}
                            @include('components.table.sort', ['field' => 'hotel.name'])
                        </th>
                        <th>
                            {{ trans('cruds.tour.fields.location') }}
                            @include('components.table.sort', ['field' => 'location.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tours as $tour)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $tour->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $tour->id }}
                            </td>
                            <td>
                                {{ $tour->name }}
                            </td>
                            <td>
                                {{ $tour->description }}
                            </td>
                            <td>
                                {{ $tour->start_date }}
                            </td>
                            <td>
                                {{ $tour->end_date }}
                            </td>
                            <td>
                                @foreach($tour->tourPackage as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($tour->hotel)
                                    <span class="badge badge-relationship">{{ $tour->hotel->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($tour->location)
                                    <span class="badge badge-relationship">{{ $tour->location->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('tour_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.tours.show', $tour) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('tour_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.tours.edit', $tour) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('tour_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $tour->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $tours->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush