<div class="search__area visible-xs visible-sm visible-lg visible-md  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search__inner">
                    <form action="{{route('shop')}}" method="get">
                        <input placeholder="Recherche... " type="text" name="q" value="{{request()->get('q')}}">
                        <button type="submit"></button>
                    </form>
                    <div class="search__close__btn">
                        <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
