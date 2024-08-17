/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");

/* Exists */
$.fn.exists = function () {
  return this.length;
};

/* Paging ajax */
if ($(".paging-product").exists()) {
  loadPagingAjax("ajax/ajax_news.php?perpage=12", ".paging-product");
}


$(".paging-questions").each(function () {
  let idl = $(this).attr("data-id");
  console.log(idl);
  loadPagingAjax("ajax/ajax_questions.php?perpage=5", ".paging-questions",
  idl,);
});

$(".paging-product-index").each(function () {
  let idl = $(this).attr("data-id");
  let idbrand = $(this).attr("data-idbrand");
  loadPagingAjax(
    "ajax/ajax_product_paging.php?perpage=12",
    ".paging-product-index",
    idl,
    idbrand,
  );
});

$(".paging-productthaythe-index").each(function () {
  let idl = $(this).attr("data-id");
  let idcat = $(this).attr("data-idcat");
  loadPagingAjax(
    "ajax/ajax_productthaythe.php?perpage=12",
    ".paging-productthaythe-index",
    idl,
    idcat,
  );
});
/* Paging category ajax 
    if($(".paging-product-category").exists()){
        $(".paging-product-category").each(function(){
            var list = $(this).data("list");
            var cat = $(this).data("cat");
            var item = $(this).data("item");
            var namelist = $(this).data("namelist");
            loadPagingAjax("ajax/ajax_product.php?perpage=8&idList="+list+"&idCat="+cat+"&idItem="+item+"&namelist="+namelist,'.paging-product-category-'+cat);
        });

        $('.boxproitem_item').click(function(){
            var list = $(this).data("list");
            var cat = $(this).data("cat");
            var item = $(this).data("item");
            var namelist = $(this).data("namelist");
            loadPagingAjax("ajax/ajax_product.php?perpage=8&idList="+list+"&idCat="+cat+"&idItem="+item+"&namelist="+namelist,'.paging-product-category-'+cat);
        });
    }
*/

/* Back to top */
NN_FRAMEWORK.BackToTop = function () {
  $(window).scroll(function () {
    // if(!$('.scrollToTop').length) $("body").append('<div class="scrollToTop"><i class="fas fa-arrow-to-top"></i></div>');
    // if($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
    // else $('.scrollToTop').fadeOut();
  });

  $("body").on("click", ".scrollToTop", function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
    return false;
  });
};

/* Alt images */
NN_FRAMEWORK.AltImages = function () {
  $("img").each(function (index, element) {
    if (!$(this).attr("alt") || $(this).attr("alt") == "") {
      $(this).attr("alt", WEBSITE_NAME);
    }
  });
};

/* Fix menu */
NN_FRAMEWORK.FixMenu = function () {
  $(window).scroll(function () {
    let hei = $(".all_header").height() + 30;
    // console.log(hei);
    if ($(window).scrollTop() > hei) {
      $(".all_header").addClass("fixed");
      $("body").addClass("fixed_pd");
    }
    else {
      $(".all_header").removeClass("fixed");
      $("body").removeClass("fixed_pd");
    }
  });
};

/* Tools */
NN_FRAMEWORK.Tools = function () {
  if ($(".toolbar").exists()) {
    $(".footer").css({ marginBottom: $(".toolbar").innerHeight() });
  }
};

/* Popup */
NN_FRAMEWORK.Popup = function () {
  if ($("#popup").exists()) {
    $("#popup").modal("show");
  }
};

/* Wow */
NN_FRAMEWORK.WowAnimation = function () {
  new WOW().init();
};

/* Toc */
NN_FRAMEWORK.Toc = function () {
  if ($(".toc-list").exists()) {
    $(".toc-list").toc({
      content: "div#toc-content",
      headings: "h2,h3,h4",
    });

    if (!$(".toc-list li").length) $(".meta-toc").hide();

    $(".toc-list")
      .find("a")
      .click(function () {
        var x = $(this).attr("data-rel");
        goToByScroll(x);
      });
  }
};

/* Simply scroll */
NN_FRAMEWORK.SimplyScroll = function () {
  if ($(".roll_news ul").exists()) {
    $(".roll_news ul").simplyScroll({
      customClass: "vert",
      orientation: "vertical",
      // orientation: 'horizontal',
      auto: true,
      manualMode: "auto",
      pauseOnHover: 1,
      speed: 1,
      loop: 0,
    });
  }
  if ($(".roll_news1 ul").exists()) {
    $(".roll_news1 ul").simplyScroll({
      customClass: "vert",
      orientation: "vertical",
      // orientation: 'horizontal',
      auto: true,
      manualMode: "auto",
      pauseOnHover: 1,
      speed: 1,
      loop: 0,
    });
  }
};

/* Tabs */
NN_FRAMEWORK.Tabs = function () {
  if ($(".ul-tabs-pro-detail").exists()) {
    $(".ul-tabs-pro-detail li").click(function () {
      var tabs = $(this).data("tabs");
      $(".content-tabs-pro-detail, .ul-tabs-pro-detail li").removeClass(
        "active"
      );
      $(this).addClass("active");
      $("." + tabs).addClass("active");
    });
  }
};

/* Search */
NN_FRAMEWORK.Search = function () {
  if ($(".icon-search").exists()) {
    $(".icon-search").click(function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(".search-grid")
          .stop(true, true)
          .animate({ opacity: "0", width: "0px" }, 200);
      } else {
        $(this).addClass("active");
        $(".search-grid")
          .stop(true, true)
          .animate({ opacity: "1", width: "230px" }, 200);
      }
      document.getElementById($(this).next().find("input").attr("id")).focus();
      $(".icon-search i").toggleClass("fa fa-search fa fa-times");
    });
  }
};

/* Videos */
NN_FRAMEWORK.Videos = function () {
  if ($(".video").exists()) {
    $('[data-fancybox="video"]').fancybox({
      transitionEffect: "fade",
      transitionDuration: 800,
      animationEffect: "fade",
      animationDuration: 800,
      arrows: true,
      infobar: false,
      toolbar: true,
      hash: false,
    });
  }
};

/* Owl */
NN_FRAMEWORK.OwlPage = function () {
  if ($(".owl-slideshow").exists()) {
    $(".owl-slideshow").owlCarousel({
      items: 1,
      rewind: true,
      autoplay: false,
      loop: false,
      lazyLoad: false,
      mouseDrag: false,
      touchDrag: false,
      animateOut: "fadeOut",
      animateIn: "fadeIn",
      margin: 0,
      autoplayTimeout: 10000,
      smartSpeed: 500,
      autoplaySpeed: 5000,
      nav: false,
      dots: true,
    });
    $(".prev-slideshow").click(function () {
      $(".owl-slideshow").trigger("prev.owl.carousel");
    });
    $(".next-slideshow").click(function () {
      $(".owl-slideshow").trigger("next.owl.carousel");
    });
  }

  if ($(".owl-dv").exists()) {
    $(".owl-dv").owlCarousel({
      rewind: true,
      autoplay: true,
      loop: false,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 10,
        },
        450: {
          items: 2,
          margin: 10,
        },
        800: {
          items: 3,
          margin: 10,
        },
        1000: {
          items: 4,
          margin: 20,
        },
        1025: {
          items: 4,
          margin: 20,
        },
      },
    });
    $(".prev-dv").click(function () {
      $(".owl-dv").trigger("prev.owl.carousel");
    });
    $(".next-dv").click(function () {
      $(".owl-dv").trigger("next.owl.carousel");
    });
  }
  if ($(".auto_video").exists()) {
    $(".auto_video").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 2,
          margin: 0,
        },
        450: {
          items: 2,
          margin: 10,
        },
        800: {
          items: 3,
          margin: 10,
        },
        1000: {
          items: 3,
          margin: 20,
        },
        1030: {
          items: 3,
          margin: 30,
        },
      },
    });
    /*$('.prev-partner').click(function() {
            $('.owl-partner').trigger('prev.owl.carousel');
        });
        $('.next-partner').click(function() {
            $('.owl-partner').trigger('next.owl.carousel');
        });*/
  }
  if ($(".auto_social").exists()) {
    $(".auto_social").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      center: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1.5,
          margin: 10,
        },
        450: {
          items: 1.5,
          margin: 10,
        },
        800: {
          items: 1.5,
          margin: 10,
        },
        1000: {
          items: 2.5,
          margin: 20,
        },
        1030: {
          items: 2.5,
          margin: 20,
        },
      },
    });
    /*$('.prev-partner').click(function() {
            $('.owl-partner').trigger('prev.owl.carousel');
        });
        $('.next-partner').click(function() {
            $('.owl-partner').trigger('next.owl.carousel');
        });*/
  }

  if ($(".auto_slogan").exists()) {
    $(".auto_slogan").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      autoHeight: true,
      autoplayTimeout: 10000,
      smartSpeed: 1000,
      autoplaySpeed: 8000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 300,
      responsive: {
        0: {
          items: 1,
          margin: 10,
        },
        450: {
          items: 1,
          margin: 10,
        },
        800: {
          items: 1,
          margin: 10,
        },
        1000: {
          items: 1,
          margin: 20,
        },
        1030: {
          items: 1,
          margin: 30,
        },
      },
    });
    $(".prev-slogan").click(function () {
      $(".auto_slogan").trigger("prev.owl.carousel");
    });
    $(".next-slogan").click(function () {
      $(".auto_slogan").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_sanpham").exists()) {
    $(".auto_sanpham").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      autoplayTimeout: 8000,
      smartSpeed: 500,
      autoplaySpeed: 5000,
      nav: false,
      dots: true,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 10,
        },
        350: {
          items: 1,
          margin: 10,
        },
        450: {
          items: 1,
          margin: 10,
        },
        800: {
          items: 1,
          margin: 10,
        },
        1000: {
          items: 1,
          margin: 10,
        },
        1030: {
          items: 1,
          margin: 10,
        },
      },
    });
    $(".prev-sp").click(function () {
      $(".auto_sanpham").trigger("prev.owl.carousel");
    });
    $(".next-sp").click(function () {
      $(".auto_sanpham").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_listsanpham").exists()) {
    $(".auto_listsanpham").owlCarousel({
      rewind: true,
      autoplay: true,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      autoplayTimeout: 12000,
      smartSpeed: 500,
      autoplaySpeed: 5000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 0,
        },
        350: {
          items: 1,
          margin: 10,
        },
        450: {
          items: 1,
          margin: 0,
        },
        800: {
          items: 1,
          margin: 0,
        },
        1000: {
          items: 1,
          margin: 0,
        },
        1030: {
          items: 1,
          margin: 0,
        },
      },
    });
    $(".prev-lsp").click(function () {
      $(".auto_listsanpham").trigger("prev.owl.carousel");
    });
    $(".next-lsp").click(function () {
      $(".auto_listsanpham").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_imgsanpham").exists()) {
    $(".auto_imgsanpham").owlCarousel({
      rewind: true,
      autoplay: true,
      loop: true,
      lazyLoad: false,
      mouseDrag: false,
      touchDrag: false,
      smartSpeed: 500,
      autoplaySpeed: 1000,
      // delay: .
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 10,
        },
        450: {
          items: 1,
          margin: 10,
        },
        800: {
          items: 1,
          margin: 10,
        },
        1000: {
          items: 1,
          margin: 20,
        },
        1030: {
          items: 1,
          margin: 30,
        },
      },
    });
    $(".prev-imgsp").click(function () {
      $(".auto_imgsanpham").trigger("prev.owl.carousel");
    });
    $(".next-imgsp").click(function () {
      $(".auto_imgsanpham").trigger("next.owl.carousel");
    });
  }
};

/* Owl pro detail */
NN_FRAMEWORK.OwlProDetail = function () {
  if ($(".owl-thumb-pro").exists()) {
    $(".owl-thumb-pro").owlCarousel({
      items: 4,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      margin: 10,
      smartSpeed: 250,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 3,
          margin: 10,
        },
        500: {
          items: 4,
          margin: 10,
        },
      },
    });
    $(".prev-thumb-pro").click(function () {
      $(".owl-thumb-pro").trigger("prev.owl.carousel");
    });
    $(".next-thumb-pro").click(function () {
      $(".owl-thumb-pro").trigger("next.owl.carousel");
    });
  }
};

/* Cart */
NN_FRAMEWORK.loadmap = function () {
  $("body").on("click", ".loadmap", function () {
    $(".loadmap").removeClass("active");
    $(this).addClass("active");
    let id = $(this).attr("data-id");
    $.ajax({
      url: "ajax/ajax_bando.php",
      type: "POST",
      async: false,
      data: { id: id },
      success: function (result) {
        $(".form-contact").html(result);
      },
    });
  });
};
NN_FRAMEWORK.Cart = function () {
  $("body").on("click", ".addcart", function () {
    var mau = $(".color_detail").val();
    // var mau = $(".color-pro-detail input:checked").val();
    var size = $(".size-pro-detail input:checked").val();
    var id = $(this).data("id");
    var cannang = $(".cannang").val();
    var kichthuoc = $(".kichthuoc").val();
    var action = $(this).data("action");
    var lang = $(this).data("lang");
    var tigia = $(this).data("tigia");
    var id_vip = $(this).data("id_vip");
    var quantity = $("#quantity").val() ? $("#quantity").val() : 1;
    // console.log(mau);

    if (id) {
      $.ajax({
        url: "ajax/ajax_cart.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
          cmd: "add-cart",
          id: id,
          mau: mau,
          size: size,
          quantity: quantity,
          cannang,
          kichthuoc,
          lang,
        },
        success: function (result) {
          if (action == "addnow") {
            $(".count-cart").html(result.max);
            $.ajax({
              url: "ajax/ajax_cart.php",
              type: "POST",
              dataType: "html",
              async: false,
              data: { cmd: "popup-cart", lang, tigia, id_vip },
              success: function (result) {
                $("#popup-cart .modal-body").html(result);
                $("#popup-cart").modal("show");
              },
            });
          } else if (action == "buynow") {
            window.location = CONFIG_BASE + "gio-hang";
          }
        },
      });
    }
  });

  $("body").on("click", ".del-procart", function () {
    if (confirm(LANG["delete_product_from_cart"])) {
      var code = $(this).data("code");
      var ship = $(".price-ship").val();

      $.ajax({
        type: "POST",
        url: "ajax/ajax_cart.php",
        dataType: "json",
        data: { cmd: "delete-cart", code: code, ship: ship },
        success: function (result) {
          $(".count-cart").html(result.max);
          // location.reload();
          if (result.max) {
            $(".price-temp").val(result.temp);
            $(".load-price-temp").html(result.tempText);
            $(".price-total").val(result.total);
            $(".load-price-total").html(result.totalText);
            $(".procart-" + code).remove();
          } else {
            $(".wrap-cart").html(
              '<a href="" class="empty-cart text-decoration-none"><i class="fa fa-cart-arrow-down"></i><p>' +
                LANG["no_products_in_cart"] +
                "</p><span>" +
                LANG["back_to_home"] +
                "</span></a>"
            );
          }
        },
      });
    }
  });

  $("body").on("click", ".counter-procart", function () {
    var soluongkho = $(this).data("soluongkho");
    var $button = $(this);
    var lang = $(".lang").val();
    var tigia = $(".tigia").val();
    var input = $button.parent().find("input");
    var id = input.data("pid");
    var code = input.data("code");
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") {
      if (oldValue >= soluongkho) {
        quantity = parseFloat(oldValue);
        $button.disabled = true;
      } else {
        quantity = parseFloat(oldValue) + 1;
      }
    } else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
    $button.parent().find("input").val(quantity);
    update_cart(id, code, quantity, lang, tigia);
  });

  $("body").on("change", "input.quantity-procat", function () {
    var quantity = $(this).val();
    var lang = $(".lang").val();
    var tigia = $(".tigia").val();
    var id = $(this).data("pid");
    var code = $(this).data("code");
    update_cart(id, code, quantity, lang, tigia);
  });

  if ($(".select-city-cart").exists()) {
    $(".select-city-cart").change(function () {
      var id = $(this).val();
      load_district(id);
      load_ship();
    });
  }

  if ($(".select-district-cart").exists()) {
    $(".select-district-cart").change(function () {
      var id = $(this).val();
      load_wards(id);
      load_ship();
    });
  }

  if ($(".select-wards-cart").exists()) {
    $(".select-wards-cart").change(function () {
      var id = $(this).val();
      load_ship(id);
    });
  }

  if ($(".discount_text").exists()) {
    $(".discount_text").on("input", function () {
      var ma = $(this).val();
      var lang = $(".lang").val();
      var tigia = $(".tigia").val();
      // console.log(ma);
      load_discount(ma, lang, tigia);
    });
  }

  if ($(".payments-label").exists()) {
    $(".payments-label").click(function () {
      var payments = $(this).data("payments");
      $(".payments-cart .payments-label, .payments-info").removeClass("active");
      $(this).addClass("active");
      $(".payments-info-" + payments).addClass("active");
    });
  }

  if ($(".color-pro-detail").exists()) {
    $(".color-pro-detail").click(function () {
      $(".color-pro-detail").removeClass("active");
      $(this).addClass("active");

      var id_mau = $("input[name=color-pro-detail]:checked").val();
      var idpro = $(this).data("idpro");

      $.ajax({
        url: "ajax/ajax_color.php",
        type: "POST",
        dataType: "html",
        data: { id_mau: id_mau, idpro: idpro },
        success: function (result) {
          if (result != "") {
            $(".left-pro-detail").html(result);
            MagicZoom.refresh("Zoom-1");
            NN_FRAMEWORK.OwlProDetail();
          }
        },
      });
    });
  }

  if ($("#dowload_taptin").exists()) {
    $("#dowload_taptin").click(function () {
      // com = "thuonghieuxe";
      var id_user = $(".id_user").val();
      var id = $(this).data("id");

      $.ajax({
        url: "ajax/ajax_update_newsletter.php",
        type: "POST",
        dataType: "html",
        data: { id_user: id_user, id: id },
        success: function (result) {
          if (result != "") {
            $(".test").html(result);
            // onSearchsp();
          }
        },
      });
    });
  }

  if ($(".code_dh_tk").exists()) {
    $(".code_dh_tk").click(function () {
      // com = "thuonghieuxe";
      var code_dh = $(".code_dh").val();

      $.ajax({
        url: "ajax/ajax_the_bh.php",
        type: "POST",
        dataType: "html",
        data: { code_dh: code_dh },
        success: function (result) {
          if (result != "") {
            $(".ketqua_donhang").html(result);
            // onSearchsp();
          }
        },
      });
    });
  }

  if ($(".check_mysub").exists()) {
    $(".check_mysub").click(function () {
      var id_news = $(this).data("id_news");
      var id_user = $(".id_user").val();

      $.ajax({
        url: "ajax/ajax_mysub.php",
        type: "POST",
        dataType: "html",
        data: { id_news: id_news, id_user: id_user },
        success: function (result) {
          $(".test").html(result);
          if ($this.is(":checked")) $this.prop("checked", false);
          else $this.prop("checked", true);
        },
      });
    });
  }

  if ($(".tracking_Reorder,.reorder_button").exists()) {
    $(".tracking_Reorder,.reorder_button").click(function () {
      var id_order = $(this).data("id_order");
      $.ajax({
        url: "ajax/ajax_tracking_Reorder.php",
        type: "POST",
        dataType: "html",
        data: { id_order: id_order },
        success: function (result) {
          $("#reo_order .modal-body").html(result);
          $("#reo_order").modal("show");

          if ($(".table_matrix_add_to_cart").exists()) {
            $(".table_matrix_add_to_cart").click(function () {
              var row_active = $(".sanpham_giohang");
              // console.log(row_active);
              row_active.each(function (index, el) {
                var mau = $(el).find(".color_detail").val();
                var id = $(el).find(".id").val();
                var cannang = $(el).find(".cannang").val();
                var kichthuoc = $(el).find(".kichthuoc").val();
                var action = $(el).find(".action").val();
                var lang = $(el).find(".lang").val();
                var id_vip = $(el).find(".id_vip").val();
                var quantity = $(el).find(".quantity").val() ? $(el).find(".quantity").val() : 1;
                // console.log(size);
                if (id) {
                  $.ajax({
                    url: "ajax/ajax_cart.php",
                    type: "POST",
                    dataType: "json",
                    async: false,
                    data: {
                      cmd: "add-cart",
                      id: id,
                      mau: mau,
                      quantity: quantity,
                      cannang,
                      kichthuoc,
                      lang,
                    },
                    success: function (result) {
                      if (action == "addnow") {
                        $(".count-cart").html(result.max);
                        $.ajax({
                          url: "ajax/ajax_cart.php",
                          type: "POST",
                          dataType: "html",
                          async: false,
                          data: { cmd: "popup-cart", lang, id_vip },
                          success: function (result) {
                            $("#popup-cart .modal-body").html(result);
                            $("#popup-cart").modal("show");
                          },
                        });
                      } else if (action == "buynow") {
                        window.location = CONFIG_BASE + "gio-hang";
                      }
                    },
                  });
                }
              });
            });
          }
        },
      });
    });
  }

  if ($(".add_card").exists()) {
    $(".add_card").click(function () {
      $("#popup_card").modal("show");
    });
  }

  if ($(".size-pro-detail").exists()) {
    $(".size-pro-detail").click(function () {
      $(".size-pro-detail").removeClass("active");
      $(this).addClass("active");
    });
  }

  if ($(".base-checkbox").exists()) {
    $(".base-checkbox").click(function () {
      var id_brand = "";
      var check_brand = $(".base-checkbox.active");
      check_brand.each(function () {
        id_brand = id_brand + "," + $(this).data("brand");
      });
      if ((id_brand.length = 1)) {
        id_brand = id_brand.substring(1);
      }

      $(".all_brand").val(id_brand);
    });
  }

  if ($(".select_thuonghieuxe").exists()) {
    $(".select_thuonghieuxe li").click(function () {
      var ht_ml = $(this).html();
      $(this).parent('.results__options').parent('.select_tong').find('.option_select').find('span').html(ht_ml);
      com = "thuonghieuxe";
      id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id },
        success: function (result) {
          if (result != "") {
            $(".select_tenxe").find('.results__options').html(result);
            $("#ul_select_tenxe").html(result);
            
            $(".double_click").click(function() {
              if ($(this).hasClass('active')) {
                  $(this).removeClass('active');
              } else {
                  $(this).addClass('active');
              }
              var ht_ml = $(this).html();
              $(this).parent('.results__options').parent('.select_tong').find('.option_select').find('span').html(ht_ml);
              $(this).parent('ul').parent('li').parent('.results__options').parent('.select_tong').find('.option_select').find('span').html(ht_ml);
              // console.log($(this).html());
          });
          }
        },
      });
    });
  }
  if ($("#ul_select_thuonghieuxe").exists()) {
    $("#ul_select_thuonghieuxe li").click(function () {
      var ht_ml = $(this).html();
      $('.select_thuonghieuxe').find('.option_select').find('span').html(ht_ml);
      com = "thuonghieuxe";
      id = $(this).data('id');
      // console.log(id);
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id },
        success: function (result) {
          if (result != "") {
            $("#ul_select_tenxe").html(result);
            
            $(".double_click").click(function() {
              if ($(this).hasClass('active')) {
                  $(this).removeClass('active');
              } else {
                  $(this).addClass('active');
              }
              var ht_ml = $(this).html();
              // $('.select_thuonghieuxe').find('.option_select').find('span').html(ht_ml);
              $('.select_tenxe').find('.option_select').find('span').html(ht_ml);
              // console.log($(this).html());
          });
          }
        },
      });
    });
  }

  if ($(".brand_news").exists()) {
    $(".brand_news").click(function () {
      $(".brand_news").removeClass("active");
      $(this).addClass("active");

      var orderby = $(".orderby_news").val();
      id_brand = $(this).data("idbrand");
      idlist = $(".idlist").val();
      type = $(".type").val();
      $.ajax({
        url: "ajax/ajax_getsearchnews.php",
        type: "POST",
        dataType: "html",
        data: { id_brand: id_brand, idlist: idlist, type: type, orderby },
        success: function (result) {
          if (result != "") {
            $(".all_search_news").html(result);
            // onSearchsp();
          }
        },
      });
    });
  }

  $(document).on("change", ".orderby_news", function () {
    var orderby = $(".orderby_news").val();
    idlist = $(".idlist").val();
    type = $(".type").val();
    id_brand = $(".brand_news.active").data("idbrand");
    $.ajax({
      url: "ajax/ajax_getsearchnews.php",
      type: "POST",
      dataType: "html",
      data: {
        orderby: orderby,
        idlist: idlist,
        type: type,
        id_brand: id_brand,
      },
      success: function (result) {
        if (result != "") {
          $(".all_search_news").html(result);
        }
      },
    });
  });

  if ($(".double_click_ndm").exists()) {
    $(".double_click_ndm").click(function () {
      // $('.select_thuonghieusanpham').find('.option_select').find('span').each(function() {
      //     var spanText = $(this).html();
      //     console.log(spanText);
      //     if (spanText !== 'Thương Hiệu Sản Phẩm' && spanText !== 'Product brands') {
      //         $(this).html('');
      //     }
      // });

      $(".double_click_ndm").removeClass('active');
      $(this).addClass('active');

      var ht_ml = $(this).html();
      $(this).parent('ul').parent('li').parent('.results__options').parent('.select_tong').find('.option_select').find('span').html(ht_ml);
      com = "loaisanpham";
      id = $(this).data('id');
      // console.log(id);
      thuonghieusanpham = $(".select_thuonghieusanpham").html();
      id_loaisanpham = $(".select_thuonghieusanpham").find('.double_click.active').data('id');
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id,id_loaisanpham: id_loaisanpham },
        success: function (result) {
          if (result != "") {
            $(".select_thuonghieusanpham").find('.results__options').html(result);
            $("#ul_select_thuonghieusanpham").html(result);
            $(".ul_select_thuonghieusanpham").html(result);
            click_danhmucsp_mobile(com,id);
            click_thuonghieusanpham_mobile(com, id);
            click_thuonghieusanpham(com, id);
          }
        },
      });
    });
  }

  if ($(".double_click_ndm_mobile").exists()) {
    $(".double_click_ndm_mobile").click(function () {
      // $('.select_thuonghieusanpham').find('.option_select').find('span').each(function() {
      //   var spanText = $(this).html();
      //   if (spanText !== 'Thương Hiệu Sản Phẩm' && spanText !== 'Product brands') {
      //      $(this).html('');
      //   }
      // });
      
      $(".double_click_ndm_mobile").removeClass('active');
      $(this).addClass('active');

      var ht_ml = $(this).html();
      $('.select_loaisanpham ').find('.option_select').find('span').html(ht_ml);
      
      com = "loaisanpham";
      id = $(this).data('id');
      // console.log(id);
      thuonghieusanpham = $(".select_thuonghieusanpham").html();
      id_loaisanpham = $(".select_thuonghieusanpham").find('.double_click.active').data('id');
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id,id_loaisanpham: id_loaisanpham },
        success: function (result) {
          if (result != "") {
            $("#ul_select_thuonghieusanpham").find('.results__options').html(result);
            $("#ul_select_thuonghieusanpham").html(result);
            click_danhmucsp_mobile(com,id);
            click_thuonghieusanpham_mobile(com, id);
            click_thuonghieusanpham(com, id);
          }
        },
      });
    });
  }

  if ($(".select_thuonghieusanpham").exists()) {
    $(".select_thuonghieusanpham li").click(function () {
      // $(".select_thuonghieusanpham li").removeClass('active');
      // $(this).addClass('active');

      var ht_ml = $(this).html();
      $(this).parent('.results__options').parent('.select_tong').find('.option_select').find('span').html(ht_ml);
      com = "thuonghieusanpham";
      id = $(this).data('id');
      loaisanpham = $(".select_loaisanpham").html();
      id_loaisanpham = $(".select_loaisanpham").find('.double_click_ndm.active').data('id');
      console.log(id_loaisanpham);
      console.log(id);
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id, id_loaisanpham: id_loaisanpham },
        success: function (result) {
          if (result != "") {
            $(".select_loaisanpham").find('.results__options').html(result);
            // $(".select_loaisanpham").html(result);
            // click_thuonghieusanpham(com,id);
            click_danhmucsp(com,id);
            click_danhmucsp_mobile(com,id);
            click_thuonghieusanpham_mobile(com, id);
            click_thuonghieusanpham(com, id);
          }
        },
      });
    });
  }

  if ($("#ul_select_thuonghieusanpham").exists()) {
    $("#ul_select_thuonghieusanpham li").click(function () {
      $("#ul_select_thuonghieusanpham li").removeClass('active');
      $(this).addClass('active');

      $("#ul_select_thuonghieusanpham li").removeClass('active');
      var ht_ml = $(this).html();
      $('.select_thuonghieusanpham').find('.option_select').find('span').html(ht_ml);
      // $('#ul_select_thuonghieusanpham').find('.option_select').find('span').html(ht_ml);
      com = "thuonghieusanpham";
      id = $(this).data('id');
      loaisanpham = $("#ul_select_loaisanpham").html();
      id_loaisanpham = $("#ul_select_loaisanpham").find('.double_click_ndm_mobile.active').data('id');
      console.log(id_loaisanpham);
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id,id_loaisanpham:id_loaisanpham },
        success: function (result) {
          if (result != "") {
            // $("#ul_select_loaisanpham").find('.results__options').html(result);
            $("#ul_select_loaisanpham").html(result);
            click_danhmucsp(com,id);
            click_danhmucsp_mobile(com,id);
            click_thuonghieusanpham_mobile(com, id);
            click_thuonghieusanpham(com, id);
          }
        },
      });
      // var idlist = $(this).data('idlist');
      // var mang_idlist = idlist.split(',');
      // console.log(mang_idlist);

      // var id_danhmuc = '';
      // $('.double_click_ndm_mobile').removeClass('in_array');
      // $('.double_click_ndm_mobile').each((index, el) => {
      //   id_danhmuc = $(el).data('id'); 
      //   id_danhmuc = ''+ id_danhmuc + '';
      //   // console.log(mang_idlist.indexOf(id_danhmuc));
      //   if(mang_idlist.indexOf(id_danhmuc) !== -1){
          
      //     console.log($(el));
      //     $(el).addClass('in_array');
      //   }
      // })
    });
  }

  if ($(".select_donhang").exists()) {
    $(".select_donhang").change(function () {
      trangthai = $(".select_donhang").val();
      keyword = $("#keyword_donhang").val();
      date_dathang = $(".date_dathang").val();
      id_user = $(".id_user").val();
      action = $(".action").val();
      $.ajax({
        url: "ajax/ajax_searchdonhang.php",
        type: "POST",
        dataType: "html",
        data: {
          trangthai: trangthai,
          keyword: keyword,
          date_dathang: date_dathang,
          id_user: id_user,
          action:action
        },
        success: function (result) {
          if (result != "") {
            $(".all_table_donhang").html(result);
          }
        },
      });
    });
  }

  if ($(".quantity-pro-detail button").exists()) {
    $(".quantity-pro-detail button").click(function () {
      var soluongkho = $(this).data("soluongkho");
      var $button = $(this);
      var oldValue = $button.parent().find("input").val();
      if ($button.text() == "+") {
        if (oldValue >= soluongkho) {
          var newVal = parseFloat(oldValue);
          $button.disabled = true;
        } else {
          var newVal = parseFloat(oldValue) + 1;
        }
      } else {
        if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
        else var newVal = 1;
      }
      $button.parent().find("input").val(newVal);
    });
  }

  $(document).on("change", ".orderby", function () {
    var orderby = $(".orderby").val();
    var p = $(".input_number_show").val();

    var listpr = $("input[name=id_list]").val();
    var catpro = $("input[name=id_cat]").val();
    var brandpro = $("input[name=id_brand]").val();
    var dodaypro = $("input[name=id_doday]").val();
    var dodaylistpro = $("input[name=id_doday_list]").val();

    var idbrand_list = "";
    var check_brand = $(".check_brand.active");
    check_brand.each(function () {
      idbrand_list = idbrand_list + "|" + $(this).data("idbrand");
    });
    if ((idbrand_list.length = 1)) {
      idbrand_list = idbrand_list.substring(1);
    }

    var idlist_list = "";
    var check_list = $(".check_idlist.active");
    check_list.each(function () {
      idlist_list = idlist_list + "|" + $(this).data("idlist");
    });
    if ((idlist_list.length = 1)) {
      idlist_list = idlist_list.substring(1);
    }

    var vehicles_list = "";
    var check_list = $(".check_vehicles.active");
    check_list.each(function () {
      vehicles_list = vehicles_list + "|" + $(this).data("idvehicles");
    });
    if ((vehicles_list.length = 1)) {
      vehicles_list = vehicles_list.substring(1);
    }
    
    $.ajax({
      url: "ajax/ajax_searchpro.php",
      type: "POST",
      dataType: "html",
      data: {
        listpr: listpr,
        catpro: catpro,
        brandpro: brandpro,
        dodaypro: dodaypro,
        dodaylistpro:dodaylistpro,
        orderby: orderby,
        p: p,
        idbrand_list: idbrand_list,
        idlist_list: idlist_list,
        vehicles_list: vehicles_list,
      },
      success: function (result) {
        if (result != "") {
          $(".all_sp_search").html(result);
        }
      },
    });
    $.ajax({
      url: "ajax/ajax_show_pro.php",
      type: "POST",
      dataType: "html",
      data: {
        listpr: listpr,
        catpro: catpro,
        brandpro: brandpro,
        dodaypro: dodaypro,
        dodaylistpro:dodaylistpro,
        orderby: orderby,
        p: p,
        idbrand_list: idbrand_list,
        idlist_list: idlist_list,
        vehicles_list: vehicles_list,
      },
      success: function (result) {
        if (result != "") {
          $(".show_pro").html(result);
        }
      },
    });
  });
  $(document).on("change", ".input_number_show", function () {
    var orderby = $(".orderby").val();
    var p = $(".input_number_show").val();

    var listpr = $("input[name=id_list]").val();
    var catpro = $("input[name=id_cat]").val();
    var brandpro = $("input[name=id_brand]").val();
    var dodaypro = $("input[name=id_doday]").val();
    var dodaylistpro = $("input[name=id_doday_list]").val();

    var idbrand_list = "";
    var check_brand = $(".check_brand.active");
    check_brand.each(function () {
      idbrand_list = idbrand_list + "|" + $(this).data("idbrand");
    });
    if ((idbrand_list.length = 1)) {
      idbrand_list = idbrand_list.substring(1);
    }

    var idlist_list = "";
    var check_list = $(".check_idlist.active");
    check_list.each(function () {
      idlist_list = idlist_list + "|" + $(this).data("idlist");
    });
    if ((idlist_list.length = 1)) {
      idlist_list = idlist_list.substring(1);
    }

    var vehicles_list = "";
    var check_list = $(".check_vehicles.active");
    check_list.each(function () {
      vehicles_list = vehicles_list + "|" + $(this).data("idvehicles");
    });
    if ((vehicles_list.length = 1)) {
      vehicles_list = vehicles_list.substring(1);
    }

    $.ajax({
      url: "ajax/ajax_searchpro.php",
      type: "POST",
      dataType: "html",
      data: {
        listpr: listpr,
        catpro: catpro,
        brandpro: brandpro,
        dodaypro: dodaypro,
        dodaylistpro:dodaylistpro,
        orderby: orderby,
        p: p,
        idbrand_list: idbrand_list,
        idlist_list: idlist_list,
        vehicles_list: vehicles_list,
      },
      success: function (result) {
        if (result != "") {
          $(".all_sp_search").html(result);
        }
      },
    });
    $.ajax({
      url: "ajax/ajax_show_pro.php",
      type: "POST",
      dataType: "html",
      data: {
        listpr: listpr,
        catpro: catpro,
        brandpro: brandpro,
        dodaypro: dodaypro,
        dodaylistpro:dodaylistpro,
        orderby: orderby,
        p: p,
        idbrand_list: idbrand_list,
        idlist_list: idlist_list,
        vehicles_list: vehicles_list,
      },
      success: function (result) {
        if (result != "") {
          $(".show_pro").html(result);
        }
      },
    });
  });
  $(document).on("click", ".check_brand,.check_idlist,.check_vehicles,.icon_check_brand", function () {
    var url = window.location.href;
    var urlObject = new URL(url);
    // console.log(urlObject);

    var orderby = $(".orderby").val();
    var p = $(".input_number_show").val();

    var listpr = $("input[name=id_list]").val();
    var catpro = $("input[name=id_cat]").val();
    var brandpro = $("input[name=id_brand]").val();
    var dodaypro = $("input[name=id_doday]").val();
    var dodaylistpro = $("input[name=id_doday_list]").val();

    // console.log("a");
    var idbrand_list = "";var idbrand_list_url="";
    var check_brand = $(".check_brand.active");
    console.log(check_brand);
    check_brand.each(function () {
      idbrand_list = idbrand_list + "|" + $(this).data("idbrand");
      idbrand_list_url = idbrand_list_url + "-" + $(this).data("idbrand");
    });
    if ((idbrand_list.length = 1)) {
      idbrand_list = idbrand_list.substring(1);
      idbrand_list_url = idbrand_list_url.substring(1);
    }
    

    var idlist_list = "";var idlist_list_url = "";
    var check_list = $(".check_idlist.active");
    check_list.each(function () {
      idlist_list = idlist_list + "|" + $(this).data("idlist");
      idlist_list_url = idlist_list_url + "-" + $(this).data("idlist");
    });
    if ((idlist_list.length = 1)) {
      idlist_list = idlist_list.substring(1);
      idlist_list_url = idlist_list_url.substring(1);
    }

    var vehicles_list = "";var vehicles_list_url = "";
    var check_vehicles = $(".check_vehicles.active");
    check_vehicles.each(function () {
      vehicles_list = vehicles_list + "|" + $(this).data("idvehicles");
      vehicles_list_url = vehicles_list_url + "-" + $(this).data("idvehicles");
    });
    if ((vehicles_list.length = 1)) {
      vehicles_list = vehicles_list.substring(1);
      vehicles_list_url = vehicles_list_url.substring(1);
    }
    // console.log(idbrand_list);
    
    if($(this).hasClass('check_brand_dm') == true){
      locthuonghiesanpham(idbrand_list,idlist_list,brandpro);
    }
    if($(this).hasClass('check_idlist_dm') == true){
      locbrandsanpham(idlist_list,idbrand_list,listpr);
    }
    // console.log("aaa");
    // console.log(listpr);

    console.log(idlist_list_url);
    
    if (listpr) {
      urlObject.searchParams.set("id_list", listpr);
    }
    else{
      urlObject.searchParams.delete("id_list");
    }
    if (idlist_list_url) {
      urlObject.searchParams.set("id_list", idlist_list_url);
    }
    else{
      urlObject.searchParams.delete("id_list");
    }
    if (catpro) {
      urlObject.searchParams.set("id_cat", catpro);
    }
    else{
      urlObject.searchParams.delete("id_cat");
    }
    if (brandpro) {
      urlObject.searchParams.set("id_brand", brandpro);
    }
    else{
      urlObject.searchParams.delete("id_id_brandcat");
    }
    if (idbrand_list_url) {
      urlObject.searchParams.set("id_brand", idbrand_list_url);
    }
    else{
      urlObject.searchParams.delete("id_brand");
    }
    if (dodaypro) {
      urlObject.searchParams.set("id_doday", dodaypro);
    }
    else{
      urlObject.searchParams.delete("id_doday");
    }
    if (vehicles_list_url) {
      urlObject.searchParams.set("id_doday", vehicles_list_url);
    }
    else{
      urlObject.searchParams.delete("id_doday");
    }
    if (dodaylistpro) {
      urlObject.searchParams.set("id_doday_list", dodaylistpro);
    }
    else{
      urlObject.searchParams.delete("id_doday_list");
    }

    var updatedURL = urlObject.toString();
    //  console.log(updatedURL);
    // location.href = updatedURL;
    // loadPage(document.location);
    
    $.ajax({
      url: "ajax/ajax_searchpro.php",
      type: "POST",
      dataType: "html",
      data: {
        listpr: listpr,
        catpro: catpro,
        brandpro: brandpro,
        dodaypro: dodaypro,
        dodaylistpro:dodaylistpro,
        orderby: orderby,
        p: p,
        idbrand_list: idbrand_list,
        idlist_list: idlist_list,
        vehicles_list: vehicles_list,
      },
      success: function (result) {
        if (result != "") {
          $(".all_sp_search").html(result);
          history.pushState({ path: updatedURL }, '', updatedURL); 
        }
      },
    });
    $.ajax({
      url: "ajax/ajax_show_pro.php",
      type: "POST",
      dataType: "html",
      data: {
        listpr: listpr,
        catpro: catpro,
        brandpro: brandpro,
        dodaypro: dodaypro,
        dodaylistpro:dodaylistpro,
        orderby: orderby,
        p: p,
        idbrand_list: idbrand_list,
        idlist_list: idlist_list,
        vehicles_list: vehicles_list,
      },
      success: function (result) {
        if (result != "") {
          $(".show_pro").html(result);
        }
      },
    });

  });
};

/* Ready */
$(document).ready(function () {
  NN_FRAMEWORK.loadmap();
  NN_FRAMEWORK.Tools();
  NN_FRAMEWORK.Popup();
  NN_FRAMEWORK.WowAnimation();
  NN_FRAMEWORK.AltImages();
  NN_FRAMEWORK.BackToTop();
  NN_FRAMEWORK.FixMenu();
  NN_FRAMEWORK.OwlPage();
  NN_FRAMEWORK.OwlProDetail();
  NN_FRAMEWORK.Toc();
  NN_FRAMEWORK.Cart();
  NN_FRAMEWORK.SimplyScroll();
  NN_FRAMEWORK.Tabs();
  NN_FRAMEWORK.Videos();
  NN_FRAMEWORK.Search();
});
