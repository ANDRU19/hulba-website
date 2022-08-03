<x-layout>

  <section id="intro" class="mt-16">
    <div class="container-h">
      <div class="gap-24"></div>
      <div class="row align-items-center intro-body">
        <div class="col-12 col-md-6 desc-mt-55">
          <div style="max-width:610px;margin-left: -15px;">
            <div class="gap-16"></div>
            <h1 class="IntroSection main-intro"><strong>Transforme sua audiência em um negócio lucrativo</strong></h1>
            <div class="gap-16"></div>
            <p class="Intro-Text"><span>Venda um acesso exclusivo ao seu curso, comunidade ou sala de sinais dentro do</span><span id="typing"></span></p>
            <div class="gap-24"></div>
            <Link :href="route('dashboard')" class="Button-hl-1">Quero começar</Link>
            <!-- <button class="Button-hl-1">Quero começar</button> -->
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="intro-img">
            <div class="bg-img1 d-none d-lg-block"><img alt="" src="img/bg1.png"></div>
            <div class="img1"><img src="img/image_1.webp" alt=""></div>
          </div>
        </div>
      </div>
      <div class="gap-45"></div>
    </div>
  </section>

  <section id="marquee-line">
    <div class="marquee marquee-text"><i class="circle"></i>Crie experiências inesquecíveis e lucrativas<i class="circle"></i>Crie experiências inesquecíveis e lucrativas</div>
  </section>

  <section id="HowItWorks">
    <div class="container-h">
      <div class="row gap-128">
        <div class="col-12 col-md-6">
          <div class="block-column" style="max-width:565px; margin-left: -15px;">
            <div class="HIW-block p-fix1" id="im1">
              <div class="HIW-icon">
                <img style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0" alt="" src="img/ico1.png">         
                <p class="HIW-icon-text">COMUNIDADE</p>
              </div>
              <div class="gap-16"></div>
              <p class="HIW-title"><b>Leve seus inscritos, seguidores ou leads para uma experiência exclusiva</b></p>
              <div class="gap-16"></div>
              <p class="HIW-text">Reuna sua audiência para vivenciar, junto com você, interações dentro de comunidades ou grupos no Whatsapp e Telegram.</p>
              <div class="gap-24"></div>
              <div class="gap-16"></div>
              <div class="mob-img-pic d-lg-none"><img alt="" src="img/image_2.webp"></div>
            </div>
            <div class="HIW-block" id="im2">
              <div class="HIW-icon">
                <img style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0" alt="" src="img/ico2.png">
                <p class="HIW-icon-text">INTERAÇÃO</p>
              </div>
              <div class="gap-16"></div>
              <p class="HIW-title"><b>Crie uma comunidade engajada</b></p>
              <div class="gap-16"></div>
              <p class="HIW-text">Utilize os aplicativos mais usados do mundo para gerar conexões e tenha um contato próximo com seus seguidores mais fiéis.</p>
              <div class="gap-24"></div>
              <div class="gap-16"></div>
              <div class="mob-img-pic d-lg-none"><img alt="" src="img/image_3.webp"></div>
            </div>
            <div class="HIW-block" id="im3">
              <div class="HIW-icon">
                <img style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0" alt="" src="img/ico3.png">
                <p class="HIW-icon-text">VENDAS</p>
              </div>
              <div class="gap-16"></div>
              <p class="HIW-title"><b>Escolha quanto quer ganhar</b></p>
              <div class="gap-16"></div>
              <p class="HIW-text">Crie um negócio sólido e conquiste uma receita previsível com pagamentos mensais
                recorrentes.</p>
              <div class="gap-24"></div>
              <div class="gap-16"></div>
              <div class="mob-img-pic d-lg-none"><img alt="" src="img/image_4.webp"></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 d-none d-lg-block">
          <div id="bl1" class="HIW-image-block">
            <img alt="" src="img/image_2.webp" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%">
          </div>
          <div id="bl2" class="HIW-image-block">
            <img alt="" src="img/image_3.webp" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%">
          </div>
          <div id="bl3" class="HIW-image-block">
            <img alt="" src="img/image_4.webp" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%">
          </div>
        </div>
      </div>
    </div>
  </section>
    <section id="slider" class="bg_black">
        <div class="gap-64 mob-gap-8"></div>
        <p class="slider-title">Users</p>

        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <div class="carousel-item-wrap">
                <img src="img/photo1.png" class="d-block" alt="" />
                <div class="gap-8"></div>
                <p class="carousel-item-name">Arjun</p>
                <p class="carousel-item-name-text">Youtuber, SEBI Regd Investment Advisor</p>
                <div class="gap-16"></div>
                <p class="carousel-item-text">"After joining Rigi, I am able to work with peace of mind now. I have saved money and time with Rigi  and now my customer base has increased significantly. Thanks a lot Rigi, your service amazes me"</p>
                <div class="gap-8"></div>
            </div>
            </div>
            <div class="carousel-item">
            <div class="carousel-item-wrap">
                <img src="img/photo2.png" class="d-block" alt="" />
                <div class="gap-8"></div>
                <p class="carousel-item-name">Gudjral</p>
                <p class="carousel-item-name-text">Founder</p>
                <div class="gap-16"></div>
                <p class="carousel-item-text">"I have saved money and time with Rigi  and now my customer base has increased significantly."</p>
                <div class="gap-8"></div>
            </div>
            </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-my-control"><i class="bi bi-arrow-left-circle"></i></span>
                <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-my-control"><i class="bi bi-arrow-right-circle"></i></span>
                <span class="sr-only">Next</span>
        </a>

        </div>
        </div>

        <div class="gap-64 mob-gap-8"></div>  
    </section>



  <section id="big-text-block">
      <div class="container-h">
        <div class="gap-64"></div>
        <div class="row">
          <div class="col">
            <div style="max-width:844px;margin:auto">
              <p class="big-text"><b><span>Gerenciar o seu produto, e os grupos no WhatsApp ou Telegram não é seu trabalho.</span>
                <span style="background-color:#d8ff5f;border-radius:8px;padding:0 4px;white-space:nowrap">É o nosso.</span></b></p>
            </div>
          </div>          
        </div>  
        <div class="gap-64"></div>  
      </div>  
  </section>

  <section id="promo-block" class="bg_white">
    <div class="container-h">
      <div class="gap-64"></div> 
        <div class="row bg_white">
          <div class="col-12 col-md-6 d-flex align-items-top justify-content-center p-left-fix">
            <div class="col-md-12 p-left-fix">
              <div class="promo-img promo-col"><img src="img/big_pic1.jpg" alt=""></div>
              <div class="gap-16"></div>
              <p class="promo-text-title"><b>Tenha sua gestão de membros automatizada</b></p>
              <div class="gap-8"></div>
              <p class="promo-text">Nós automatizamos todo o processo de adição e remoção de membros no seu grupo de acordo com o status de pagamento.</p>
              <div class="gap-38"></div>
            </div>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-top justify-content-center p-right-fix">
            <div class="col-md-12 p-right-fix">
              <div class="promo-img promo-col"><img src="img/big_pic2.jpg" alt=""></div>
              <div class="gap-16"></div>
              <p class="promo-text-title"><b>Aceite várias formas de pagamento</b></p>
              <div class="gap-8"></div>
              <p class="promo-text">Dê mais flexibilidade ao seu produto, com pagamentos por pix, cartão de crédito ou boleto bancário.</p>
              <div class="gap-38"></div>
            </div>  
          </div>       
        </div> 
        <div class="row bg_white">
          <div class="col-12 col-md-6 d-flex align-items-top justify-content-center p-left-fix">
            <div class="col-md-12 p-left-fix">
              <div class="promo-img promo-col"><img src="img/big_pic3.jpg" alt=""></div>
              <div class="gap-16"></div>
              <p class="promo-text-title"><b>Acompanhe suas vendas em tempo real</b></p>
              <div class="gap-8"></div>
              <p class="promo-text">Consulte suas vendas, assinaturas e afiliados a qualquer momento pelo desktop ou no app Hubla.</p>
              <div class="gap-38"></div>              
            </div>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-top justify-content-center p-right-fix">
            <div class="col-md-12 p-right-fix">
              <div class="promo-img promo-col"><img src="img/big_pic4.jpg" alt=""></div>
              <div class="gap-16"></div>
              <p class="promo-text-title"><b>Venda mais com nossas ferramentas de marketing</b></p>
              <div class="gap-8"></div>
              <p class="promo-text">Use nossos construtores de páginas, sistema de afiliados e integrações com Facebook, Zapier, E-notas e muito mais.</p>
              <div class="gap-38"></div>                
            </div>  
          </div>
        </div> 
        <div class="row bg_white">
          <div class="col d-flex align-items-top justify-content-center" style="max-width:1150px;margin:auto">
            <div class="col-md-12">
              <div class="promo-img2 promo-col"><img src="img/big_pic5.jpg" alt=""></div>
              <div class="gap-16"></div>
              <p class="promo-text-title"><b>Faça sua captação de leads direto na Hubla</b><span class="new">NOVO</span></p>
              <div class="gap-8"></div>
              <p class="promo-text">Use nossa ferramenta de lista de espera e tenha acesso ao nome, telefone e e-mail do seus leads, diretamente na Hubla.</p>
              <div class="gap-38 d-none d-lg-block"></div> 
              </div>
          </div>
        </div>
        <div class="gap-64"></div>
    </div>    
  </section>
  <section id="card" class="bg_green">
    <div class="container-h">
        <div class="gap-64 mob-gap-30"></div> 
        <div class="row">
          <div class="col-12 col-md-6 d-flex align-items-center justify-content-left p-left-fix">
            <div>
              <p class="IntroSection" style="line-height: 100%;"><b>Receba todas as funcionalidades. Você só paga se vender.</b></p>
            </div>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-center justify-content-end p-right-fix">
            <div class="card-box">
              <svg width="25" height="34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.201 16.365c2.3-1.7 3.476-3.981 3.476-6.943 0-2.671-.98-4.906-2.941-6.703C18.824.923 16.422 0 13.627 0H0v34h25V16.365h-4.799Zm-.838 12.39H5.638V5.244h7.99c2.5 0 4.411 1.944 4.411 4.469 0 2.524-1.912 4.468-4.412 4.468h-2.353v5.051h8.088l.002 9.521Z" fill="#fff"></path></svg>
              <div class="gap-16"></div>
              <p class="card-text1">Taxa por transação</p>
              <p class="card-text2"><b>10.9%</b></p>
            </div>
          </div>
        </div>
        <div class="gap-128"></div>
    </div>
  </section>

  <section id="big-card" class="bg_green">
      <div class="container-h"> 
        <div class="row">
          <div class="col d-flex align-items-center justify-content-center p-leftright-fix">
            <div class="big-card">
              <div class="row">
                <div class="col-12 col-md-6 align-items-center">
                  <p class="big-card-text1"><b>Você vende acima de 50mil reais?</b></p>
                  <div class="gap-8"></div>
                  <p class="big-card-text2">Converse conosco, temos condições exclusivas para você.</p>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-end justify-content-center-mob p-right-fix">
                   <button class="card-btn">Falar com especialista</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="gap-64 mob-gap-30"></div> 
      </div>
  </section>


</x-layout>
