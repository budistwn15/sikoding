@csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $skill->name }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="summernote" class="form-control">{{ old('description') ?? $skill->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                @if (old('picture') ?? $skill->picture)
                    <img src="{{ url('img/skills/'.$skill->picture) }}" alt="{{ $skill->name }}" class="img-fluid" width="250">
                @endif
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control">
                @error('picture')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ $submit }}</button>
