@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('flash::message')

        <section class="app-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Главная страница (SEO)</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <form action="#">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="keywords">Ключевые слова (keywords)</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords">
                                </div>
                                <div class="form-group">
                                    <label for="og_description">Описание (og:description)</label>
                                    <textarea class="form-control no-tinymce" id="og_description" name="og_description"></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile" class="form-control">
                                </div> -->
                                
                                <button type="submit" class="btn btn-primary btn-md">Окей</button>
                            </form>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->

                <div class="col-md-6">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Картинки</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <form class="form-horizontal">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputFile">Logo</label>
                                    <input type="file" id="exampleInputFile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Favicon</label>
                                    <input type="file" id="exampleInputFile" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary btn-md">Окей</button>
                            </form>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->

                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Администратор</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <form action="#" method="POST" class="form-horizontal">
                                @csrf

                                <div class="form-group">    
                                    <label for="email" class="col-sm-2 col-sm-offset-2 control-label">Почта</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="email" type="email" placeholder="Email" required="required">
                                    </div>
                                </div><!-- .form-group -->

                                <div class="form-group">    
                                    <label for="old_password" class="col-sm-2 col-sm-offset-2 control-label">Старый пароль</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="old_password" type="password" placeholder="Старый пароль" required="required">
                                    </div>
                                </div><!-- .form-group -->

                                <div class="form-group">    
                                    <label for="password" class="col-sm-2 col-sm-offset-2 control-label">Новый пароль</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="password" type="password" placeholder="Новый пароль" required="required">
                                    </div>
                                </div><!-- .form-group -->

                                <div class="form-group">    
                                    <label for="password_confirm" class="col-sm-2 col-sm-offset-2 control-label">Подтвердите пароль</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="password_confirm" type="password" placeholder="Подтвердите пароль" required="required">
                                    </div>
                                </div><!-- .form-group -->

                                <button type="submit" class="btn btn-primary btn-md">Окей</button>
                            </form>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div><!-- .row -->
        </section>
    </div><!-- END column -->
</div>
@endsection

