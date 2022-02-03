<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Faça login para entrar</p>

            <form id="formLogin" method="post">
                <div class="input-group mb-3">
                    <select class="form-control" name="nivel">
                        <option value="0">Selecione o nivel de acesso</option>
                        <option value="1">Admin</option>
                        <option value="2">Membro</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Lembrar-me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button class="btn btn-primary btn-block login">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!--      <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                      <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                      <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                  </div>-->
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="<?= URL_BASE ?>login">Recuperar senha</a>
            </p>
            <p class="mb-0">
                <a href="<?= URL_BASE ?>register" class="text-center">Registrar um novo usuário</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

