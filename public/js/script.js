$(function() {
    // Comportement de la barre de nav avec le Toggle
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
    });
  });
/*Toggle iphone*/ 
  $('.nav-toggle').click(function(){
    $('body').toggleClass('nav-open');
  });


/*Fade in on scroll*/
  $(document).on("scroll", function() {
    let pageTop = $(document).scrollTop();
    let pageBottom = pageTop + $(window).height();
    let tags = $(".tag");
  
    for (let i = 0; i < tags.length; i++) {
      let tag = tags[i];
  
      if ($(tag).position().top < pageBottom) {
        $(tag).addClass("visible");
      } else {
        $(tag).removeClass("visible");
      }
    }
  });
  

/*texte en mouvement*/ 
let text = document.getElementById('text');
let newDom = '';
let animationDelay = 6;

for(let i = 0; i < text.innerText.length; i++)
{
    newDom += '<span class="char">' + (text.innerText[i] == ' ' ? '&nbsp;' : text.innerText[i])+ '</span>';
}

text.innerHTML = newDom;
let length = text.children.length;

for(let i = 0; i < length; i++)
{
    text.children[i].style['animation-delay'] = animationDelay * i + 'ms';
}



$(document).mousemove(function (event) {
  $('.torch').css({
    'top': event.pageY,
    'left': event.pageX
  });
});






  