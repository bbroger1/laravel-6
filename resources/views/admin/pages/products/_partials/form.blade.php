@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" id="name" placeholder="Nome:" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="price" id="price" placeholder="Preço: 0.00" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="description" id="description" placeholder="Descrição:" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="image" id="image">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
