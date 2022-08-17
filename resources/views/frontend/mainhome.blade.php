@extends('layouts.master-without-nav')
<style>
    body, html {
  /* height: 100%;
  width:100%; */
  margin: 0;
}
   
    .main-div{

        /* height: 100%; */
  width:100%;
        background-image:url('');
        background-repeat:no-repeat;
        background-size:cover;
        /* min-height:100vh; */
        /* object-fit:cover; */
    }
    .but{
        position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
    }
  
    .mobile{
        display:none;
    }
    @media(max-width:420px){
        .mobile{
        display:block !important;
    }
    .desktop{
        display:none;
    }
    }
    </style>
    <div class="main-div">
     <img src="{{ asset('/assets/images/crypto/features-img/main-banner.jpeg') }}" class="w-100 h-100 desktop">
     <img src="{{ asset('/assets/images/crypto/features-img/mobile-banner.jpg') }}" class="w-100 h-100 mobile">
     <div class="but">
        <a href="/user/register/create" class="text-white"><img src="{{ asset('/assets/images/crypto/features-img/giphy.gif') }}" class="w-100"></a>
</div>
    </div>
