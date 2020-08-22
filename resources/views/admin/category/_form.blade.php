@csrf
<div class="form-group">
    <label for="name">Category name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' value=" {{ old('name', $category->name ?? '') }}">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slug">Category Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name='slug' value=" {{ old('slug', $category->slug ?? '')}}">

    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="img">Category image</label>
    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name='img'>
    
    @if(isset($category))
        <img src="{{ $category->img ?? '/img/nophoto.png'}}" alt="" width="100px">
    @endif
    
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>