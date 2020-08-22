@csrf
<div class="form-group">
    <label for="name">Product name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' value=" {{ old('name', $product->name ?? '') }}">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slug">Product slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name='slug' value=" {{ old('slug', $product->slug ?? '') }}">

    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="category">Product category</label>
    <select class="form-control @error('category') is-invalid @enderror" id="category" name='category'>
        @foreach ($categories as $category)
            <option value="{{$category->id}}" {{isset($product) ? ($category->id==$product->category->id ? 'selected' : '') : ''}}>{{$category->name}}</option>
        @endforeach
    </select>
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="description">Product description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name='description'>{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="price">Product price</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name='price' value="{{ old('price', $product->price ?? '') }}">

    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="img">Product image</label>
    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name='img'>
    
    @if(isset($product))
        <img src="{{ $product->img ?? '/img/nophoto.png'}}" alt="" width="100px">
    @endif

    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="recomended">Recomended product</label>
    <input type="checkbox" class=" @error('recomended') is-invalid @enderror" id="recomended" name='recomended' value="1" width="10px" height="10px" {{isset($product) ? ($product->recomended ? 'checked' : '') : ''}}>

    @error('recomended')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>