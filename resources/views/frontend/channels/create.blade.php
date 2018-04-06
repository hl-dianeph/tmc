@extends('frontend.layouts.static') 

@section('page_content')
<div class="dev_page_bread_crumbs"></div>
  <h1 id="dev_page_title" dir="auto">Добавить канал в каталог</h1>
  
  <div id="dev_page_content" dir="auto"><p>Каталог телеграм каналов - автонаполняем ха ха бла бла хаха бла бла</p>
<hr>
<h4><a class="anchor" name="bot-api" href="https://core.telegram.org/api#bot-api"><i class="anchor-icon"></i></a>Название телеграм канала</h4>
      <div class="form-group">
            <input type="tel" class="form-control tr-form-control input-lg" id="login-phone" placeholder="Вставьте сюда имя телеграм канала: @name" autocomplete="off">
          </div>

          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="" value="Продолжить">
        </div>

     <!-- <h4> Описание телеграм канала</h4>
          <div class="form-group">
            <textarea class="form-control tr-form-control input-lg" id="login-phone" maxlength="254" size="404"  placeholder="Подробное описание вашего телеграм канала" autocomplete="off" rows="6"></textarea>
          </div> -->

    <!-- <blockquote>
    <p><a href="https://core.telegram.org/bots"><strong>Читать подробнее</strong></a> / 100 подписчиков / 15 комментериев</p>
    </blockquote> -->
@endsection