<option value="">--</option>
@foreach ($locations as $locationData)
    <option value="{{ $locationData->location->id }}">{{ ucwords($locationData->location->location) }}</option>
@endforeach
