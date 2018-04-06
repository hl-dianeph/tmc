@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('adminlte-templates::common.errors')
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
                            <form action="{{ route('backend.settings.seo') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="keywords">Ключевые слова (keywords)</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $settings['keywords']->value }}">
                                </div>
                                <div class="form-group">
                                    <label for="og_description">Описание (og:description)</label>
                                    <textarea class="form-control no-tinymce" id="og_description" name="og_description">{{ $settings['og_description']->value }}</textarea>
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
                            <form action="{{ route('backend.settings.icons') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-3 col-sm-6" style="text-align: center;">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset($settings['logo']->value) }}" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-6">
                                        <div class="form-group">
                                            <label for="logo">Логотип сайта</label>
                                            <input type="file" id="logo" name="logo" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-6" style="text-align: center;">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset($settings['favicon']->value) }}" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-6">
                                        <div class="form-group">
                                            <label for="favicon">Favicon</label>
                                            <input type="file" id="favicon" name="favicon" class="form-control">
                                        </div>
                                    </div>
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
                            <form action="{{ route('backend.settings.account') }}" method="POST" class="form-horizontal">
                                @csrf

                                <div class="form-group">    
                                    <label for="email" class="col-sm-2 col-sm-offset-2 control-label">Почта</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="email" type="email" placeholder="Email" required="required" value="{{ $admin->email }}">
                                    </div>
                                </div><!-- .form-group -->

                                <div class="form-group">    
                                    <label for="old_password" class="col-sm-2 col-sm-offset-2 control-label">Старый пароль</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="old_password" type="password" placeholder="Старый пароль" required="required">
                                    </div>
                                </div><!-- .form-group -->

                                <div class="form-group">    
                                    <label for="new_password" class="col-sm-2 col-sm-offset-2 control-label">Новый пароль</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="new_password" type="password" placeholder="Новый пароль" required="required">
                                    </div>
                                </div><!-- .form-group -->

                                <div class="form-group">    
                                    <label for="new_password_confirmation" class="col-sm-2 col-sm-offset-2 control-label">Подтвердите пароль</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="new_password_confirmation" type="password" placeholder="Подтвердите пароль" required="required">
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

