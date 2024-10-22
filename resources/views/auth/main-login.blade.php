
<style>
.container-xxl i:nth-child(1) {
    animation: animate 5s linear infinite;
}

.container-xxl i:nth-child(2) {
    animation: animate 7s linear infinite;
}

.container-xxl i:nth-child(3) {
    animation: animate 11s linear infinite;
}

.container-xxl .authentication-wrapper .authentication-inner .card:hover .container-xxl i {
    filter: drop-shadow(0 0 20px var(--clr));
    border: 6px solid transparent;
    border-image: linear-gradient(45deg, #0096bf, #013464) 1;
    border-radius: 50%; /* Optional: make them circular */
}

@keyframes animate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.container-xxl i {
    position: absolute;
    inset: 0;
    border: 3px solid transparent;
    border-radius: 50%;
    transition: .5s;
    background-clip: padding-box;
    border-image: linear-gradient(45deg, #0096bf, #013464) 1;
}
</style>

    
    <div class="container-xxl  bg-image-login d-flex" style="back">
   
    <div class="authentication-wrapper authentication-basic container-p-y">
   
    <div class="authentication-inner">
    <i style="--clr: #0096bf;"></i>
        <i style="--clr: #ffffff;"></i>
        <i style="--clr: #013464;"></i>
    <!-- Register -->
    <div class="card"style="border: 3px solid #0089b3;">
    <div class="card-body" >
    <!-- Logo -->
    <div class="app-brand justify-content-center">
    <a href="" class="app-brand-link gap-2">
    <span class="app-brand-logo demo">
        <img style="width:150px;" src="{{asset('assets/img/bank-icon/DT_Logo_N3.png')}}" alt="">
       </span>
