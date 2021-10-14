                @csrf
                <div class="mb-3">
                    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                </div>
                <div class="mb-3">
                    <label for="name_course" class="form-label">Name</label>
                    <input type="text" name="name_course" id="name_course" class="form-control" value="{{ old('name_course') ?? $course->name_course }}" placeholder="Enter the course name...">
                    @error('name_course')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description_course" class="form-label">Description</label>
                    <textarea placeholder="Enter a course description..." name="description_course" id="summernote" class="form-control">{{ old('description_course') ?? $course->description_course }}</textarea>
                    @error('description_course')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @if($course->thumbnail_course)
                <div class="mb-3">
                    <img src="{{ asset('img/courses/'.$course->thumbnail_course) }}" width="80" alt="">
                </div>
                @endif
                <div class="mb-3">
                    <label for="thumbnail_course" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail_course" id="thumbnail_course" class="form-control">
                    @error('thumbnail_course')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="skill" class="form-label">Skills</label>
                    <select name="skill_id" id="skill_id" class="form-select">
                        <option disabled selected>Choose Skill</option>
                        @foreach ($skills as $skill)
                            <option {{ $skill->id == $course->skill_id ? 'selected' : '' }} value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                    @error('skill_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
