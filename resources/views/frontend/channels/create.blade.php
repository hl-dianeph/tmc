@extends('frontend.layouts.master') 

@section('content')
<div id="app">
<form>
    <div v-if="step === 1">
        <h1>Шаг 1. Авторизация</h1>
        <a href="{{ route('auth.telegram') }}">Войти через Телеграм</a>
        <button class="hidden" @click.prevent="next()">Next</button>
    </div>
    
    <div v-if="step === 2">
        <h1>Шаг 2</h1>
        <p>
            <legend for="name">Название телеграм канала</legend>
            <input id="name" name="name" v-model="registration.name">
        </p>
        <button @click.prevent="next()">Next</button>
    </div>

    <div v-if="step === 3">
        <h1>Шаг 3. </h1>
        <p>
            <legend for="street">Your Street:</legend>
            <input id="street" name="street" v-model="registration.street">
        </p>
        <p>
            <legend for="city">Your City:</legend>
            <input id="city" name="city" v-model="registration.city">
        </p>
        <p>
            <legend for="state">Your State:</legend>
            <input id="state" name="state" v-model="registration.state">
        </p>
        <button @click.prevent="prev()">Previous</button>
        <button @click.prevent="next()">Next</button>
    </div>

    <div v-if="step === 4">
        <h1>Step Three</h1>
        <p>
            <legend for="numtickets">Number of Tickets:</legend>
            <input id="numtickets" name="numtickets" type="number" v-model="registration.numtickets">
        </p>
        <p>
            <legend for="shirtsize">Shirt Size:</legend>
            <select id="shirtsize" name="shirtsize" v-model="registration.shirtsize">
                <option value="S">Small</option>
                <option value="M">Medium</option>
                <option value="L">Large</option>
                <option value="XL">X-Large</option>
            </select>
        </p>
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
<script src="{{ asset('js/multistepform.js') }}"></script>
@endsection