@csrf
<div class="form-group">
    <label for="product_id">Товар</label>
    <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name='product_id'>
        @foreach ($products as $product)
            <option value="{{$product->id}}" {{isset($slide) && $product->id==$slide->product->id ? 'selected' : ''}}>{{$product->name}}</option>
        @endforeach
    </select>
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="img">Изображение</label>
    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name='img'>
    
    @if(isset($slide))
        <img src="{{ $slide->img ?? '/img/nophoto.png'}}" alt="" width="900px">
    @endif
    
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
