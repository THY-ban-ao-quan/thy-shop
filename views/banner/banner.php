<div class="slide__banner">
    <div class="glide home-banner glide--ltr glide--slider glide--swipeable">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides banner__container">
                <?php foreach ($banners as $banner) : ?> 
                    <li class="glide__slide glide__slide--active">
                        <a target="_blank" href="https://ssstutter.com/campaign/more-than-thanks" style="background-image:url(./assets/img/banners/<?php echo $banner['banner']; ?>)"></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>  
</div>