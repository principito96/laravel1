<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles asignaturas ({{$asignatura->id}})</x-slot>
    <div class="card m-auto" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title">{{$asignatura->nombre}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">{{$asignatura->descripcion}}</h6>
          <h6 class="card-subtitle mb-2 text-muted">Créditos({{$asignatura->creditos}})</h6>
          <h6 class="card-subtitle mb-2 text-muted">
                <b>PROFESORES</b>
                <ul>
                    @foreach($asignatura->profesores as $item)
                    <li><a href="{{route('profesores.show', $item)}}">#{{$item->apellidos.", ".$item->nombre}}</a></li>
                    @endforeach
                </ul>
        </h6>
          <div class="mt-2">
          <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>
          </div>
        </div>
      </div>

</x-plantilla>
