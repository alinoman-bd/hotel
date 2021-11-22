<div class="modal fade show" id="logModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="title-default-bold mb-none">Login</div>
            </div>
            <div class="modal-body p-0">
                <div class="login-form">
                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <label class="">Username or email address <sup>*</sup></label>
                            <input type="text" class="form-control" placeholder="Name or E-mail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="">Password <sup>*</sup></label>
                            <input type="password" placeholder="Password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="ctm-container">Remember Me
                                <input type="checkbox" name="remember">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        <div class="form-group mt-4">
                            <button class="btn ctm-btn log-btn" type="submit" value="Login">Login</button>
                            <button class="btn ctm-btn log-btn form-cancel" type="button" class="close" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="form-group mt-4">
                            <label class="lost-password"><a href="{{route('register')}}">Register</a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>