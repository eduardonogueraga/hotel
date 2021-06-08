<form method="get" action="{{ route('rooms.index') }}">
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                           class="form-control form-control-sm" placeholder="Buscar...">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="country_id">Propietarios: </label>
            <select name="owner" id="owner" class="form-control">
                <option value="">Selecciona una opción</option>
                @foreach($owners as $owner)
                    <option value="{{$owner->id}}" {{ request('owner') ==  $owner->id ? 'selected' : '' }} >{{ $owner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 text-right">
            <div class="form-inline form-dates">
                <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</form>
