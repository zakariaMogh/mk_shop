<div class="form-group">
    <label class="form-label">Email*</label>
    <input type="text"
           name="email"
           class="form-control @error('email') is-invalid @enderror"
           value="{{$information->email ?? old('email')}}"
           placeholder="Email">
    @error('email')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Numero de tel*</label>
    <input type="text"
           name="phone"
           class="form-control @error('phone') is-invalid @enderror"
           value="{{$information->phone ?? old('phone')}}"
           placeholder="Numero de tel">
    @error('phone')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Wilaya*</label>
    <input type="text"
           name="wilaya"
           class="form-control @error('wilaya') is-invalid @enderror"
           value="{{$information->wilaya ?? old('wilaya')}}"
           placeholder="Wilaya">
    @error('wilaya')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Commune*</label>
    <input type="text"
           name="province"
           class="form-control @error('province') is-invalid @enderror"
           value="{{$information->province ?? old('province')}}"
           placeholder="Commune">
    @error('province')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Address*</label>
    <input type="text"
           name="address"
           class="form-control @error('address') is-invalid @enderror"
           value="{{$information->address ?? old('address')}}"
           placeholder="Address">
    @error('address')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Logo</label>
    @error('logo')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                   name="logo"
                   id="inputGroupFile04"
                   aria-describedby="inputGroupFileAddon04">

            <label class="custom-file-label" for="inputGroupFile04">Choisissez une image</label>
        </div>

    </div>
    <div class="add-cate-img">
        <img src="{{asset($information->logo_url)}}" id="imagePreview" alt="">
    </div>
</div>
