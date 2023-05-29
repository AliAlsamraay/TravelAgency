<?php

namespace App\Http\Livewire\Location;

use App\Models\Location;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Location $location;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->location->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Location $location)
    {
        $this->location         = $location;
        $this->mediaCollections = [

            'location_image' => $location->image,
        ];
    }

    public function render()
    {
        return view('livewire.location.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->location->save();
        $this->syncMedia();

        return redirect()->route('admin.locations.index');
    }

    protected function rules(): array
    {
        return [
            'location.name' => [
                'string',
                'required',
            ],
            'location.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.location_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.location_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
