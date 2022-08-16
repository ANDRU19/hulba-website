<x-site-layout>
<div class="container page-product-container"><div class="row">
  <div class="container-fluid con">
    <div class="row">

      <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4 text-center">
      <div class="mt-80">
      <!-----------------element 4 (form profile)---------------------------------------->
      <div class="row justify-content-center mb-5">
        <div class="col text-left">
            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <img src="{{$product->image->name}}" alt="" style="width: 100%; height: auto;">
              </div>
              <div class="col-md-6 mb-3">
                <div class="row">
                  <div class="col-md-12 mb-4">
                    <h2 class="pb-2">{{$product->title}}</h2>
                    <h6 class="pb-2">PerChris Lee</h6>
                    <p class="pb-4">Pafume paper selling</p>
                    <p class="pb-4"><i class="fa-brands fa-whatsapp pr-2"></i> whatsapp group</p>
                    <div>
                      <button type="button" class="btn btn-sm btn-transperent mr-2"><i class="fa-regular fa-copy" style="padding-right:5px; font-size: 1rem;"></i>copy link</button><button type="button" class="btn btn-sm btn-transperent"><i class="fas fa-share-square" style="padding-right:5px; font-size: 1rem;"></i>To share</button>     
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Subcribe from BRL 12.99/month</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-12 col-md-8 offset-md-2 text-left">
                <div class="border-bottom">
                  <div class="info-page-title">About</div>
                </div>
                <div class="row pb-4">

                  <div class="col-md-12 border-bottom pt-4 pb-3">
                    <img src="../img/photo2.png" alt="" class="profile-main-photo pb-2">
                    <h4 class="pb-2">Points to fly</h4>
                    <p class="pb-2">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    </p>
                  </div>

                  <div class="col-md-12 border-bottom pt-3 pb-3">
                    <h4 class="pb-2">About the group</h4>
                    <p class="pb-2">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    </p>
                  </div>

                  <div class="col-md-12 pt-3 pb-3">
<!--Accordion wrapper-->
<h4 class="pb-2">Common questions</h4>
<div class="accordion" id="faq">
  <div class="card">
      <div class="card-header" id="faqhead1">
          <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">Can i put external links?</a>
      </div>

      <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
          <div class="card-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
          </div>
      </div>
  </div>
  <div class="card">
      <div class="card-header" id="faqhead2">
          <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2">I changed my mobile</a>
      </div>

      <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
          <div class="card-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
          </div>
      </div>
  </div>
</div>
<!-- Accordion wrapper -->


                  </div>
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

      </div>
  </div>

</x-site-layout>
