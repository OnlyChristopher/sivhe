@extends('layouts.app')
@section('title', 'Obras por Antamina |')
@section('clase-active-antamina','active')
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active">Listado de Obras por Antamina</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Listado de Obras por Antamina</h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                    <a class="btn btn-green btn-xs" href="{{action('AntaminaController@create')}}">Crear nuevo
                        Obra</a>
                @endif
            </div>
            <h4 class="panel-title">Obras por Antamina</h4>
        
        </div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <div class="table-responsive">
                @if(count($datos))
                    <table class="table table-hover m-b-10">
                        <thead>
                        <tr>
                            <th><b>No.</b></th>
                            <th>Cod. Obra</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Archivo</th>
                            <th width="140x">Acciones</th>
                        </tr>
                        </thead>
                        
                        
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{$dato->idantamina}}</td>
                                <td>{{$dato->codobra}}</td>
                                <td>{{$dato->nombreobra}}</td>
                                <td>{{$dato->nombre_documento}}</td>
                                <td>{{$dato->descripcion}}</td>
                                <td>{{$dato->fecha_documento}}</td>
                                <td nowrap>
                                    @if($dato->archivo_documento)
                                        <a href="{{ route('downloadCv', $dato->idantamina)}}"
                                           title=""
                                           class="btn btn-warning btn-icon btn-sm" data-toggle="tooltip" data-container="body" data-title="Descargas">
                                            <i class="fa fa-file-pdf"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('antamina.destroy', $dato->idantamina) }}"
                                          method="post">
                                        <a class="btn btn-icon btn-circle btn-info" href="{{route('antamina.show',$dato->idantamina)}}" data-toggle="tooltip" data-container="body" data-title="Detalle" data-original-title="" title=""><i class="fab fa-envira"></i></a>
                                        @if( Auth::user()->profile == 1|| Auth::user()->profile == 2)
                                            <a class="btn btn-icon btn-circle btn-warning"
                                               href="{{route('antamina.edit',$dato->idantamina)}}"
                                               data-toggle="tooltip" data-container="body" data-id-="{{$dato->idantamina}}" data-title="Editar"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"  data-click="swal-danger" data-backdrop="btn-antamina-delete-{{$dato->idantamina}}"
                                                    class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                    data-container="body" data-title="Eliminar"><i
                                                    class="fa fa-trash-alt"></i></button>
        
                                            <button id="btn-antamina-delete-{{$dato->idantamina}}" type="submit" style="display: none;"
                                                    class="btn btn-sm btn-icon btn-danger"><i
                                                    class="fa fa-trash-alt"></i>
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="alert alert-info fade show" data-auto-dismiss="2000">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>No hay registros</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end panel -->

@endsection
