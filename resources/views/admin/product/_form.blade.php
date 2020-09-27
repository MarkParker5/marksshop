@csrf
<div class="form-group">
    <label for="name">Название товара</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' value=" {{ old('name', $product->name ?? '') }}">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slug">Постоянная ссылка</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name='slug' value=" {{ old('slug', $product->slug ?? '') }}">

    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="category">Категория</label>
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
    <label for="description">Описание</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name='description'>{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name='price' value="{{ old('price', $product->price ?? '') }}">

    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="img">Изображение</label>
    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name='img'>

    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row mb-5">
    @if(isset($product))
        <img src="{{ $product->img ?? '/img/nophoto.png'}}" alt="" class="col-4">
    @endif
</div>
<div class="form-group">
    <label for="images">Дополнительные изображения</label>
    <input multiple="multiple" type="file" class="form-control @error('images') is-invalid @enderror" id="images" name='images[]'>

    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@if(isset($product))
    <div class="row mb-5">
        @foreach($product->images as $image)
            <img src="{{ $image->img ?? '/img/nophoto.png'}}" alt="" class="col-4 mt-2">
        @endforeach
    </div>
@endif
<div class="form-group">
    <label for="tags">Теги</label>
    <select class="form-control @error('tags') is-invalid @enderror" id="tags" name='tags[]' multiple="multiple" style="height:120pt">
        @foreach ($tags as $tag)
            <option value="{{$tag->id}}" {{isset($product) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : ''}}>{{$tag->name}}</option>
        @endforeach
    </select>
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="cross_sell[]">Сопутствующие</label>
    <select class="form-control @error('cross_sell') is-invalid @enderror" id="cross_sell[]" name='cross_sell[]' multiple="multiple">
        @foreach ($products as $product)
            <option value="{{$product->id}}" {{isset($product) && in_array($product->id, $product->crossSell) ? 'selected' : ''}}>{{$product->name}}</option>
        @endforeach
    </select>
    @error('cross_sell')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="upsell[]">Апсейлы</label>
    <select class="form-control @error('upsell') is-invalid @enderror" id="upsell[]" name='upsell[]' multiple="multiple">
        @foreach ($products as $product)
            <option value="{{$product->id}}" {{isset($product) && in_array($product->id, $product->upsell) ? 'selected' : ''}}>{{$product->name}}</option>
        @endforeach
    </select>
    @error('upsell')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="recomended">Рекомендованный</label>
    <input type="checkbox" class=" @error('recomended') is-invalid @enderror" id="recomended" name='recomended' value="1" width="10px" height="10px" {{isset($product) ? ($product->recomended ? 'checked' : '') : ''}}>

    @error('recomended')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>