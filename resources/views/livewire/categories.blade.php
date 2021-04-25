<div>
    <div class="form-group">
        <label class="form-label" for="parent">Catégorie*</label>
        <select id="parent" name="categories[]" class="form-control  @error('categories') is-invalid @enderror"  required wire:model.lazy="category">
            @if(\Illuminate\Support\Str::contains(request()->path(),'edit'))
                <option  disabled >--Choisir une catégorie--</option>
                @foreach($categories as $c)
                    <option value="{{$c->id}}" {{$product->category->contains($c->id)  ? 'selected' : ''}}>{{$c->name}}</option>
                @endforeach
            @else
                <option  disabled >--Choisir une catégorie--</option>
                @foreach($categories as $c)
                    <option value="{{$c->id}}" {{$c->id == old('categories.0') ? 'selected' : ''}}>{{$c->name}}</option>
                @endforeach
            @endif
        </select>
        @error('categories')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="children">Sous-catégorie*</label>
        <select id="children" name="categories[]" class="form-control @error('categories') is-invalid @enderror" required>
            @if(\Illuminate\Support\Str::contains(request()->path(),'edit'))
                <option  disabled>--Choisir une sous-catégorie --</option>
                @foreach($sub_categories as $cat)
                    <option class="sub-cate-to-{{$cat->parent_id}}"  value="{{$cat->id}}" {{$product->sub_category->contains($cat->id)  ? 'selected' : ''}}>{{$cat->name}}</option>
                @endforeach
            @else
                <option  {{old('categories.1') === null ? 'selected' : '' }} disabled>--Choisir une sous-catégorie --</option>
                @foreach($sub_categories as $cat)
                    <option class="sub-cate-to-{{$cat->parent_id}}"  value="{{$cat->id}}" {{$cat->id === old('categories.1') ? 'selected' : ''}} >{{$cat->name}}</option>
                @endforeach
            @endif

        </select>
        @error('categories')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>
