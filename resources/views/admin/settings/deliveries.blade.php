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
                                        <option value="01 - Adrar">01 - Adrar</option>
                                        <option value="02 - Chlef">02 - Chlef</option>
                                        <option value="03 - Laghouat">03 - Laghouat</option>
                                        <option value="04 - Oum El Bouaghi">04 - Oum El Bouaghi</option>
                                        <option value="05 - Batna">05 - Batna</option>
                                        <option value="06 - Béjaïa">06 - Béjaïa</option>
                                        <option value="07 - Biskra">07 - Biskra</option>
                                        <option value="08 - Béchar">08 - Béchar</option>
                                        <option value="09 - Blida">09 - Blida</option>
                                        <option value="10 - Bouïra">10 - Bouïra</option>
                                        <option value="11 - Tamanrasset">11 - Tamanrasset</option>
                                        <option value="12 - Tébessa">12 - Tébessa</option>
                                        <option value="13 - Tlemcen">13 - Tlemcen</option>
                                        <option value="14 - Tiaret">14 - Tiaret</option>
                                        <option value="15 - Tizi Ouzou">15 - Tizi Ouzou</option>
                                        <option value="16 - Alger">16 - Alger</option>
                                        <option value="17 - Djelfa">17 - Djelfa</option>
                                        <option value="18 - Jijel">18 - Jijel</option>
                                        <option value="19 - Sétif">19 - Sétif</option>
                                        <option value="20 - Saïda">20 - Saïda</option>
                                        <option value="21 - Skikda">21 - Skikda</option>
                                        <option value="22 - Sidi Bel Abbès">22 - Sidi Bel Abbès</option>
                                        <option value="23 - Annaba">23 - Annaba</option>
                                        <option value="24 - Guelma">24 - Guelma</option>
                                        <option value="25 - Constantine">25 - Constantine</option>
                                        <option value="26 - Médéa">26 - Médéa</option>
                                        <option value="27 - Mostaganem">27 - Mostaganem</option>
                                        <option value="28 - M'Sila">28 - M'Sila</option>
                                        <option value="29 - Mascara">29 - Mascara</option>
                                        <option value="30 - Ouargla">30 - Ouargla</option>
                                        <option value="31 - Oran">31 - Oran</option>
                                        <option value="32 - El Bayadh">32 - El Bayadh</option>
                                        <option value="33 - Illizi">33 - Illizi</option>
                                        <option value="34 - Bordj Bou Arréridj">34 - Bordj Bou Arréridj</option>
                                        <option value="35 - Boumerdès">35 - Boumerdès</option>
                                        <option value="36 - El Tarf">36 - El Tarf</option>
                                        <option value="37 - Tindouf">37 - Tindouf</option>
                                        <option value="38 - Tissemsilt">38 - Tissemsilt</option>
                                        <option value="39 - El Oued">39 - El Oued</option>
                                        <option value="40 - Khenchela">40 - Khenchela</option>
                                        <option value="41 - Souk Ahras">41 - Souk Ahras</option>
                                        <option value="42 - Tipaza">42 - Tipaza</option>
                                        <option value="43 - Mila">43 - Mila</option>
                                        <option value="44 - Aïn Defla">44 - Aïn Defla</option>
                                        <option value="45 - Naâma">45 - Naâma</option>
                                        <option value="46 - Aïn Témouchent">46 - Aïn Témouchent</option>
                                        <option value="47 - Ghardaïa">47 - Ghardaïa</option>
                                        <option value="48 - Relizane">48 - Relizane</option>
                                        <option value="49 - El M'ghair">49 - El M'ghair</option>
                                        <option value="50 - El Menia">50 - El Menia</option>
                                        <option value="51 - Ouled Djellal">51 - Ouled Djellal</option>
                                        <option value="52 - Bordj Baji Mokhtar">52 - Bordj Baji Mokhtar</option>
                                        <option value="53 - Béni Abbès">53 - Béni Abbès</option>
                                        <option value="54 - Timimoun">54 - Timimoun</option>
                                        <option value="55 - Touggourt">55 - Touggourt</option>
                                        <option value="56 - Djanet">56 - Djanet</option>
                                        <option value="57 - In Salah">57 - In Salah</option>
                                        <option value="58 - In Guezzam">58 - In Guezzam</option>
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
                                <button class="save-btn hover-btn" type="submit">Enregistrer / Modifier</button>
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
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deliveries as $delivery)
                                        <tr>
                                            <td>{{$delivery->location}}</td>
                                            <td>{{$delivery->domicile}} DZD</td>
                                            <td>{{$delivery->bureau}} DZD</td>
                                            <td>
                                                <form action="{{route('admin.deliveries.destroy', $delivery->id)}}" method="post"
                                                      id="delete-delivery-form">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="delete-btn btn p-0" onclick="return confirm('Voulez vous vraiment supprimer cette livraison')"
                                                            id="delete-delivery">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
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
