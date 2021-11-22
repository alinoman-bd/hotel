<section class="section-about">
    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
        {!! session('message.content') !!}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">


        <div class="home-about" style="margin-top: 10px">
            <div class="row">
                <div class="col-md-6">
                    <div class="text">
                        <h2 class="heading">@lang('backend.logo.no.available')</h2>
                        <button class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.logo.add')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    window.img_path = "<?= asset('')?>";
</script>