<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
})
</script>

<template>
    <Head title="Welcome" />


        <!-- <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div> -->


<section id="header">
    <div class="container-h">
      <div class="gap-8"></div>
      <div class="row align-items-center header-body">
        <div class="mob-menu-btn">
          <div class="top"></div>
          <div class="bottom"></div>
        </div>
        <div class="logo"><a href="/">
            <svg width="88" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M49.42 9.45c1.348-.98 2.037-2.298 2.037-4.009 0-1.542-.574-2.833-1.723-3.87C48.614.532 47.205 0 45.568 0H37.58v19.635h14.652V9.45H49.42Zm-.49 7.155h-8.045V3.03h4.683c1.465 0 2.585 1.123 2.585 2.58 0 1.459-1.12 2.581-2.585 2.581h-1.38v2.917h4.74v5.498h.001ZM11.923 0h3.304v19.635h-3.304v-8.499H3.304v8.5H0V0h3.304v8.05h8.619V0ZM18.835 0h3.304v12.931c0 2.384 1.436 3.927 4.31 3.927 2.872 0 4.308-1.543 4.308-3.927V0h3.305v13.128c0 2.103-.719 3.759-2.126 5.02C30.528 19.384 28.689 20 26.448 20c-2.24 0-4.08-.617-5.487-1.851-1.408-1.262-2.126-2.918-2.126-5.021V0ZM59.057 16.55h8.188v3.085H55.753V0h3.304v16.55ZM84.437 19.635 83.03 15.68h-8.561l-1.408 3.955h-3.59L76.766 0h3.965L88 19.635h-3.563ZM75.56 12.65h6.378L78.75 3.787l-3.19 8.863Z"
                fill="#161F00"></path>
            </svg></a>
        </div>

        <div class="left-menu">
          <ul class="nav mob-menu-wrapper">
            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            <li class="nav-item mob-pb-50"><a class="nav-link" href="#">Ajuda</a></li>
            <li class="nav-item pl-18 pr-18 pb-18 d-lg-none"><button class="btn-menu btn-menu-mob btn-bg-none mr-24">Já sou membro</button></li>
            <li class="nav-item pl-18 pr-18 pb-18 d-lg-none"><button class="btn-menu btn-menu-mob btn-bg-green">Comece agora</button></li>
          </ul>
        </div>
        <div class="right-btn-block">
          <Link :href="route('dashboard')" class="btn-menu btn-bg-none mr-24 d-none d-lg-block" >Já sou membro</Link>
          <Link :href="route('dashboard')" class="btn-menu btn-bg-black" >Comece agora</Link>
        </div>
      </div>
      <div class="gap-8"></div>
    </div>
  </section>

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
  <!-- ======================================== footer   html start======================================= -->
  <section id="footer">
    <div class="container-h">
      <div class="gap-24"></div> 
      <div class="row align-items-top pb-50">
        <div class="col-12 col-md-3 p-left-fix">
          <p class="footer-title"><b>Empresa</b></p>
          <div class="gap-16 mob-gap-8"></div>
          <p class="footer-menu-link"><a href="/about_us">Quem somos</a></p>
          <div class="gap-8"></div>
          <p class="footer-menu-link"><a href="https://app.hub.la/terms_of_use">Termos de uso</a></p>
          <div class="gap-8"></div>
          <p class="footer-menu-link"><a href="https://app.hub.la/privacy_policy">Política de privacidade</a></p>
          <div class="gap-8"></div>
          <p class="footer-menu-link"><a href="http://jobs.lever.co/Hubla">Carreiras</a></p>
        </div>

        <div class="col-12 col-md-3 p-left-fix pt-m-30">
          <p class="footer-title"><b>Utilidades</b></p>
          <div class="gap-16 mob-gap-8"></div>
          <p class="footer-menu-link"><a href="https://help.hub.la/hc/pt-br">Ajuda</a></p>
          <div class="gap-8"></div>
          <p class="footer-menu-link"><a href="https://app.hub.la/refund">Reembolso</a></p>
          <div class="gap-8"></div>
          <p class="footer-menu-link"><a href="https://app.safe.space/company/hubla">Canal de denúncia</a></p>
        </div>
        <div class="col-12 col-md-3 offset-md-3 justify-content-end p-right-fix pt-m-30">
          <p class="footer-title"><b>Instale nosso app</b></p>
          <div class="gap-16 mob-gap-8"></div>
          <p class="footer-menu-link"><a href=""><img src="img/app_store.png" alt=""></a></p>
          <div class="gap-8"></div>
          <p class="footer-menu-link"><a href=""><img src="img/g_play.png" alt=""></a></p>        
        </div>
      </div>
      <div class="gap-32"></div>
      <div class="row align-items-center">
        <div class="col-12 col-md-8 p-left-fix">
          <div class="gap-16"></div>
          <p class="text-copyright"><span role="img" aria-label="copywright">©️ </span>Hubla Tecnologia LTDA • 2021</p>
          <div class="gap-16"></div>
          <p class="text-copyright">Rua Senador Cesar Lacerda Vergueiro, 380, Sala 61 e 62 - 39 subdist, Sumarezinho<br>São Paulo, SP - 05435-010 • 36.062.381/0001-80</p>
        </div>
        <div class="col-12 col-md-4 justify-content-end p-right-fix text-center">
          <div class="social-media-wrap">
          <div class="social-media">
            <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg>
            </a>
          </div>
          <div class="social-media">
            <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg>
            </a>
          </div>
          <div class="social-media">
            <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
            </a>
          </div>
          <div class="social-media">
            <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/></svg>
            </a>
          </div>
        </div>
        </div>
    </div>
    </div>
  </section>

</template>

<style scoped>
.bg_black{
    background-color:#161f00;
}

.slider-title{
    font-family: 'Satoshi', sans-serif;
    font-size: 48px;
    color: #f5f5f7;
    line-height: 100%;
    opacity: 1;
    margin: 0px;
    width:100%;
    text-align:center;
}


.carousel-inner{
    display: flex; 
    padding:30px 25%;
}

.carousel-item-wrap{
   margin:0 30px;
   padding:30px;
   text-align: center;
   background-color:#f5f5f7;
   border-radius:20px;
/*
   -webkit-box-shadow: 0px 5px 30px 2px rgba(34, 60, 80, 0.2);
   -moz-box-shadow: 0px 5px 30px 2px rgba(34, 60, 80, 0.2);
   box-shadow: 0px 5px 30px 2px rgba(34, 60, 80, 0.2);
*/
}

.carousel-item-wrap img{
   margin: 0 auto;
}

.carousel-item-wrap{
   min-height:450px;
}


.carousel-item-name{
    font-family: 'Satoshi', sans-serif;
    font-size: 18px;
    font-weight:bold;
    opacity: 1;
    margin: 0px;
}

.carousel-item-name-text{
    font-family: 'Satoshi', sans-serif;
    font-size: 16px;
    opacity: 1;
    margin: 0px;
}

.carousel-item-text{
    font-family: 'Satoshi', sans-serif;
    font-size: 24px;
    color: #00000099;
    opacity: 1;
    margin: 0px;
}

.carousel-my-control i{
   font-size:42px;

}

.carousel-control-next, .carousel-control-prev{
   color:#d8ff5f;
}


@media screen and (max-width: 600px){

.carousel-item-wrap{
   margin:0 5px;
}

.carousel-my-control{
   display:none;
}
.carousel-inner {
    padding: 10px;
}

.carousel-item-text{
   font-size:16px;
}

.carousel-item-text{
font-size:14px;
}


.slider-title{
font-size:32px;
padding-bottom: 20px;
}

}
</style>