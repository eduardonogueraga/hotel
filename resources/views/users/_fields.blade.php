{{ csrf_field() }}
<div class="form-group">
    <label for="first_name">Nombre:</label>
    <input type="text" name="name" placeholder="Nombre" value="{{ old('name', $user->name) }}" class="form-control">
</div>
<div class="form-group">
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email', $user->email) }}" class="form-control">
</div>
<div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" placeholder="Al menos 6 caracteres" class="form-control">
</div>

<div class="form-group">
    <label for="first_name">Telefono:</label>
    <input type="text" name="phone_number" placeholder="Nombre" value="{{ old('phone_number', $user->phone_number) }}" class="form-control">
</div>

<div class="form-group">
    <label for="bio">Biografía:</label>
    <textarea name="description" placeholder="Biografía" class="form-control">{{ old('description', $user->description) }}</textarea>
</div>
