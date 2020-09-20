@csrf
<div class="form-group">
    <label for="name">Tag name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' value=" {{ old('name', $tag->name ?? '') }}">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slug">Tag Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name='slug' value=" {{ old('slug', $tag->slug ?? '')}}">

    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
