(()=>{

var movieC = document.querySelector('.moviescontainer');
var right = document.querySelector('.right');
var left = document.querySelector('.left');

function rightmove(event)
{

//     var x = event.clientX;
//     if(x<350)
// {
//   console.log(x);
      TweenMax.to(movieC, 1, {x:"-=500px", ease:Power2.easeOut})
// }
// else {
//   console.log(x);
//   TweenMax.to(movieC, 1, {x:"=1000px", ease:Power2.easeOut})
//
// }
  }

  function leftmove(event)
  {

    TweenMax.to(movieC, 1, {x:"0px", ease:Power2.easeOut})
    }

right.addEventListener('click', rightmove, false);
left.addEventListener('click', leftmove, false);
})();
//
// $(function() {
// 		$('.pop').on('click', function() {
// 			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
// 			$('#imagemodal').modal('show');
// 		});
// });


// var container = document.querySelector('.moviescontainer')
// var sliderWidth = $('#slider').width();
// var docWidth = $(window).width();
// var mouseX = 0;
// var mouseXPercentage = 0;
// var translateValue = 0;
//
// $(document.body).mousemove(function(event) {
//   mouseX = event.clientX;
//   mouseXPercentage = mouseX / docWidth;
//   translateValue = (sliderWidth - docWidth) * mouseXPercentage;
//   $('div#slider').css('transform', 'translate\(-' + translateValue + 'px' + '\, 0px\)');
// });
