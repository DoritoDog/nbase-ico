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

$(window).scroll(function() {

  if ($(window).width() <= 549) {

    $('.animated').css('opacity', 1);

} else if ($(window).width() > 549) {

    if ($(window).scrollTop() > 400) {
      $('#trading-1').addClass('fadeInDown');
      $('#trading-2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 600) {
      $('#trading-3').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 700) {
      $('#economy iframe').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 1400) {
      $('#bank > h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1500) {
      $('#bank p').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1600) {
      $('.bank-info > h2').addClass('fadeInDown');
      $('#bank .float-left').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1700) {
      $('#tab-1').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1750) {
      $('#tab-2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 1800) {
      $('#tab-3').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 2000) {
      $('#gameplay h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 2100) {
      $('#gameplay h5').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 2200) {
      $('#gameplay img').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 2300) {
      $('#gameplay p').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 2600) {
      $('#ico-details').addClass('fadeInDown');
      $('#ico-stats').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 3000) {
      $('#developer h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 3100) {
      $('#developer h3').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 3200) {
      $('.dev-desc').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 3300) {
      $('#developer .email').addClass('fadeInDown');
    }

    if ($(window).scrollTop() > 4200) {
      $('#faq h2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 4000) {
      $('#faq-1').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 4200) {
      $('#faq-2').addClass('fadeInDown');
    }
    if ($(window).scrollTop() > 4400) {
      $('#faq-3').addClass('fadeInDown');
    }

  }
});

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    let sales = JSON.parse(this.responseText);
    sales.forEach(soldItem => {
      console.log(soldItem);
      let parent = document.createElement('div');
      parent.classList.add('sold-item');

      let img = document.createElement('img');
      img.src = <?= $images ?> + soldItem.item_identifier + '.png';
      img.height = 200;
      parent.appendChild(img);

      let h4 = document.createElement('h4');
      h4.innerHTML = soldItem.item_identifier + ' <br> ' + `<small>${soldItem.address.substr(0, 12)}...</small>`;
      h4.classList.add('text-center');
      parent.appendChild(h4);

      document.getElementById('sales-parent').appendChild(parent);
    });
  }
};
xhttp.open("POST", "https://api.nbase.belgharbi.com/lastSolds", true);
xhttp.send();