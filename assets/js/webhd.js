// document.addEventListener('contextmenu', event => event.preventDefault());
function nocontext(e) {
  var clickedTag = e == null ? event.srcElement.tagName : e.target.tagName;
  if (clickedTag == "IMG") return false;
}

var myLazyLoad = new LazyLoad({
  elements_selector: ".lazy",
});

document.oncontextmenu = nocontext;
$(document).ready(function () {
  $(".bestitems-list").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    speed: 6000,
    cssEase: "linear",
    autoplaySpeed: 0,
    pauseOnFocus: false,
    pauseOnHover: true,
    infinite: false,

    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
});

$(document).ready(function () {
  jQuery(document).ready(function () {
    jQuery(".catagory-title").on("click", function () {
      if ($(".catagory-list__fix").css("display") == "none") {
        $(".catagory-list__fix").animate(
          {
            height: "show",
          },
          400
        );
      } else {
        $(".catagory-list__fix").animate(
          {
            height: "hide",
          },
          200
        );
      }
    });
    jQuery(".catagory-list__fix li span").on("click", function () {
      let id = $(this).attr("data-id");
      if ($("#cat2__fix_" + id).css("display") == "none") {
        $("#cat2__fix_" + id).animate(
          {
            height: "show",
          },
          400
        );
      } else {
        $("#cat2__fix_" + id).animate(
          {
            height: "hide",
          },
          200
        );
      }
    });
    jQuery(".catagory-list li span").on("click", function () {
      let id = $(this).attr("data-id");
      if ($("#cat2_" + id).css("display") == "none") {
        $("#cat2_" + id).animate(
          {
            height: "show",
          },
          400
        );
      } else {
        $("#cat2_" + id).animate(
          {
            height: "hide",
          },
          200
        );
      }
    });
  });
});
$(document).ready(function () {
  $(".support-content").hide();

  $("a.btn-support").click(function (e) {
    e.stopPropagation();
    $(".support-content").slideToggle();
  });
  $(".support-content").click(function (e) {
    e.stopPropagation();
  });
  $(document).click(function () {
    $(".support-content").slideUp();
  });

  $(".tailvideo_item_owl").click(function () {
    let id = $(this).attr("data-src");
    let img = $(this).attr("data-image");
    let name = $(this).attr("data-name");
    $(".pic-video").attr("data-src", id);
    $(".pic-video img").attr("src", img);
    $(".name-video").html(name);
  });
});

$(document).on("click", ".menu_mobi .menulicha", function (event) {
  $(".close_menu").trigger("click");
  return false;
});

var menu_mobi = $(".menu_cap_cha").html();
$(".menu_mobi_add").append(
  '<span class="close_menu"><i class="fas fa-times"></i></span><ul>' +
    menu_mobi +
    "</ul>"
);

$(".menu_mobi_add ul li ul").removeClass("menu_cap_con");
$(".menu_mobi_add>ul>li>ul").css({
  display: "none",
});
// $(".menu_mobi_add ul li ul li ul").removeClass("menu_cap_2");
// $(".menu_mobi_add ul li ul li ul").css({
//   display: "none",
// });
// $(".menu_mobi_add ul li ul li ul li ul").removeClass("menu_cap_3");
// $(".menu_mobi_add ul li ul li ul li ul").css({
//   display: "none",
// });

$(".menu_mobi_add>ul>li").each(function (index, element) {
  if ($(this).children("ul").children("li").length > 0) {
    $(this).children("a").append('<i class="fas fa-chevron-right"></i>');
    $(this).children(".menu_span").append('<i class="fas fa-chevron-right"></i>');
  }
});
$(".menu_mobi_add ul li a i").click(function () {
  if ($(this).parent("a").hasClass("active2")) {
    $(this).parent("a").removeClass("active2");
    if (
      $(this).parent("a").parent("li").children("ul").children("li").length > 0
    ) {
      $(this).parent("a").parent("li").children("ul").css({
        display: "none",
      });
      //$(this).parent('a').parent('li').children('ul').hide(300);
      return false;
    }
  } else {
    $(this).parent("a").addClass("active2");
    if ($(this).parents("li").children("ul").children("li").length > 0) {
      //$(".menu_m ul li ul").hide(0);
      //$(this).parents('li').children('ul').show(300);
      $(".menu_m ul li ul").css({
        display: "none",
      });
      $(this).parents("li").children("ul").css({
        display: "block",
      });
      return false;
    }
  }
});

$(".menu_mobi_add ul li .menu_span i").click(function () {
  if ($(this).parent(".menu_span").hasClass("active2")) {
    $(this).parent(".menu_span").removeClass("active2");
    if (
      $(this).parent(".menu_span").parent("li").children("ul").children("li").length > 0
    ) {
      $(this).parent(".menu_span").parent("li").children("ul").css({
        display: "none",
      });
      //$(this).parent('a').parent('li').children('ul').hide(300);
      return false;
    }
  } else {
    $(this).parent(".menu_span").addClass("active2");
    if ($(this).parents("li").children("ul").children("li").length > 0) {
      //$(".menu_m ul li ul").hide(0);
      //$(this).parents('li').children('ul').show(300);
      $(".menu_m ul li ul").css({
        display: "none",
      });
      $(this).parents("li").children("ul").css({
        display: "block",
      });
      return false;
    }
  }
});

$(".icon_menu_mobi,.close_menu,.menu_baophu").click(function () {
  if ($(".menu_mobi_add").hasClass("menu_mobi_active")) {
    $(".menu_mobi_add").removeClass("menu_mobi_active");
    $(".menu_baophu").fadeOut(300);
  } else {
    $(".menu_mobi_add").addClass("menu_mobi_active");
    $(".menu_baophu").fadeIn(300);
  }
  return false;
});

$(".thanhtoan").click(function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).find(".small_tt").fadeOut(300);
  } else {
    $(this).addClass("active");
    $(this).find(".small_tt").fadeIn(300);
  }
  return false;
});

$(".base-checkbox").click(function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
  } else {
    $(this).addClass("active");
  }
  return false;
});

const passField = document.querySelector(".input_mk");
$(".show_matkhau").click(function () {
  if (passField.type === "password") {
    passField.type = "text";
    $(".icon_mk").html('<i class="fa-solid fa-check"></i>');
  } else {
    passField.type = "password";
    $(".icon_mk").html('<i class="fa-solid fa-square"></i>');
  }
});

$(".all_thongtin_giohang").hover(
  function () {
    $(this).find(".thongtin_giohang").css({
      display: "block",
    });
  },
  function () {
    $(this).find(".thongtin_giohang").css({
      display: "none",
    });
  }
);

$("input.testinput").on("keyup", function () {
  var max = parseInt(this.max);
  if (parseInt(this.value) > max) {
    this.value = max;
  }
});

$(document).ready(function () {
  $(".descriptionheader")
    .find(".nav-pills li:first-child a")
    .addClass("active");
  $(".product_detail")
    .find("#pills-tabContent .content-tabs-pro-detail:first-child")
    .addClass("show active");
});

$(document).ready(function () {
  $(".more_faq").readmore({
    speed: 300,
    collapsedHeight: 180,
    moreLink: '<a href="#" class="readmore">Read more </a>',
    lessLink: '<a href="#" class="readmore">Read less</a>',
    heightMargin: 20,
  });
  // $('.readmore-link').click(function() {
  //   var content = $(this).siblings('.content');
  //   if (content.hasClass('expanded')) {
  //     content.removeClass('expanded');
  //     $(this).text('Read more');
  //   } else {
  //     content.addClass('expanded');
  //     $(this).text('Read less');
  //   }
  // });
});

$(document).ready(function () {
  $(".menu_ngang").mouseover(function () {
    $(".option_select").parent(".select_tong").find(".results__options").css({
      display: "none",
    });
    $(".option_select")
      .parent(".select_tong")
      .find(".results__options")
      .removeClass("active");
  });
});

$(document).ready(function () {
  $(window).scroll(function () {
    $(".option_select").parent(".select_tong").find(".results__options").css({
      display: "none",
    });
    $(".option_select")
      .parent(".select_tong")
      .find(".results__options")
      .removeClass("active");
  });
});

$(document).ready(function () {
  $(".double_click").dblclick(function () {
    var url = $(this).data("duongdan");
    // $(location).attr('href', url);
    var ht_ml = $(this).html();
    $(this)
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    // console.log($(this).html());
  });
});
$(document).ready(function () {
  $(".double_click").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(this).addClass("active");
    }
    var ht_ml = $(this).html();
    $(this)
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    $(this)
      .parent("ul")
      .parent("li")
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    // console.log($(this).html());
  });
});
$(document).ready(function () {
  $(".double_click_ndm").dblclick(function () {
    var url = $(this).data("duongdan");
    // $(location).attr('href', url);
    var ht_ml = $(this).html();
    $(this)
      .parent("ul")
      .parent("li")
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    // console.log($(this).html());
  });
});
$(document).ready(function () {
  $(".double_click_ndm").click(function () {
    var ht_ml = $(this).html();
    $(this)
      .parent("ul")
      .parent("li")
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    // console.log($(this).html());
  });
});
$(document).ready(function () {
  $(".double_click_ndm_mobile").dblclick(function () {
    var url = $(this).data("duongdan");
    // $(location).attr('href', url);
    var ht_ml = $(this).html();
    $(".select_loaisanpham").find(".option_select").find("span").html(ht_ml);
    // console.log($(this).html());
  });
});
$(document).ready(function () {
  $(".double_click_ndm_mobile").click(function () {
    var ht_ml = $(this).html();
    $(".select_loaisanpham").find(".option_select").find("span").html(ht_ml);
    // console.log($(this).html());
  });
});

$(document).ready(function () {
  $(".option_select").click(function () {
    if (
      $(this)
        .parent(".select_tong")
        .find(".results__options")
        .hasClass("active")
    ) {
      $(this)
        .parent(".select_tong")
        .find(".results__options")
        .removeClass("active");

      $(this).parent(".select_tong").find(".results__options").css({
        display: "none",
      });
    } else {
      $(".option_select").parent(".select_tong").find(".results__options").css({
        display: "none",
      });

      $(".option_select")
        .parent(".select_tong")
        .find(".results__options")
        .removeClass("active");
      if ($(this).parent(".select_tong").hasClass("select_loaisanpham")) {
        $("#ul_select_loaisanpham").css({
          display: "grid",
        });
      }

      $(this)
        .parent(".select_tong")
        .find(".results__options")
        .addClass("active");
      $(this).parent(".select_tong").find(".results__options").css({
        display: "grid",
      });
    }
  });

  $(".double_click_ndm,.double_click").click(function () {
    $(".results__options").removeClass("active");
    $(".results__options").css({
      display: "none",
    });
    // console.log("aaaa");
  });
});
$(document).ready(function () {
  $(".select_mobile").click(function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      if ($(this).hasClass("select_loaisanpham")) {
        $("#ul_select_loaisanpham").css({
          display: "none",
        });
        $("#loc_loaisp_sp").modal("hide");
      }
      if ($(this).hasClass("select_thuonghieusanpham")) {
        $("#ul_select_thuonghieusanpham").css({
          display: "none",
        });
        $("#loc_thuonghieu_sp").modal("hide");
      }
      if ($(this).hasClass("select_thuonghieuxe")) {
        $("#ul_select_thuonghieuxe").css({
          display: "none",
        });
        $("#loc_thuonghieu_xe").modal("hide");
      }
      if ($(this).hasClass("select_tenxe")) {
        $("#ul_select_tenxe").css({
          display: "none",
        });
        $("#loc_tenxe").modal("hide");
      }
    } else {
      $(".results__options__danhmuc").css({
        display: "none",
      });
      $(".results__options_li").css({
        display: "none",
      });
      $(".select_mobile").removeClass("active");
      if ($(this).hasClass("select_loaisanpham")) {
        $("#ul_select_loaisanpham").css({
          display: "grid",
        });
        $("#loc_loaisp_sp").modal("show");
      }
      if ($(this).hasClass("select_thuonghieusanpham")) {
        $("#ul_select_thuonghieusanpham").css({
          display: "grid",
        });
        $("#loc_thuonghieu_sp").modal("show");
      }
      if ($(this).hasClass("select_thuonghieuxe")) {
        $("#ul_select_thuonghieuxe").css({
          display: "grid",
        });
        $("#loc_thuonghieu_xe").modal("show");
      }
      if ($(this).hasClass("select_tenxe")) {
        $("#ul_select_tenxe").css({
          display: "grid",
        });
        $("#loc_tenxe").modal("show");
      }
      $(this).addClass("active");
      $(this).css({
        display: "grid",
      });
    }
  });
});

// scroll

/**
 * @return {number}
 */
$(function () {
  const main = document.querySelector("#wrapper");
  const section1 = document.querySelector(".all_wrapper");
  const scrollEvent = () => {
    if (main.scrollTop > 50) {
      $(".all_wrapper").addClass("w-sticky");
    } else {
      $(".all_wrapper").removeClass("w-sticky");
    }
  };
  main.addEventListener("scroll", scrollEvent);
});

$(function () {
  const main = document.querySelector("#wrapper");
  const scrollToTop = document.querySelector(".scrollToTop");
  scrollToTop.addEventListener("click", () => {
    main.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

$(".scrollToBottom").click(function () {
  document.getElementById("background-footer").scrollIntoView({
    behavior: "smooth",
  });
});

$(".reset").on("click", function () {
  $(".select_tong option").prop("selected", function () {
    return this.defaultSelected;
  });
});

$(".title_brand").on("click", function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).find(".icon_danhmuc").html('<i class="fas fa-minus"></i>');
    $(this).parent(".all_brand_sp").find(".danhmuc_tong").fadeIn(300);
  } else {
    $(this).addClass("active");
    $(this).find(".icon_danhmuc").html('<i class="fas fa-plus"></i>');
    $(this).parent(".all_brand_sp").find(".danhmuc_tong").fadeOut(300);
  }
});

$(".check_vehicles").on("click", function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).children(".icon_check_brand").html('<i class="far fa-square"></i>');
  } else {
    $(this).addClass("active");
    $(this)
      .children(".icon_check_brand")
      .html('<i class="far fa-check-square"></i>');
  }
});

$(".hide_fillter").on("click", function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).find(".icon_danhmuc").html('<i class="fas fa-minus"></i>');
    $(this)
      .parent(".all_hide_fillter")
      .find(".all_fillter_danhmuc")
      .fadeIn(300);
  } else {
    $(this).addClass("active");
    $(this).find(".icon_danhmuc").html('<i class="fas fa-plus"></i>');
    $(this)
      .parent(".all_hide_fillter")
      .find(".all_fillter_danhmuc")
      .fadeOut(300);
  }
});
$(".hide_search_news .icon_danhmuc").on("click", function () {
  if ($(".hide_search_news").hasClass("active")) {
    $(".hide_search_news").removeClass("active");
    $(".hide_search_news")
      .find(".icon_danhmuc")
      .html('<i class="fas fa-minus"></i>');
    $(".hide_search_news")
      .parent(".all_hide_fillter")
      .find(".all_fillter_danhmuc")
      .fadeIn(300);
  } else {
    $(".hide_search_news").addClass("active");
    $(".hide_search_news")
      .find(".icon_danhmuc")
      .html('<i class="fas fa-plus"></i>');
    $(".hide_search_news")
      .parent(".all_hide_fillter")
      .find(".all_fillter_danhmuc")
      .fadeOut(300);
  }
});
$(".check_brand").on("click", function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).children(".icon_check_brand").html('<i class="far fa-square"></i>');
  } else {
    $(this).addClass("active");
    $(this)
      .children(".icon_check_brand")
      .html('<i class="far fa-check-square"></i>');
  }
});

$(".check_idlist").on("click", function () {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).children(".icon_check_brand").html('<i class="far fa-square"></i>');
  } else {
    $(this).addClass("active");
    $(this)
      .children(".icon_check_brand")
      .html('<i class="far fa-check-square"></i>');
  }
});

$(".all_thanhtoan_cart").on("click", function () {
  $("#popup-cart-thongbao").modal("show");
});

// autocomplete
$(document).ready(function () {
  $("#keyword2").keyup(function () {
    $.ajax({
      type: "POST",
      url: "ajax/readCountry.php",
      data: "keyword=" + $(this).val(),
      beforeSend: function () {
        $("#keyword2").css(
          "background",
          "#FFF url(LoaderIcon.gif) no-repeat 165px"
        );
      },
      success: function (data) {
        $(".suggesstion-box-menu").show();
        $(".suggesstion-box-menu").html(data);
        // $("#keyword2").css("background", "#FFF");
      },
    });
  });
});

$(document).ready(function () {
  $(".filter_news").keyup(function () {
    var keyword = $(this).val();
    var type = $("input[name=type]").val();
    var idlist = $("input[name=idlist]").val();
    $.ajax({
      type: "POST",
      url: "ajax/ajax_news.php",
      data: {
        keyword: keyword,
        type: type,
        idlist: idlist,
      },
      beforeSend: function () {
        // $("#keyword2").css("background",
        //     "#FFF url(LoaderIcon.gif) no-repeat 165px");
      },
      success: function (data) {
        $(".all_search_news").html(data);
      },
    });
  });
});

$(document).ready(function () {
  $("#password, #repassword").on("keyup", function (e) {
    if ($("#password").val() == "" && $("#repassword").val() == "") {
      $("#passwordStrength").removeClass().html("");
      return false;
    }

    if (
      $("#password").val() != "" &&
      $("#repassword").val() != "" &&
      $("#password").val() != $("#repassword").val()
    ) {
      $("#passwordStrength")
        .removeClass()
        .addClass("alert alert-error")
        .html("Passwords do not match!");

      return false;
    }
    // Must have capital letter, numbers and lowercase letters

    var strongRegex = new RegExp(
      "^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$",
      "g"
    );
    // Must have either capitals and lowercase letters or lowercase and numbers

    var mediumRegex = new RegExp(
      "^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$",
      "g"
    );
    // Must be at least 6 characters long

    var okRegex = new RegExp("(?=.{6,}).*", "g");
    if (okRegex.test($(this).val()) === false) {
      // If ok regex doesn't match the password

      $("#passwordStrength")
        .removeClass()
        .addClass(" alert-error")
        .html("weak (Password must be 6 characters long.)");
    } else if (strongRegex.test($(this).val())) {
      // If reg ex matches strong password

      $("#passwordStrength")
        .removeClass()
        .addClass(" alert-success")
        .html("very strong (Good Password!)");
    } else if (mediumRegex.test($(this).val())) {
      // If medium password matches the reg ex

      $("#passwordStrength")
        .removeClass()
        .addClass(" alert-info")
        .html(
          "Medium (Make your password stronger with more capital letters, more numbers and special characters!)"
        );
    } else {
      // If password is ok

      $("#passwordStrength")
        .removeClass()
        .addClass(" alert-error")
        .html("Weak (Weak Password, try using numbers and capital letters.)");
    }
    return true;
  });
});

if (document.getElementById("date_tintuc") != null) {
  const date_tintuc = new easepick.create({
    element: document.getElementById("date_tintuc"),
    css: ["http://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css"],
    plugins: ["RangePlugin"],
    format: "DD/MM/YYYY",
    RangePlugin: {
      tooltipNumber(num) {
        return num - 1;
      },
      locale: {
        one: "night",
        other: "nights",
      },
    },
    setup(date_tintuc) {
      date_tintuc.on("select", (e) => {
        var orderby = $(".orderby_news").val();
        idlist = $(".idlist").val();
        type = $(".type").val();
        id_brand = $(".brand_news.active").data("idbrand");
        date_tintuc = $(".date_tintuc").val();

        $.ajax({
          type: "POST",
          url: "ajax/ajax_getsearchnews.php",
          data: {
            orderby: orderby,
            idlist: idlist,
            date_tintuc: date_tintuc,
            id_brand: id_brand,
            type: type,
          },
          success: function (result) {
            $(".all_search_news").html(result);
          },
        });
      });
    },
  });
}

if (document.getElementById("date_dathang") != null) {
  const picker = new easepick.create({
    element: document.getElementById("date_dathang"),
    css: ["http://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css"],
    plugins: ["RangePlugin"],
    format: "DD/MM/YYYY",
    RangePlugin: {
      tooltipNumber(num) {
        return num - 1;
      },
      locale: {
        one: "night",
        other: "nights",
      },
    },
    setup(picker) {
      picker.on("select", (e) => {
        trangthai = $(".select_donhang").val();
        keyword = $("#keyword_donhang").val();
        date_dathang = $(".date_dathang").val();
        id_user = $(".id_user").val();

        $.ajax({
          type: "POST",
          url: "ajax/ajax_searchdonhang.php",
          data: {
            keyword: keyword,
            trangthai: trangthai,
            date_dathang: date_dathang,
            id_user: id_user,
          },
          success: function (result) {
            $(".all_table_donhang").html(result);
          },
        });
      });
    },
  });
}

$(document).ready(function () {
  $(".name_chinhsach_des").click(function () {
    if ($(this).parent(".all_chinhsach_des").hasClass("active")) {
      $(this).parent(".all_chinhsach_des").removeClass("active");
      $(this)
        .parent(".all_chinhsach_des")
        .children(".name_chinhsach_des")
        .children(".all_name_cs")
        .children(".icon_fl_cs_des")
        .fadeOut(300);
      $(this)
        .parent(".all_chinhsach_des")
        .children(".name_chinhsach_des")
        .children(".icon_chinhsach_des")
        .html('<i class="fas fa-angle-down"></i>');
      $(this)
        .parent(".all_chinhsach_des")
        .children(".noidung_chinhsach")
        .fadeOut(200);
    } else {
      $(this).parent(".all_chinhsach_des").addClass("active");
      $(this)
        .parent(".all_chinhsach_des")
        .children(".name_chinhsach_des")
        .children(".all_name_cs")
        .children(".icon_fl_cs_des")
        .fadeIn(300);
      $(this)
        .parent(".all_chinhsach_des")
        .children(".name_chinhsach_des")
        .children(".icon_chinhsach_des")
        .html('<i class="fas fa-angle-up"></i>');
      $(this)
        .parent(".all_chinhsach_des")
        .children(".noidung_chinhsach")
        .fadeIn(200);
    }
    return false;
  });
});
$(document).ready(function () {
  $(".all_option_des_ulli").find("ul").children("li:first-child").children("button").addClass("active show");
  $(".all_option_des_ulli").find(".tab-content").children(".tab-pane:first-child").addClass("show active");
});
