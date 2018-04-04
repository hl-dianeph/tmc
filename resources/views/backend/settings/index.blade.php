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
                            <form action="{{ route('backend.settings.seo') }}">
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
                            <div class="m-b-lg">
                                <small>
                                    Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding <code>.form-horizontal</code> to the form (which doesn't have to be a <code>&lt;form&gt;</code>). Doing so changes <code>.form-groups</code> to behave as grid rows, so no need for <code>.row</code>.
                                </small>
                            </div>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="exampleTextInput1" class="col-sm-3 control-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleTextInput1" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email2" class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email2" placeholder="Eamil address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textarea1" class="col-sm-3 control-label">Comment:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="textarea1" placeholder="Your comment..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" id="checkbox-demo-2">
                                            <label for="checkbox-demo-2">View my email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-success">Comment</button>
                                    </div>
                                </div>
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

