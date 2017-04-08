@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <section class="content">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="box box-primary">
                                        <div class="box-body box-profile">
                                            <img class="profile-user-img img-responsive center-block img-circle"
                                                 src="/img/resume-photo.jpg" alt="User profile picture">
                                            <h3 class="profile-username text-center">John Smith</h3>
                                            <p class="text-muted text-center">Web Software Developer</p>
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-envelope"></i>&nbsp;
                                                    <a href="mailto: john.smith@website.com">john.smith@website.com</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>&nbsp;
                                                    <a href="tel:+38(066) 123 4567">+38(066) 123 4567</a>
                                                </li>
                                            </ul>
                                            <a href="/contacts" class="btn btn-primary btn-block"><b>See all
                                                    contacts</b></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">О себе</h3>
                                        </div>
                                        <div class="box-body">
                                            <strong><i class="fa fa-pencil margin-r-5"></i>&nbsp;Навыки</strong>
                                            <p>
                                                <span class="label label-success">Coding</span>
                                                <span class="label label-primary">PHP</span>
                                                <span class="label label-warning">MySQL</span>
                                                <span class="label label-danger">Laravel</span>
                                                <span class="label label-default">Git</span>
                                                <span class="label label-default">Composer</span>
                                                <span class="label label-danger">HTML/CSS</span>
                                                <span class="label label-danger">Javascript</span>
                                                <span class="label label-info">JQuery</span>
                                                <span class="label label-success">Backbone/Marionette</span>
                                                <span class="label label-info">Pre-Intermediate English</span>
                                            </p>
                                            <hr>

                                            <strong><i class="fa fa-history margin-r-5"></i>&nbsp;Опыт
                                                работы</strong>
                                            <p class="text-muted">
                                                <strong><q>Some random company</q></strong> <br>
                                                <strong>Some random position</strong> <br>
                                                <small>work period</small>

                                                <br><br>

                                                <strong><q>Some random company</q></strong> <br>
                                                <strong>Some random position</strong> <br>
                                                <small>work period</small>
                                            </p>
                                            <hr>

                                            <strong><i class="fa fa-book margin-r-5"></i>&nbsp;Образование</strong>
                                            <p class="text-muted">
                                                Университет <br>
                                                Факультет - специальность
                                                <br>
                                                Год окончания - **** <br>
                                            </p>
                                            <hr>

                                            <strong><i class="fa fa-map-marker margin-r-5"></i>&nbsp;Местоположение</strong>
                                            <p class="text-muted">Страна, Город</p>
                                            <hr>

                                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                                                enim neque.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection