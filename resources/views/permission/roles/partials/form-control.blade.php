<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $role->name }}">
</div>
<div class="mb-3">
    <label for="guard_name" class="form-label">Guard Name</label>
    <input type="text" name="guard_name" id="guard_name" class="form-control" placeholder='default to "web"' value="{{ old('guard_name') ?? $role->guard_name }}">
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>
