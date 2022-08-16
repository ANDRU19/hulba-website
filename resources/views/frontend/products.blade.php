<x-site-layout>

    <div class="container-fluid con">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="box-shadow:none;">
                <div class="sidebar-sticky pt-45">
                    <ul class="nav flex-column">
                        <li class="nav-item mob-user-menu d-lg-none">
                            <div class="border-top pt-3">hello Cris</div>
                            <a href="#" class="btn btn-transperent f-s-8 mt-3">My products</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4 text-center">
                <div class="mt-80">
                    <!-----------------element 4 (form profile)---------------------------------------->
                    <div class="row justify-content-center mb-5">
                        <div class="col text-left">
                            <div class="row mb-4">
                                <div class="col-12 col-md-6 offset-md-3 text-left">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <div class="row">
                                                <div class="col-md-12 mb-4">
                                                    <h2 class="pb-2">profitable sport</h2>
                                                    <p class="pb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p>
                                                    <div class="pb-3">
                                                        <button type="button" class="btn btn-transperent mr-2"><i class="fa-regular fa-copy" style="padding-right:5px; font-size: 1rem;"></i>copy link</button>
                                                        <button type="button" class="btn btn-transperent"><i class="fas fa-share-square" style="padding-right:5px; font-size: 1rem;"></i>To share</button>
                                                        <button type="button" class="btn btn-transperent btn-insta mr-2"><i class="bi bi-instagram i" style="padding-right:5px; font-size: 1rem; color:violet;"></i>Instagram</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center mb-3">
                                            <img src="storage/img/football-ico.jpg" alt="" style="width:150px; height: auto;">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-md-8 offset-md-2 text-left">
                                    <div class="border-bottom">
                                        <div class="info-page-title">Product</div>
                                    </div>
                                    <div class="row pb-4 pt-4">
                                        @foreach ($products as $product)
                                            <div class="col-md-4 pb-4">
                                                <div class="item-wrapper">
                                                    <div class="item-img pb-4"><a href="{{route('products.show', $product->id)}}"><img src="{{$product->image->name}}" alt= ""></a></div>
                                                    <h5 class="pb-2">{{$product->title}}</h5>
                                                    <p class="pb-4">{{$product->description}}</p>
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Subscribe from BRL 20.00/month</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    <!-----------------end element 4 -------------------------------------------------->
                    <!----------------end main content-------------------------->
                </div>
            </main>
        </div>
    </div>

</x-site-layout>
