<form method="get" action="{{ route('users.index') }}">
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                           class="form-control form-control-sm" placeholder="Buscar...">
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <div class="form-inline form-dates">
                <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</form>
