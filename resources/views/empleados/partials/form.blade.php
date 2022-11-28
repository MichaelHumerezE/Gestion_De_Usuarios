@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($empleado) ? $empleado->name : old('name') }}">
            <label>Nombre</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="apellidos" class="form-control" name="apellidos"
                value="{{ isset($empleado) ? $empleado->apellidos : old('apellidos') }}">
            <label>Apellidos</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="ci" class="form-control" name="ci"
                value="{{ isset($empleado) ? $empleado->ci : old('ci') }}">
            <label>CI</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Género</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M"
                @if ((isset($empleado->sexo) ? $empleado->sexo : old('sexo')) == 'M') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Masculine
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="F"
                @if ((isset($empleado->sexo) ? $empleado->sexo : old('sexo')) == 'F') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="phone" class="form-control" name="phone"
                value="{{ isset($empleado) ? $empleado->phone : old('phone') }}">
            <label>Teléfono</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="domicilio" class="form-control" name="domicilio"
                value="{{ isset($empleado) ? $empleado->domicilio : old('domicilio') }}">
            <label>Domicilio</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Estado</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="0"
                @if ((isset($empleado->estado) ? $empleado->estado : old('estado')) == '0') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Inactivo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="1"
                @if ((isset($empleado->estado) ? $empleado->estado : old('estado')) == '1') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Activo
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="email" placeholder="email" class="form-control" name="email"
                value="{{ isset($empleado) ? $empleado->email : old('email') }}">
            <label>E-Mail</label>
        </div>
    </div>
    @if ((isset($empleado->id) ? $empleado->id : '') == '')
        <div class="col-12">
            <div class="form-floating">
                <input type="password" placeholder="password" class="form-control" name="password"
                    value="{{ isset($empleado) ? $empleado->password : old('password') }}">
                <label>Contraseña</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="password" placeholder="password_confirmation" class="form-control"
                    name="password_confirmation" value="{{ isset($empleado) ? $empleado->password : old('password') }}">
                <label>Confirmar Contraseña</label>
            </div>
        </div>
    @endif
    <input type="hidden" name="tipoc" class="form-control" id="exampleInputPassword1" value="0">
    <input type="hidden" name="tipoe" class="form-control" id="exampleInputPassword1" value="1">
    @if ((isset($empleado->name) ? $empleado->name : '') != '')
        <div class="col-12">
            <div class="form-group">
                <h5>Roles</h5>
                {!! Form::select('roles[]', $roles, $empRole, ['class' => 'form-control']) !!}
            </div>
        </div>
    @endif
</div>
