@extends('layouts.app_duenos')

@section('title', 'Editar Fechas')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-info">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edicion de Disponibilidad</h3>
                        </div>
                        @if (empty($foto->id_multimedia))
                            <div class="panel-body">
                                <h1> No hay registro fotos !!</h1>
                            </div>
                        @else
                        <div class="panel-body">
                            <div class="table-container">
                                <form method="POST" action="{{action('PropiedadFotoController@update', $foto->id_multimedia)}}"  role="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                    <img width="500px" height="300px" src="{{ URL::to('/uploads/' . $foto->uri) }}"/>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="">Cambia la Imagen</label>
                                            <input accept="image/*" type="file" class="-file-photo-o" name="imagen" id="imagen">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <a href="{{ route('propiedad.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
