@extends('layouts.layout')

@section('content')
<div class="container">
<div class="content">
    <h1>Pas profiel aan</h1>

    <form method="post" action="{{ route('users.update', ['user' => auth()->user()->id]) }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label" for="name">Naam</label>
            <div class="control">
                <input class="input" type="text" name="name" id="user_name" value="{{ $user->name }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="street">Straat</label>
            <div class="control">
                <input class="input" type="text" name="street" id="user_street" value="{{ $user->street }}">
            </div>

            <label class="label" for="number">Huisnummer</label>
            <div class="control">
                <input class="input" type="text" name="number" id="user_number" value="{{ $user->number }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="postcode">Postcode</label>
            <div class="control">
                <input class="input" type="text" name="postcode" id="user_postcode" value="{{ $user->postcode }}">
            </div>

            <label class="label" for="city">Woonplaats</label>
            <div class="control">
                <input class="input" type="text" name="city" id="user_city" value="{{ $user->city }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="country">Land</label>
            <div class="control">
                <input class="input" type="text" name="country" id="user_country" value="{{ $user->country }}">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 form-group">
            
            <label class="control-label" for="role">Rollen</label>
                    <!-- <button type="button" class="btn btn-primary btn-xs" id="selectbtn-tag">
                        Select all 
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-tag">
                        Deselect all
                    </button> -->
                    <!--  ('category[]', $categories, old('category'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-category' ])  -->
            <select id="role" multiple name="role[]">
                @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ Bouncer::is($user)->an($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>

            <p class="help-block"></p>
            @if($errors->has('category'))
            <p class="help-block">
            {{ $errors->first('category') }}
            </p>
            @endif
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="btn btn-success is-link" type="submit">Pas profiel aan</button>
            </div>
        </div>
    </form>


</div>
</div>
@endsection
