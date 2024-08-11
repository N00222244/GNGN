@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Edit authors</h3>
    <form action="{{ route('admin.authors.update', $authors->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Article Heading</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                   value="{{ old('name', $authors->name) }}" placeholder="Enter name" required>
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="subheading">author bio</label>
            <input type="text" name="bio" id="bio" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" 
                   value="{{ old('bio', $authors->bio) }}" placeholder="Enter bio" required>
            @if($errors->has('bio'))
                <span class="invalid-feedback">
                    {{ $errors->first('bio') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="phone_no">author Description</label>
            <textarea name="phone_no" id="phone_no" rows="4" class="form-control {{ $errors->has('phone_no') ? 'is-invalid' : '' }}" 
                      placeholder="Enter author Description" required>{{ old('phone_no', $authors->phone_no) }}</textarea>
            @if($errors->has('phone_no'))
                <span class="invalid-feedback">
                    {{ $errors->first('phone_no') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">author email</label>
            <input type="text" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                   value="{{ old('email', $authors->email) }}" placeholder="Enter email" required>
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{ $errors->first('email') }}
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

        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
