<div class="form-group">
    <label class="form-label">Titre*</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror"
           placeholder="Titre de la publicité"
           name="title"
           value="{{$banner->title ?? old('title')}}"
           required>

    @error('title')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Link</label>
    <input type="text" class="form-control @error('link') is-invalid @enderror"
           placeholder="Lien de la publicité"
           name="link"
           value="{{$banner->link ?? old('link')}}">
    @error('title')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Image*</label>
    @error('image')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                   id="pic"
                   aria-describedby="inputGroupFileAddon04"
                   name="image"
                   >
            <label class="custom-file-label" for="pic">Choisissez une image</label>
        </div>
    </div>
    <div class="add-cate-img-1">
        <img src="{{asset($banner->image_url)}}" alt="{{$banner->name ?? 'default image'}}" id="preview">
    </div>
</div>
