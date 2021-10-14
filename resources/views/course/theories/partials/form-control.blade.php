@csrf
        <div class="mb-3">
            <input type="hidden" name="course_id" id="course_id" class="form-control" value="{{ old('course_id') ?? $course->id }}" readonly>
            @error('course_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter a title..." value="{{ old('title') ?? $theories->title }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="theory" class="form-label">Theory</label>
            <textarea name="theory" id="summernote" class="ckeditor form-control">{{ old('theory') ?? $theories->theory }}</textarea>
            @error('theory')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ $submit }}</button>
