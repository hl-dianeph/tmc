@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($type, ['route' => ['backend.types.update', $type->id], 'method' => 'patch']) !!}

                        @include('backend.types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection