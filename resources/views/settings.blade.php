@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Настройки личного кабинета</h3>
                    </div>
                    <div class="panel-body">
                        <section class="content">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="box box-primary">
                                        <div class="box-body box-profile">
                                            <img class="profile-user-img img-responsive center-block img-circle"
                                                 src="/img/avatar/{{ Auth::user()->avatar }}"
                                                 alt="Small user profile picture">
                                            <h3 class="profile-username text-center">
                                                {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                            </h3>
                                            <form class="form-horizontal" role="form" method="POST"
                                                  {{--                                                  action="{{ route('users.update', Auth::user()->id), true }}"--}}
                                                  action="{{ route('users.image.update')}}"
                                                  enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <div class="col-md-9">
                                                        <input id="avatar" type="file" class="" name="avatar" required>
                                                        <input type="hidden" name="img" value="false">
                                                        <br>

                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <button type="submit" class="btn btn-primary">Загрузить
                                                                фото
                                                            </button>
                                                            <a href="{{ route('users.image.delete')}}"
                                                               class="btn btn-danger" title="Удалить фото">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="box box-primary">
                                        <div class="box-body">
                                            <form class="form-horizontal" role="form" method="POST"
                                                  action="{{ route('users.update', Auth::user()->id), true }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                    <label for="last_name"
                                                           class="col-md-4 control-label">Фамилия</label>

                                                    <div class="col-md-6">
                                                        <input id="last_name" type="text" class="form-control"
                                                               name="last_name"
                                                               {{--value="{{ old('last_name', 'Default') }}" required>--}}
                                                               value="{{ old('last_name', Auth::user()->last_name) }}"
                                                               required>
                                                        @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                    <label for="first_name" class="col-md-4 control-label">Имя</label>

                                                    <div class="col-md-6">
                                                        <input id="first_name" type="text" class="form-control"
                                                               name="first_name"
                                                               value="{{ old('first_name', Auth::user()->first_name) }}"
                                                               required>

                                                        @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                                    <label for="date_of_birth" class="col-md-4 control-label">Дата
                                                        рождения</label>

                                                    <div class="col-md-6">
                                                        <input id="date_of_birth" type="date" class="form-control"
                                                               name="date_of_birth"
                                                               value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}"
                                                               required>

                                                        @if ($errors->has('date_of_birth'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                    <label for="phone" class="col-md-4 control-label">Телефон</label>

                                                    <div class="col-md-6">
                                                        <input id="phone" type="tel" class="form-control" name="phone"
                                                               pattern="[0-9]{3}-[0-9]{7}" placeholder="***-*******"
                                                               value="{{ old('phone', Auth::user()->phone) }}"
                                                               required>

                                                        @if ($errors->has('phone'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email"
                                                               value="{{ old('email', Auth::user()->email) }}" disabled>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" name="img" value="true">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Сохранить
                                                        </button>
                                                        <button type="reset" class="btn btn-default">
                                                            Отмена
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <p class="text-muted">
                                                <strong>Внимание!!! Как только вы удалите свою учетную запись,
                                                    возврат будет невозможен. Пожалуйста, будьте внимательны.
                                                </strong>
                                            </p>
                                            {{--<a href="#" class="btn btn-danger" disabled>Удалить аккаунт</a>--}}

                                            {{-- Modal dialog for account delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    {{--data-target=".bs-example-modal-sm">Small modal--}}
                                                    data-target="#data-delete">Удалить аккаунт
                                            </button>

                                            <div id="data-delete" class="modal fade" tabindex="-1" role="dialog"
                                                 aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Удаление аккаунта</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="delete-form" class="form-horizontal" role="form"
                                                                  method="POST"
                                                                  action="{{ route('delete') }}">
                                                                {{ csrf_field() }}
                                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                    <label for="password"
                                                                           class="col-md-4 control-label">Пароль</label>

                                                                    <div class="col-md-6">
                                                                        <input id="password" type="password"
                                                                               class="form-control" min="6" max="16"
                                                                               name="password"
                                                                               required
                                                                        >

                                                                        @if ($errors->has('password'))
                                                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-group">
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                    <button type="submit" form="delete-form"
                                                                            class="btn btn-danger">Подтвердить
                                                                    </button>
                                                                    <button type="button" data-dismiss="modal"
                                                                            class="btn btn-default">Отмена
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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