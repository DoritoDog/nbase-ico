window.addEventListener("load", function(event) {
  if ($(window).width() < 800) {
    toggleNavbar();
  }
  else {
    $('.navbar-toggle').hide();
  }
  
  let bankTabs = document.getElementsByClassName('tab');
  let tabDescs = document.getElementsByClassName('tab-description');

  for (var i = 0; i < bankTabs.length; i++) (function(i){
    bankTabs[i].addEventListener('mouseenter', function() {
      var display = tabDescs[i].style.display;
      tabDescs[i].style.display = display == 'block' ? 'none' : 'block';
    });

    bankTabs[i].addEventListener('mouseleave', function() {
      var display = tabDescs[i].style.display;
      tabDescs[i].style.display = display == 'block' ? 'none' : 'block';
    });
  })(i);
}, false);

var isNavCollapsed = false;
function toggleNavbar() {
  isNavCollapsed = !isNavCollapsed;
  var value = isNavCollapsed ? "none" : "block";
  var links = document.getElementsByClassName('navbar-link');
  for (var i = 0; i < links.length; i++) {
    links[i].style.setProperty("display", value, "important");
  }
}

particlesJS.load('particles', 'js/particles.json', null);

function goTo(url) {
  location.href = url;
}

