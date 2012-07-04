<?php include 'header.php'; ?>
<script type="text/javascript" language="javascript"> 
$(document).ready(function(){
    $('.carousel').carousel();
    $("#tab-home").live("click", function(){
        $(".nav-tabs").find("li").addClass("active");
        $("#home").addClass("active");
        $("#profile, #messages, #settings").removeClass("active");
    });
    $("#tab-profile").live("click", function(){
        $(".nav-tabs").find("li").addClass("active");
        $("#profile").addClass("active");
        $("#home, #messages, #settings").removeClass("active");
    });
    $("#tab-messages").live("click", function(){
        $("#messages").addClass("active");
        $("#profile, #home, #settings").removeClass("active");
    });
    $("#tab-settings").live("click", function(){
        $("#settings").addClass("active");
        $("#profile, #messages, #home").removeClass("active");
    });
});
        
</script>  

<div class="span8">
  <!--Body content-->

    <div class="carousel slide span8  offset2" id="myCarousel">
        <div class="carousel-inner">
              <div class="item">
                <ul class="thumbnails">
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                </ul>
             </div>
              <div class="item">
                <ul class="thumbnails">
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                </ul>
             </div>
              <div class="item">
                <ul class="thumbnails">
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="http://placehold.it/500x700" alt="">
                        </div>
                    </li>
                </ul>
             </div>

        </div>
    <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
    <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
    </div>


</div>
