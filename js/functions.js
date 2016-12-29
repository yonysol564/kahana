jQuery(window).load(function(){

  //jQuery(".slick_pause").insertBefore(jQuery(".carousel-next"));
	jQuery('body').addClass('pageLoaded');

});


jQuery(document).ready(function($) {


  create_project_slider();
  masonry_init();

    if(jQuery("#contact_map").length) {
      phone = jQuery("#contact_map").data('phone');
      address = jQuery("#contact_map").data('address');
      console.log(address);
      init_google_map(address , phone);
    }

	 jQuery( ".toggle_search" ).click(function(e) {
        e.preventDefault();
        jQuery( ".abs_from" ).toggle( "fast", function() {
  
        });
    });

    jQuery( ".close_search" ).click(function(e) {
        e.preventDefault();
        jQuery( ".abs_from" ).slideToggle( "fast", function() {
  
        });
    });

    jQuery('.slick_pause a').click(function(e) {
      e.preventDefault();
      jQuery('.home_top_slider').slick('slickPause');
    });

    jQuery('.slick_play').on('click', function() {
        jQuery('.home_top_slider').slick('slickPlay');
    });

    jQuery( ".choose_cat" ).click(function() {
      jQuery( "#projects_nav_mobile" ).toggle();
    });



  jQuery(".fancybox").fancybox({
    helpers: {
        overlay: {
            locked: false
        }
    }
  });
  jQuery('.fancybox-media').fancybox({
      width  : 1000,           // set the width
      type   : 'iframe',      // tell the script to create an iframe
      openEffect  : 'fade',
      closeEffect : 'none',
        helpers: {
            overlay: {
                locked: false
            }
        }
  });


	jQuery(document).foundation();
});



// function masonry_init() {
//     if ( jQuery('body').hasClass('page-template-tpl-blog') ) {
//         jQuery(".grid").masonry({
//             itemSelector: '.grid-item',
//             columnWidth: '.grid_sizer',
//             isFitWidth: true,
//             gutter: 21
//         });

//         new AnimOnScroll( document.getElementById( 'grid' ), {
//             minDuration : 0.4,
//             maxDuration : 0.7,
//             viewportFactor : 0.2
//         } );
//     }
// }

function masonry_init() {
    if ( jQuery('body').hasClass('page-template-tpl-blog') ) {
        jQuery(".masonry").masonry({
            columnWidth: 390,
            gutter: 21,
            itemSelector: '.item',
            percentPosition: true,
            isOriginLeft: false
        });

        new AnimOnScroll( document.getElementById( 'grid' ), {
            minDuration : 0.4,
            maxDuration : 0.7,
            viewportFactor : 0.2
        } );
    }
}



function init_google_map(address , phone){
  console.log(address);
        
  if(locations && typeof locations !='undefined'){
          var map, infoBubble, infoBubble2;
          map = new google.maps.Map(document.getElementById('contact_map'), {
            zoom: 17,
            scrollwheel: false,
            zoomControl: false,
            streetViewControl: false,
            navigationControl: false,
            draggable: false,
            disableDoubleClickZoom: true,
            center: new google.maps.LatLng(locations[1],locations[2]),
              styles: 
              [
                {"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},
                {"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},
                {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},
                {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},
                {"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},
                {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},
                {"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},
                {"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},
                {"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},
                {"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},
                {"elementType":"labels.icon","stylers":[{"visibility":"off"}]},
                {"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},
                {"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},
                {"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}
              ],
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

          var icons = {
            info: {
              icon: domainurl + '/images/marker.png'
            }
          };

          var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(locations[1],locations[2]),
            icon: icons.info.icon,
            draggable: false
          });

          var contentString = 
          '<div class="infoBubble_container">'+
            '<div class="infoBubble_wrap">'+address+'</div>'+
            '<div>'+
              '<a href="tel:'+phone+'" title="">'+ phone +'</a>'+
            '</div>'+
          '</div>';


          infoBubble = new InfoBubble({
            map: map,
            minWidth: 177,
            minHeight: 76,
            content: contentString,
            position: google.maps.LatLng(locations[1],locations[2]),
            shadowStyle: 0,
            padding: 10,
            backgroundColor: 'rgb(255,255,255)',
            borderRadius: 0,
            arrowSize: 0,
            borderWidth: 1,
            borderColor: '#00ddb1',
            hideCloseButton: true,
            disableAutoPan: true,
            hideCloseButton: true,
            arrowPosition: 30,
            backgroundClassName: 'kahana_info',
            arrowStyle: 0
          });
          infoBubble.open(map, marker);

          var div = document.createElement('DIV');

          div.innerHTML = 'Hello';
          // google.maps.event.addListener(marker, 'click', function() {
          //   if (!infoBubble.isOpen()) {
          //     infoBubble.open(map, marker);
          //   }
          // });
          google.maps.event.addDomListener(updateStyles);

        function updateStyles() {
          var shadowStyle = document.getElementById('shadowstyle').value;
          infoBubble.setShadowStyle(shadowStyle);
          var padding = document.getElementById('padding').value;
          infoBubble.setPadding(padding);
          var borderRadius = document.getElementById('borderRadius').value;
          infoBubble.setBorderRadius(borderRadius);
          var borderWidth = document.getElementById('borderWidth').value;
          infoBubble.setBorderWidth(borderWidth);
          var borderColor = document.getElementById('borderColor').value;
          infoBubble.setBorderColor(borderColor);
          var backgroundColor = document.getElementById('backgroundColor').value;
          infoBubble.setBackgroundColor(backgroundColor);
          var maxWidth = document.getElementById('maxWidth').value;
          infoBubble.setMaxWidth(maxWidth);
          var maxHeight = document.getElementById('maxHeight').value;
          infoBubble.setMaxHeight(maxHeight);
          var minWidth = document.getElementById('minWidth').value;
          infoBubble.setMinWidth(minWidth);
          var minHeight = document.getElementById('minHeight').value;
          infoBubble.setMinHeight(minHeight);
          var arrowSize = document.getElementById('arrowSize').value;
          infoBubble.setArrowSize(arrowSize);
          var arrowPosition = document.getElementById('arrowPosition').value;
          infoBubble.setArrowPosition(arrowPosition);
          var arrowStyle = document.getElementById('arrowStyle').value;
          infoBubble.setArrowStyle(arrowStyle);
          var closeSrc = document.getElementById('closeSrc').value;
          infoBubble.setCloseSrc(closeSrc);
        }
  }
}


function create_project_slider(){
  article_slider = jQuery(".project_slider");
  article_slider.slick({
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 3200,
    slidesToShow: 1,
    centerMode: true,
    slidesToScroll: 1,
    rtl: true,
    variableWidth: true,
    focusOnSelect: false,
    arrows: true,
    prevArrow: '<div class="carousel-prev carousel-arr"></div>',
    nextArrow: '<div class="carousel-next carousel-arr"></div>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 640,
        settings: {
          arrows:false,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots:false,
          arrows:false,
          slidesToShow: 1
        }
      }
    ]
  });
}