@push('css')
    @livewireStyles
@endpush
<div class="form-group">
    <label class="form-label">Titre*</label>
    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{$product->name ?? old('name')}}"
           placeholder="Nom du produit">
    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

@include('admin.categories.partials.sub_categories')


<div class="form-group">
    <label class="form-label" for="price">Prix*</label>
    <input type="number"
           id="price"
           value="{{$product->price ?? old('price')}}"
           class="form-control @error('price') is-invalid @enderror"
           placeholder="DZD" name="price">
    @error('price')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label class="form-label" for="cashback">Reduction*</label>
    <input type="number" id="cashback"
           class="form-control @error('cashback') is-invalid @enderror"
           placeholder="Nouveau prix"
           name="cashback"
           value="{{$product->cashback ?? old('cashback')}}"
    >
    @error('cashback')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Couleur*</label>
    <input type="text"
           name="color"
           class="form-control @error('color') is-invalid @enderror"
           value="{{$product->color ?? old('color')}}"
           placeholder="Couleur du produit">
    @error('color')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Marque</label>
    <input type="text"
           name="brand"
           class="form-control @error('brand') is-invalid @enderror"
           value="{{$product->brand ?? old('brand')}}"
           placeholder="Marque du produit">
    @error('brand')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Qualité</label>
    <input type="text"
           name="quality"
           class="form-control @error('quality') is-invalid @enderror"
           value="{{$product->quality ?? old('quality')}}"
           placeholder="Qualité du produit">
    @error('quality')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

@if($product->product_details()->count() > 0)
    <livewire:admin.product-detail :product="$product"/>
@else
    <livewire:admin.product-detail/>
@endif

<div class="form-group">
    <label class="form-label" for="edit">Description*</label>
    @error('description')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    <div class="card card-editor">
        <div class="content-editor">
            <textarea id='edit' name="description" class="@error('description') is-invalid @enderror form-control" rows="10">
                {!! $product->description ?? old('description') !!}
            </textarea>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Image*</label>
    @error('images')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('images') is-invalid @enderror"
                   name="images[]"
                   id="inputGroupFile04"
                   aria-describedby="inputGroupFileAddon04"
                   multiple
            >

            <label class="custom-file-label" for="inputGroupFile04">Choisissez une image</label>
        </div>

    </div>
    <div class="d-flex justify-content-around flex-wrap">
        @for( $i = 0 ; $i <10 ; $i++)
            <div class="add-cate-img">
                <img src="{{isset($product->images[$i]) ? $product->images[$i]->image_url : null}}"
                     id="imagePreview-{{$i}}" alt="{{isset($product->images[$i]) ? $product->name : ''}}"
                     class="image-preview">
            </div>
        @endfor
    </div>

</div>
@push('js')
    <script>

        const readURLS = (input, id) => {
            $('.image-preview').each(function () {
                $(this).attr('src', '')
            })
            if (input.files) {
                var filesAmount = input.files.length;
                for (let i = 0; i < filesAmount; i++) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let id = document.getElementsByClassName("image-preview")[i].id
                        $('#' + id).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[i]);

                }
            }
        }
        $("#inputGroupFile04").change(function () {
            readURLS(this, 'pic_preview');
        });
    </script>
    @livewireScripts
@endpush


{{--<div class="add-cate-img">--}}
{{--    <img src="{{$product->image_url}}" id="imagePreview" alt="{{$product->name ?? 'default image'}}">--}}
{{--</div>--}}
