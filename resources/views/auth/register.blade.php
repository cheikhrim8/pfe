@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-7">
            <div class="card card-register card-white">
                <div class="card-header">
                    <img class="card-img" src="{{ asset('black') }}/img/card-primary.png" alt="">
                    <h4 class="card-title">{{ __('Register') }}</h4>
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ __('Confirm Password') }}">
                        </div>
                        <div class="form-check text-left">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" required>
                                <span class="form-check-sign"></span>
                                {{ __('I agree to the') }}
                                <a href="#termsAndCondition" data-toggle="modal">{{ __('terms and conditions') }}</a>.
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Get Started') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="termsAndCondition" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Terms And Conditions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aut, beatae commodi
                            consectetur consequuntur cum cumque cupiditate doloremque eligendi error est fugiat hic
                            illum ipsam iusto laboriosam magnam maxime nam natus necessitatibus nemo nihil numquam omnis
                            possimus quaerat quos recusandae rem repellendus suscipit temporibus totam vel vitae
                            voluptatum! Aperiam aspernatur culpa ea eveniet, facere, incidunt ipsum labore molestias
                            mollitia nihil provident quae quia reiciendis sed sint veritatis vitae. Commodi, debitis
                            earum explicabo facere harum ipsum pariatur placeat quae. Animi assumenda autem dolore
                            expedita fuga iure, repellendus repudiandae saepe sapiente similique, veniam vitae?
                            Asperiores dignissimos ipsam iure mollitia necessitatibus, nostrum sequi vitae. Aliquam
                            dolorum ea exercitationem ipsum mollitia, odio quod! Aliquam aliquid asperiores, dicta
                            dignissimos iste maxime minima, molestiae nam necessitatibus nesciunt, numquam optio quas
                            quis quisquam similique! Aliquid amet assumenda, consequatur cupiditate dignissimos dolores
                            eligendi eos fuga hic id illo itaque molestiae nam, officia quam saepe sit sunt suscipit
                            tempora tenetur unde ut veniam vero? Animi, at aut corporis cumque debitis dicta doloremque
                            dolores dolorum enim hic id in labore laudantium, magni nobis officiis placeat, porro
                            possimus provident quasi quia quibusdam quidem quis quo recusandae rem rerum sapiente sequi
                            sint sit tempore tenetur vero voluptatibus! Ab adipisci doloremque enim error est et
                            exercitationem laudantium libero magni maiores, officiis possimus qui, rem tempore, vel
                            veniam voluptates! Accusantium, ad assumenda consequatur cumque dignissimos eius est,
                            eveniet illo necessitatibus obcaecati odio porro similique vel! Amet eos harum laudantium?
                            Accusamus atque blanditiis cumque debitis, eum, minima, mollitia pariatur quaerat quam
                            repellendus reprehenderit repudiandae temporibus unde. Amet est illum maiores nobis saepe,
                            voluptatibus! A accusantium adipisci aliquam aperiam atque aut commodi deserunt enim eum
                            eveniet explicabo id modi molestias nihil, non nulla odio optio quaerat quam recusandae
                            similique vero voluptates voluptatibus. A aut ducimus et, facere illum ipsum magnam tempora.
                            Eum id neque sit vitae!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="ml-auto btn btn-secondary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
