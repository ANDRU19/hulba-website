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
            <li class="nav-item pl-18 pr-18 pb-18 d-lg-none"><button class="btn-menu btn-menu-mob btn-bg-none mr-24">Já sou membro/Login</button></li>
            <li class="nav-item pl-18 pr-18 pb-18 d-lg-none"><button class="btn-menu btn-menu-mob btn-bg-green">Comece agora/Register</button></li>
            </li>
          </ul>
        </div>
        <div class="right-btn-block">
          <button onclick="location.href='{{ route('login') }}';" class="btn-menu btn-bg-none mr-24 d-none d-lg-block">Já sou membro/Log in </button>
          <button onclick="location.href='{{ route('login') }}';" class="btn-menu btn-bg-black">Comece agora/Register</button>
        </div>
      </div>
      <div class="gap-8"></div>
    </div>
  </section>