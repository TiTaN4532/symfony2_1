 $('document').ready(function(){
     $('.productList li').each(function(e){
  
                    if(!$("div.polaroid_"+e+" a").next().length){
                        $(".next_"+e).hide();
                    }

                    if(!$("div.polaroid_"+e+" a").prev().length){
                        $(".prev_"+e).hide();
                    }
                        
                    $("div.polaroid_"+e+" a").fancybox({
                        'titleShow' : false,
                        'transitionIn' : 'elastic',
                        'transitionOut' : 'elastic'
                    }); 
        
                    $('.caption_'+e).text($(".polaroid_"+e+" a:visible img").attr("alt"))

                    // Next controls
                    $(".next_"+e).click(function(){
                            if($(".polaroid_"+e+" a:last").is(":visible")){
                                    $(".polaroid_"+e+" a:visible").fadeOut(function(){
                                            $(".polaroid_"+e+" a:first").fadeIn();	
                                            $('.caption_'+e).text($(".polaroid_"+e+" a:visible img").attr("alt"));
                                    });
                            }
                            else{
                                    $(".polaroid_"+e+" a:visible").fadeOut(function(){
                                            $(this).next().fadeIn();
                                            $('.caption_'+e).text($(".polaroid_"+e+" a:visible img").attr("alt"));
                                    });
                            }
                            return false;
                    });

                    // Previous controls
                    $(".prev_"+e).click(function(){
                            if($(".polaroid_"+e+" a:first").is(":visible")){
                                    $(".polaroid_"+e+" a:visible").fadeOut(function(){
                                            $(".polaroid_"+e+" a:last").fadeIn();
                                            $('.caption_'+e).text($(".polaroid_"+e+" a:visible").attr("alt"));
                                    });
                            }
                            else{
                                    $(".polaroid_"+e+" a:visible").fadeOut(function(){
                                            $(this).prev().fadeIn();
                                            $("p.caption_"+e).text($(".polaroid_"+e+" a:visible img").attr("alt"));
                                    });
                            }
                            return false;
                    });
                
                });
 });