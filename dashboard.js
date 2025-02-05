
const themeToggler = document.querySelector(".theme-toggler");

themeToggler.addEventListener('click' , () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})




//circular javascript code
(function($) {
       var slide = function(ele,options) {
        var $ele = $(ele);

        var setting = {

            speed: 1000,

            interval: 2000,
            
        };

        $.extend(true, setting, options);
        
        var states = [
            { $zIndex: 1, width: 120, height: 150, top: 69, left: 134, $opacity: 0.2 },
            { $zIndex: 2, width: 130, height: 170, top: 59, left: 0, $opacity: 0.4 },
            { $zIndex: 3, width: 170, height: 218, top: 35, left: 110, $opacity: 0.7 },
            { $zIndex: 4, width: 224, height: 288, top: 0, left: 263, $opacity: 1 },
            { $zIndex: 3, width: 170, height: 218, top: 35, left: 470, $opacity: 0.7 },
            { $zIndex: 2, width: 130, height: 170, top: 59, left: 620, $opacity: 0.4 },
            { $zIndex: 1, width: 120, height: 150, top: 69, left: 500, $opacity: 0.2 }
        ];

        var $lis = $ele.find('li');
        var timer = null;

        // 事件
        $ele.find('.hi-next').on('click', function() {
            next();
        });
        $ele.find('.hi-prev').on('click', function() {
            states.push(states.shift());
            move();
        });
        $ele.on('mouseenter', function() {
            clearInterval(timer);
            timer = null;
        }).on('mouseleave', function() {
            autoPlay();
        });

        move();
        autoPlay();


        function move() {
            $lis.each(function(index, element) {
                var state = states[index];
                $(element).css('zIndex', state.$zIndex).finish().animate(state, setting.speed).find('img').css('opacity', state.$opacity);
            });
        }

        // 切换到下一张
        function next() {
          
            states.unshift(states.pop());
            move();
        }

        function autoPlay() {
            timer = setInterval(next, setting.interval);
        }
    }
    // 找到要轮播的轮播图的根标签，调用 slide()
    $.fn.hiSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele,options);
        });
        // 返回值，以便支持链式调用
        return this;
    }
})(jQuery);




//code-2
!function(a){var b=function(b,c){function d(){j.each(function(b,c){var d=i[b];a(c).css("zIndex",d.$zIndex).finish().animate(d,h.speed).find("img").css("opacity",d.$opacity)})}function e(){i.unshift(i.pop()),d()}function f(){k=setInterval(e,h.interval)}var g=a(b),h={speed:1e3,interval:2e3};a.extend(!0,h,c);var i=[{$zIndex:1,width:120,height:150,top:69,left:134,$opacity:.2},{$zIndex:2,width:130,height:170,top:59,left:0,$opacity:.4},{$zIndex:3,width:170,height:218,top:35,left:110,$opacity:.7},{$zIndex:4,width:224,height:288,top:0,left:263,$opacity:1},{$zIndex:3,width:170,height:218,top:35,left:470,$opacity:.7},{$zIndex:2,width:130,height:170,top:59,left:620,$opacity:.4},{$zIndex:1,width:120,height:150,top:69,left:500,$opacity:.2}],j=g.find("li"),k=null;g.find(".hi-next").on("click",function(){e()}),g.find(".hi-prev").on("click",function(){i.push(i.shift()),d()}),g.on("mouseenter",function(){clearInterval(k),k=null}).on("mouseleave",function(){f()}),d(),f()};a.fn.hiSlide=function(c){return a(this).each(function(a,d){b(d,c)}),this}}(jQuery);