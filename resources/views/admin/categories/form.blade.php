<div class="form-group">
    <label class="form-label">Titre*</label>
    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{$category->name ?? old('name')}}"
           placeholder="Nom de catégorie">
    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
@if(\Illuminate\Support\Str::contains(request()->path(),'sub') && isset($parent))
    <div class="form-group">
        <label class="form-label">Parent*</label>
        <select id="status" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
            @foreach($parent as $p)
                <option {{$category->parent_id === $p->id || old('parent_id') === $p->id ? 'selected' : ''}} value="{{$p->id}}">{{$p->name}}</option>
            @endforeach
        </select>
        @error('parent_id')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
@endif
<div class="form-group">
    <label class="form-label">Image de la catégorie*</label>
    @error('image')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                   name="image"
                   id="inputGroupFile04"
                   aria-describedby="inputGroupFileAddon04">

            <label class="custom-file-label" for="inputGroupFile04">Choisissez une image</label>
        </div>

    </div>
    <div class="add-cate-img">
        <img src="{{asset($category->image_url)}}" id="imagePreview" alt="{{$category->name ?? 'default image'}}">
    </div>
</div>
