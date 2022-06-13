


{!! Theme::partial('header') !!}


   <style>
    .one-slider-buttons div{
        background: rgb(18,102,227);
        background: linear-gradient(90deg, rgba(18,102,227,1) 0%, rgba(48,151,228,1) 79%);
        min-height: 100vh;
        text-align: center;
    }
    .one-slider-buttons img{
        margin-bottom:50px;
        margin-top:50px;
        padding: 50px;
    }
    
    .skip-splash {
        padding-top:150px;
        color:#fff;
    }
    
    
</style>

<div class="my-3 one-slider-buttons">
    
    <div class="text-white" style="background-image: url('/storage/splash3.png');background-size: cover;display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <h3 class="text-white">الأبلكيشن الاول في الكويت </h3>
        <p>لتنظيم معاملات البدل السكني بين العائلات الكويتية
        </p>
        
         <a href="/alryysy"><h2 class="skip-splash"><i class="fas fa-arrow-right"></i>تخطى</h3> </a>
        
    </div>
   
    <div class="text-white">
        <img src="/storage/splash1.png" class="w-100"/>
        <h3 class="text-white">عمليات البدل صارت اسهل</h3>
        <p>دون الحاجة لمكاتب العقار أو سماسرة العقار
            <br/> بدون عمولات
        </p>
    </div>
    
     <div class="text-white">
        <img src="/storage/splash2.png" class="w-100"/>
        <h3 class="text-white">عمليات البدل صارت اسهل</h3>
        <p>دون الحاجة لمكاتب العقار أو سماسرة العقار
            <br/> بدون عمولات
        </p>
    </div>
            
    
</div>


{!! Theme::partial('footer') !!}



