<div class="mb-3">
    <label for="name" class="form-label">{{ __('conferences.name') }} <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" 
           id="name" name="name" 
           value="{{ old('name', $conference->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">{{ __('conferences.description') }} <span class="text-danger">*</span></label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
              id="description" name="description" rows="4" required>{{ old('description', $conference->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="lecturers" class="form-label">{{ __('conferences.lecturers') }} <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('lecturers') is-invalid @enderror" 
           id="lecturers" name="lecturers" 
           value="{{ old('lecturers', $conference->lecturers ?? '') }}" required>
    @error('lecturers')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="date" class="form-label">{{ __('conferences.date') }} <span class="text-danger">*</span></label>
    <input type="date" class="form-control @error('date') is-invalid @enderror" 
           id="date" name="date" 
           value="{{ old('date', $conference->date ?? '') }}" required>
    @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="time" class="form-label">{{ __('conferences.time') }} <span class="text-danger">*</span></label>
    <input type="time" class="form-control @error('time') is-invalid @enderror" 
           id="time" name="time" 
           value="{{ old('time', $conference->time ?? '') }}" required>
    @error('time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">{{ __('conferences.address') }} <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('address') is-invalid @enderror" 
           id="address" name="address" 
           value="{{ old('address', $conference->address ?? '') }}" required>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

