@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="margin-bottom:20px">
                <div class="card-body">
                    <div class="row mb-3" style="padding: 10px">
                        <div class="col-md-3">
                            <label for="age" class="col-form-label text-md-center">{{ __('Age') }}</label>
                            <input id="age" type="text" onkeyup="diableBtnSearch()" onkeydown ="limitKeyboardOnInputAge()" class="form-control @error('age') is-invalid @enderror @error('operator') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="> 50 ou < 50" title="Adicione o operador e o valor em anos">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @enderror

                        @error('operator')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('operator') }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4 text-end">
                            <button id="btnClear" onclick="clearFilter()" class="btn btn-success">
                                {{ __('Clear') }}
                            </button>

                            <button id="btnSearch" onclick="searchData()" class="btn btn-primary" style="margin: 10px" disabled>
                                {{ __('Search') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('People Table') }}</div>

                <div class="card-body">
                    <table class="table table-hover"width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">{{__('Code')}}</th>
                                <th>{{__('Name')}}</th>
                                <th class="text-center">{{__('cpf')}}</th>
                                <th class="text-center">{{__('Gender')}}</th>
                                <th class="text-center">{{__('Phone')}}</th>
                                <th>{{__('Address')}}</th>
                                <th>{{__('Address Number')}}</th>
                                <th>{{__('District')}}</th>
                                <th class="text-center">{{__('cep')}}</th>
                                <th class="text-center">{{__('Year Of Birth')}}</th>
                                @if(!(optional($people->first())->desiredAge === null))
                                    <th class="text-center">{{__('Result'). '( '. $people->first()->paramsRequest . ' )' }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $person)
                            <tr>
                                <th class="text-center">{{$person->id}}</th>
                                <th>{{$person->name}}</th>
                                <th class="text-center">{{$person->cpf}}</th>
                                <th class="text-center">{{$person->gender}}</th>
                                <th class="text-center">{{$person->phone}}</th>
                                <th>{{$person->address}}</th>
                                <th>{{$person->address_number}}</th>
                                <th>{{$person->district}}</th>
                                <th class="text-center">{{$person->cep}}</th>
                                <th class="text-center">{{$person->year_of_birth}}</th>
                                @if(!($person->desiredAge === null))
                                    <th class="text-center">{{$person->desiredAge ? 'Sim' : 'Não'}}</th>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function searchData()
    {
        const age = document.getElementById("age").value;

        let url = new URL(window.location.href);
        url.search = ''

        let search_params = url.searchParams;

        url.search = search_params.toString();

        search_params.append('age', age);

        let new_url = url.toString();

        window.location.href = new_url
    }

    function clearFilter()
    {
        let url = new URL(window.location.href);
        url.search = ''

        let new_url = url.toString();

        window.location.href = new_url
    }

    function limitKeyboardOnInputAge()
    {
        const keyCode = event.keyCode

        if (![37, 16, 32, 8, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 39, 188, 190].includes(keyCode)) {
            event.preventDefault();
        }
    }

    function diableBtnSearch()
    {
        const age = document.getElementById("age").value;

        if (age.length) {
            document.getElementById("btnSearch").disabled = false
        } else {
            document.getElementById("btnSearch").disabled = true
        }
    }
</script>
