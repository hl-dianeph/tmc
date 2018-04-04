@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Site Config
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($siteConfig, ['route' => ['backend.siteConfigs.update', $siteConfig->id], 'method' => 'patch']) !!}

                        @include('backend.site_configs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection