@extends('frontend.layouts.master') 

@section('content')
<div id="app">
<form>
    <div v-if="step === 1">
        <h1>Шаг 1.</h1>
        <p>
            <legend for="name">Название телеграм канала</legend>
            <input id="name" name="name" v-model="registration.name">
        </p>
        <button @click.prevent="next()">Next</button>
    </div>

    <div v-if="step === 2">
        <h1>Шаг 2. </h1>
        
        <button @click.prevent="prev()">Previous</button>
        <button @click.prevent="next()">Next</button>
    </div>

    <div v-if="step === 3">
        <h1>Шаг 3</h1>
        
        <button @click.prevent="prev()">Previous</button>
        <button @click.prevent="submit()">Save</button>
    </div>

    <div v-if="step === 4">
        <h1>Шаг 4</h1>
        
        <button @click.prevent="prev()">Previous</button>
        <button @click.prevent="submit()">Save</button>
    </div>
</form>
<br/>
<br/>Debug: @{{registration}}
</div>
@endsection



@section('scripts_import')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ secure_asset('js/multistepform.js') }}"></script>


@endsection


@section('scripts_body')

@endsection