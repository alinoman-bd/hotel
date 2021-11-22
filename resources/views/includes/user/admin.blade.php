<section class="section-restaurant-2 bg-white">
    <div class="container">
        <div class="restaurant-small">
            <div class="row">
                @foreach($users as $user)
                <div class="col-md-6 col-xs-12">
                    <div class="restaurant_content">                        
                        <!-- ITEM -->
                        <div class="restaurant_item small-thumbs">
                        
                            <div class="img">
                                <a href="#"><img src="{{asset($user->profile_picture)}}" alt=""></a>
                            </div>
                        
                            <div class="text">
                                <h2><a href="#">{{$user->name}} {{$user->surname}}</a></h2>
                                <p class="desc">{{$user->email}}</p>
                                <p class="desc">{{$user->phone}}</p>
                                <address style="font-style: italic">
                                    {!! $user->address !!}
                                </address>
                                <p class="price">
                                    <span class="amout">$80</span>
                                </p>
                            </div>
                        
                        </div>
                        <!-- END / ITEM -->
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>