
@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Edit Article</h3>
    <form action="{{ route('articles.update', $articles->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="heading">Article Heading</label>
            <input type="text" name="heading" id="heading" class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" 
                   value="{{ old('heading', $articles->heading) }}" placeholder="Enter heading" required>
            @if($errors->has('heading'))
                <span class="invalid-feedback">
                    {{ $errors->first('heading') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="subheading">Article Subheading</label>
            <input type="text" name="subheading" id="subheading" class="form-control {{ $errors->has('subheading') ? 'is-invalid' : '' }}" 
                   value="{{ old('subheading', $articles->subheading) }}" placeholder="Enter subheading" required>
            @if($errors->has('subheading'))
                <span class="invalid-feedback">
                    {{ $errors->first('subheading') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="body">Article Description</label>
            <textarea name="body" id="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" 
                      placeholder="Enter Article Description" required>{{ old('body', $articles->body) }}</textarea>
            @if($errors->has('body'))
                <span class="invalid-feedback">
                    {{ $errors->first('body') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="category">Article Category</label>
            <input type="text" name="category" id="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" 
                   value="{{ old('category', $articles->category) }}" placeholder="Enter category" required>
            @if($errors->has('category'))
                <span class="invalid-feedback">
                    {{ $errors->first('category') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="pub_date">Publication Date</label>
            <input type="date" name="pub_date" id="pub_date" class="form-control {{ $errors->has('pub_date') ? 'is-invalid' : '' }}" 
                   value="{{ old('pub_date', $articles->pub_date) }}" required>
            @if($errors->has('pub_date'))
                <span class="invalid-feedback">
                    {{ $errors->first('pub_date') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="img_src">Image URL (optional)</label>
            <input type="file" name="img_src" id="img_src" class="form-control {{ $errors->has('img_src') ? 'is-invalid' : '' }}" 
                   placeholder="Enter image URL">
            @if($errors->has('img_src'))
                <span class="invalid-feedback">
                    {{ $errors->first('img_src') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="references">References</label>
            <input type="text" name="references" id="references" class="form-control {{ $errors->has('references') ? 'is-invalid' : '' }}" 
                   value="{{ old('references', $articles->references) }}" placeholder="Enter references">
            @if($errors->has('references'))
                <span class="invalid-feedback">
                    {{ $errors->first('references') }}
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
