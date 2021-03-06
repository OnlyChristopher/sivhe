@extends('layouts.app')
@section('title', 'Editar Operador | Administración | SIVHE')
@section('style', 'fix-header fix-sidebar card-no-border')

@section('content')
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-7 col-8 align-self-center">
                    <h3 class="text-themecolor">Editar Operador</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Administración</a></li>
                        <li class="breadcrumb-item active">Editar Operador</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Editar Operador</h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success fade show" data-auto-dismiss="2000">
                                    <span class="close" data-dismiss="alert">×</span>
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('operadores.update',$operadores->idoperador)}}" method="post" enctype="multipart/form-data"
                                      class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="cod_proyecto">Nombres</label>
                                        <div class="col-md-6">
                                            <input type="text" name="nombres" id="nombres"
                                                   placeholder="Ingresa Nombre" class="form-control" value="{{$operadores->nombres}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">Apellidos</label>
                                        <div class="col-md-6">
                                            <input type="text" name="apellidos" id="apellidos"
                                                   placeholder="Ingresa Apellidos" class="form-control" value="{{$operadores->apellidos}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label" for="nombre_proyecto">Work Order</label>
                                        <div class="col-md-6">
                                            <input type="text" name="codwo" id="codwo"
                                                   placeholder="Work Order" class="form-control" value="{{$operadores->codwo}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"
                                               for="id_areas">Cliente</label>
                                        <div class="col-md-6">
                                            <select  name="id_cliente" id="id_cliente" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                @foreach ($clientes as $cliente)
                                                    <option value="{{$cliente->id_cliente}}" {{$cliente->id_cliente == $operadores->id_cliente ? 'selected' : '' }}>{{$cliente->nombre_cliente}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">


                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label"></label>

                                        <div class="col-md-6">
                                            <a href="javascript:window.history.back()" class="btn btn-sm btn-success">Regresar</a>
                                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 SIVHE
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection