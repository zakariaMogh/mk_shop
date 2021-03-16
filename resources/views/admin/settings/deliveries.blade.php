@extends('admin.layouts.app')

@section('content')
    <h2 class="mt-30 page-title">Paramètres général</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Paramètres général</li>
    </ol>
    <div class="d-flex ">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="left-side-tabs">
                <div class="dashboard-left-links">
                    <a href="{{route('admin.deliveries.index')}}" class="user-item active"><i class="far fa-image"></i>Livraison</a>
                </div>

                <div class="card card-static-2 mb-30">
                    <div class="card-body-table">
                        <div class="news-content-right pd-20">
                            @if ($errors->any())
                                <div class="w-100 text-danger mb-2">
                                    @foreach ($errors->all() as $error)
                                        <small>* {{ $error }}</small><br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('admin.deliveries.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Wilaya</label>
                                    <select id="categeory" name="location" class="form-control">
                                        <option selected>--Selectioneer wilaya--</option>
                                        <option value="Adrar">Adrar</option>
                                        <option value="Chlef">Chlef</option>
                                        <option value="Laghouat">Laghouat</option>
                                        <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                                        <option value="Batna">Batna</option>
                                        <option value="Béjaïa">Béjaïa</option>
                                        <option value="Biskra">Biskra</option>
                                        <option value="Béchar">Béchar</option>
                                        <option value="Blida">Blida</option>
                                        <option value="Bouïra">Bouïra</option>
                                        <option value="Tamanrasset">Tamanrasset</option>
                                        <option value="Tébessa">Tébessa</option>
                                        <option value="Tlemcen">Tlemcen</option>
                                        <option value="Tiaret">Tiaret</option>
                                        <option value="Tizi Ouzou">Tizi Ouzou</option>
                                        <option value="Alger">Alger</option>
                                        <option value="Djelfa">Djelfa</option>
                                        <option value="Jijel">Jijel</option>
                                        <option value="Sétif">Sétif</option>
                                        <option value="Saïda">Saïda</option>
                                        <option value="Skikda">Skikda</option>
                                        <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                                        <option value="Annaba">Annaba</option>
                                        <option value="Guelma">Guelma</option>
                                        <option value="Constantine">Constantine</option>
                                        <option value="Médéa">Médéa</option>
                                        <option value="Mostaganem">Mostaganem</option>
                                        <option value="M'Sila">M'Sila</option>
                                        <option value="Mascara">Mascara</option>
                                        <option value="Ouargla">Ouargla</option>
                                        <option value="Oran">Oran</option>
                                        <option value="El Bayadh">El Bayadh</option>
                                        <option value="Illizi">Illizi</option>
                                        <option value="Bordj Bou Arréridj">Bordj Bou Arréridj</option>
                                        <option value="Boumerdès">Boumerdès</option>
                                        <option value="El Tarf">El Tarf</option>
                                        <option value="Tindouf">Tindouf</option>
                                        <option value="Tissemsilt">Tissemsilt</option>
                                        <option value="El Oued">El Oued</option>
                                        <option value="Khenchela">Khenchela</option>
                                        <option value="Souk Ahras">Souk Ahras</option>
                                        <option value="Tipaza">Tipaza</option>
                                        <option value="Mila">Mila</option>
                                        <option value="Aïn Defla">Aïn Defla</option>
                                        <option value="Naâma">Naâma</option>
                                        <option value="Aïn Témouchent">Aïn Témouchent</option>
                                        <option value="Ghardaïa">Ghardaïa</option>
                                        <option value="Relizane">Relizane</option>
                                        <option value="El M'ghair">El M'ghair</option>
                                        <option value="El Menia">El Menia</option>
                                        <option value="Ouled Djellal">Ouled Djellal</option>
                                        <option value="Bordj Baji Mokhtar">Bordj Baji Mokhtar</option>
                                        <option value="Béni Abbès">Béni Abbès</option>
                                        <option value="Timimoun">Timimoun</option>
                                        <option value="Touggourt">Touggourt</option>
                                        <option value="Djanet">Djanet</option>
                                        <option value="In Salah">In Salah</option>
                                        <option value="In Guezzam">In Guezzam</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Domicile</label>
                                    <input type="text" class="form-control datepicker-here" data-language='en'
                                           placeholder="000 DZD" name="domicile" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bureau</label>
                                    <input type="text" class="form-control datepicker-here" data-language='en'
                                           placeholder="000 DZD" name="bureau" required>
                                </div>
                                <button class="save-btn hover-btn" type="submit">Enregistrer</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Livraison</h4>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card card-static-2 mb-30">
                        <div class="card-body-table">
                            <div class="table-responsive">
                                <table class="table ucp-table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Wilaya</th>
                                        <th>Domicile</th>
                                        <th>Bureau</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deliveries as $delivery)
                                        <tr>
                                            <td>{{$delivery->location}}</td>
                                            <td>{{$delivery->domicile}} DZD</td>
                                            <td>{{$delivery->bureau}} DZD</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-5">

                </div>


            </div>
        </div>
    </div>

@endsection
