@extends('frontend.layouts.master') 

@section('content')
<div id="app">

    <div v-if="step === 1">
        <div id="dev_page_content_wrap" class=" ">
            <div class="dev_page_bread_crumbs"></div>
            <h1 id="dev_page_title" dir="auto">Шаг 1. Добавить канал в каталог</h1>
            <div id="dev_page_content" dir="auto">
                <p>Описание шага 1</p>
                <hr>

                <h4>
                    Название телеграм канала
                </h4>
                <div class="form-group">
                    <div v-if="errors.name !== ''" class="alert alert-danger alert-dismissible" role="alert">@{{errors.name}}</div>
                    <input type="text" v-model="channel_telegram.name" class="form-control tr-form-control input-lg" id="name" placeholder="Вставьте сюда имя телеграм канала: @name" autocomplete="off">
                </div>

                <p>Для добавления вашего канала нужно выполнить несколько шагов, для начала вставьте юзернейм (начинается на @) вашего канала и нажмите кнопку "Продолжить", чтобы идентифицировать ваш телеграм канал.</p>

                <button class="btn btn-primary" @click.prevent="next()">Продолжить</button>
                <img v-if="loader === true" src="{{ asset('images/loader.gif') }}" style="height: 48px;">
            </div>
        </div>
        
    </div>

    <div v-if="step === 2">
        <div id="dev_page_content_wrap" class=" ">
            <div class="dev_page_bread_crumbs"></div>
            <h1 id="dev_page_title" dir="auto">Шаг 2. Идентификация канала</h1>
            <div id="dev_page_content" dir="auto">
                <p>Описание шага 2</p>
                <hr>

                <div class="row tmc-channel">
                    <div class="col-md-6">
                        <img v-bind:src="channel_telegram.avatar" class="avatar img-circle img-responsive">
                    </div>
                    <div class="col-md-6">
                        <span class="tmc-info">Имя вашего канала: @{{channel_telegram.title}}</span>
                        <span class="tmc-info">Юзернейм вашего канала: @{{channel_telegram.name}}</span>
                        <span class="tmc-info">Количество подписчиков: @{{channel_telegram.members_count}}</span>
                        <span class="tmc-info">
                            Аватар: 
                            <span v-if="channel_telegram.avatar_exists === true">Да</span>
                            <span v-else>Нет</span>
                        </span>
                    </div>
                </div>

                <p>Нажмите кнопку "Продолжить" для перехода к следующему шагу</p>

                <button class="btn btn-default" @click.prevent="prev()">Назад</button>
                <button class="btn btn-primary" @click.prevent="next()">Продолжить</button>
                <img v-if="loader === true" src="{{ asset('images/loader.gif') }}" style="height: 48px;">
            </div>
        </div>
    </div>

    <div v-if="step === 3">
        <div id="dev_page_content_wrap" class=" ">
            <div class="dev_page_bread_crumbs"></div>
            <h1 id="dev_page_title" dir="auto">Шаг 3. Информация о канале</h1>
            <div id="dev_page_content" dir="auto">
                <p>Описание шага 3</p>
                <hr>

                <div class="row tmc-channel">
                    <div class="col-md-6">
                        <div id="fine-uploader-gallery">
                            <img v-bind:src="channel_tmc.avatar" class="avatar img-circle img-responsive tmc-editable">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div v-if="errors.avatar !== ''" class="alert alert-danger alert-dismissible" role="alert" v-html="errors.avatar"></div>

                        <p>
                            Загрузите аватар вашего канала в хорошем качестве.<br>
                            Он будет отображаться в каталоге нашего сайта
                            <br><br>
                            Правила:
                            <ul>
                                <li>тип изображения: png, jpg, jpeg</li>
                                <li>размер: не более 1024 Кб</li>
                                <li>ширина х высота: 640х640 (минимум)</li>
                            </ul>
                        </p>

                        <p>
                            <input type="file" id="avatar" name="avatar">
                            <button id="avatarUploadBtn" @click.prevent="uploadAvatar()" class="btn btn-primary">Загрузить</button>
                            <img v-if="loader_avatar === true" src="{{ asset('images/loader.gif') }}" style="height: 48px;">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Выберите категорию телеграм канала</label>
                    <div v-if="errors.category_id !== ''" class="alert alert-danger alert-dismissible" role="alert">@{{errors.category_id}}</div>
                    {!! Form::select('category_id', App\Models\Category::dropdown(), null, ['class' => 'form-control tr-form-control input-lg', 'v-model' => 'channel_tmc.category_id']) !!}
                </div>

                <div class="form-group">
                    <label for="email">Подробное описание телеграм канала</label>
                    <div v-if="errors.description !== ''" class="alert alert-danger alert-dismissible" role="alert">@{{errors.description}}</div>
                    <textarea v-model="channel_tmc.description" class="form-control tr-form-control input-lg" id="description" placeholder="Расскажите о чем ваш канал и почему на него нужно подписаться?" autocomplete="off" rows="10"></textarea>
                </div>

                {{--<div class="form-group">
                    <label for="email">Контактный email для связи с вами</label>
                    <div v-if="errors.email !== ''" class="alert alert-danger alert-dismissible" role="alert">@{{errors.email}}</div>
                    <input type="email" v-model="channel_tmc.email" class="form-control tr-form-control input-lg" id="email" placeholder="Введите email адрес вашей электронной почты" autocomplete="off">
                </div>--}}

                <p>При добавлении вашего канала вы соглашаетесь со всеми <a href="#">правилами</a> сайта</p>

                <button class="btn btn-default" @click.prevent="prev()">Назад</button>
                <button class="btn btn-primary" @click.prevent="next()">Продолжить</button>
                <img v-if="loader === true" src="{{ asset('images/loader.gif') }}" style="height: 48px;">

                <!-- <h4> Название телеграм канала</h4>
                <div class="form-group">
                    <input type="tel" class="form-control tr-form-control input-lg" id="login-phone" maxlength="254" size="404" placeholder="Подробное описание вашего телеграм канала" autocomplete="off">
                </div>
                <blockquote>
                    <p><a href="https://core.telegram.org/bots"><strong>Читать подробнее</strong></a> / 100 подписчиков / 15 комментериев</p>
                </blockquote> -->
            </div>
        </div>
    </div>

    <div v-if="step === 4">
        <div id="dev_page_content_wrap" class=" ">
            <div class="dev_page_bread_crumbs"></div>
            <h1 id="dev_page_title" dir="auto">Шаг 4. Подпишитесь на наш канал</h1>
            <div id="dev_page_content" dir="auto">
                <p>Описание шага 4</p>
                <hr>

                <div v-if="errors.not_member === true" class="alert alert-danger alert-dismissible" role="alert">Чтобы продолжить вам нужно подписаться на наш канал</div>
                <p>Подпишитесь <a class="btn btn-primary" href="https://t.me/dianeph" target="_blank">на наш канал</a> и нажмите "Продолжить"</p>

                <button class="btn btn-default" @click.prevent="prev()">Назад</button>
                <button class="btn btn-primary" @click.prevent="next()">Добавить канал</button>
                <img v-if="loader === true" src="{{ asset('images/loader.gif') }}" style="height: 48px;">
            </div>
        </div>
    </div>

    <div v-if="step === 5">
        <div id="dev_page_content_wrap" class=" ">
            <div class="dev_page_bread_crumbs"></div>
            <h1 id="dev_page_title" dir="auto">Шаг 5. Завершение</h1>
            <div id="dev_page_content" dir="auto">
                <p>Описание шага 5</p>
                <hr>

                <p>Ваш телеграм канал <strong>@{{channel_telegram.name}}</strong> был успешно отправлен на модерацию. После публикации или в случае отказа в размещении вы получите уведомление</p>

                <button class="btn btn-default" @click.prevent="prev()">Назад</button>
                <button class="btn btn-primary" @click.prevent="next()">Завершить</button>
                <img v-if="loader === true" src="{{ asset('images/loader.gif') }}" style="height: 48px;">
            </div>
        </div>
    </div>

<br/>
<br/>Debug: @{{step}}
<br/>Debug: @{{channel_telegram}}
<br/>Debug: @{{channel_tmc}}
</div>
@endsection



@section('scripts_import')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ secure_asset('js/multistepform.js') }}"></script>


@endsection


@section('scripts_body')
    
@endsection