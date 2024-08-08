@props(['authors', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($authors as $author)
        <option value="{{ $author->id }}" {{ $selected = $author->id ? 'selected' : '' }}>
            {{ $author->name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror