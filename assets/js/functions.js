function modalNotify(text) {
  $("#popup-notify").find(".modal-body").html(text);
  $("#popup-notify").modal("show");
}

function ValidationFormSelf(ele = "") {
  if (ele) {
    $("." + ele)
      .find("input[type=submit]")
      .removeAttr("disabled");
    var forms = document.getElementsByClassName(ele);
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        },
        false
      );
    });
  }
}

const getParameters = (url) =>
  `${url}?`
    .split("?")[1]
    .split("&")
    .reduce(
      (params, pair) =>
        ((key, val) => (key ? { ...params, [key]: val } : params))(
          ...`${pair}=`.split("=").map(decodeURIComponent)
        ),
      {}
    );

function loadPagingAjax(url = "", eShow = "", id = "", id_post = 0) {
  if ($(eShow).length && url) {
    let tmp_id = id;
    let tmp_id_post = id_post;

    let tmp_url = getParameters(url);
    console.log(tmp_url);
    if (tmp_url["id"]) {
      tmp_id = tmp_url["id"];
    }
    if (tmp_url["id_post"]) {
      tmp_id_post = tmp_url["id_post"];
    }

    $.ajax({
      url: url,
      type: "GET",
      data: {
        eShow: eShow,
        id: tmp_id,
        id_post: tmp_id_post,
      },
      success: function (result) {
        $(eShow).html(result);
        /*if(id!=''){
                    $('html, body').animate({
                        scrollTop: $(id+id_post).offset().top
                    }, 1000);
                }*/
      },
    });
  }
}

function doEnter_donhang(event, obj) {
  if (event.keyCode == 13 || event.which == 13) onSearch_donhang(obj);
}

function onSearch_donhang(obj) {
  var keyword = $("#" + obj).val();
  if (keyword == "") {
    modalNotify(LANG["no_keywords"]);
    return false;
  } else {
    trangthai = $(".select_donhang").val();
    date_dathang = $(".date_dathang").val();
    id_user = $(".id_user").val();
    action = $(".action").val();
    $.ajax({
      type: "POST",
      url: "ajax/ajax_searchdonhang.php",
      data: {
        keyword: keyword,
        trangthai: trangthai,
        date_dathang: date_dathang,
        id_user: id_user,
        action: action,
      },
      success: function (result) {
        $(".all_table_donhang").html(result);
      },
    });
  }
}

function doEnter(event, obj) {
  if (event.keyCode == 13 || event.which == 13) onSearch(obj);
}

function onSearch(obj) {
  var keyword = $("#" + obj).val();

  if (keyword == "") {
    modalNotify(LANG["no_keywords"]);
    return false;
  } else {
    location.href = "tim-kiem?keyword=" + encodeURI(keyword);
    loadPage(document.location);
  }
}
function onSearchsp() {
  // console.log("aaaa");
  var id_doday = "";
  var id_size = "";
  var id_list = "";
  var id_brand = "";
  console.log($(".select_loaisanpham").find(".double_click_ndm.active"));
  if (
    $(".select_thuonghieuxe").find(".double_click.active").data("id") !=
    undefined
  ) {
    id_doday = $(".select_thuonghieuxe")
      .find(".double_click.active")
      .data("id");
  } else {
    id_doday = $("#ul_select_thuonghieuxe")
      .find(".double_click.active")
      .data("id");
  }
  if ($(".select_tenxe").find(".double_click.active").data("id") == undefined) {
    id_size = $("#ul_select_tenxe").find(".double_click.active").data("id");
  } else {
    console.log("bbb");
    id_size = $(".select_tenxe").find(".double_click.active").data("id");
  }
  if (
    $(".select_loaisanpham").find(".double_click_ndm.active").data("id") !=
    undefined
  ) {
    id_list = $(".select_loaisanpham")
      .find(".double_click_ndm.active")
      .data("id");
  } else {
    id_list = $("#ul_select_loaisanpham")
      .find(".double_click_ndm_mobile.active")
      .data("id");
  }
  if (
    $(".select_thuonghieusanpham").find(".double_click.active").data("id") !=
    undefined
  ) {
    id_brand = $(".select_thuonghieusanpham")
      .find(".double_click.active")
      .data("id");
  } else {
    id_brand = $("#ul_select_thuonghieusanpham")
      .find(".double_click.active")
      .data("id");
  }

  // var url = "https://bbracing.vn/tim-kiem-sp";
  var url = "http://bbracing.local/tim-kiem-sp";
  // var url = "https://trang.hdweb24h.com/bbracing/tim-kiem-sp";
  var urlObject = new URL(url);

  // console.log($(".select_tenxe").find('.double_click.active').data('id'));
  // var searchParams = new URLSearchParams(url.search);
  // console.log(id_doday);
  // console.log(id_size);
  // console.log(id_list);
  // console.log(id_brand);

  var kiemtra =
    id_doday == undefined &&
    id_size == undefined &&
    id_list == undefined &&
    id_brand == undefined;
  // console.log(kiemtra);
  if (kiemtra == true) {
    modalNotify(LANG["no_select"]);
    return false;
  } else {
    if (id_doday != undefined) {
      urlObject.searchParams.set("id_doday", id_doday);
    }
    if (id_size != undefined) {
      urlObject.searchParams.set("id_size", id_size);
    }
    if (id_list != undefined) {
      urlObject.searchParams.set("id_list", id_list);
    }
    if (id_brand != undefined) {
      urlObject.searchParams.set("id_brand", id_brand);
    }

    var updatedURL = urlObject.toString();
    //  console.log(urlObject);
    location.href = updatedURL;
    loadPage(document.location);
  }
}

function goToByScroll(id) {
  var offsetMenu = 0;
  id = id.replace("#", "");
  if ($(".menu").length) offsetMenu = $(".menu").height();
  $("html,body").animate(
    {
      scrollTop: $("#" + id).offset().top - offsetMenu * 2,
    },
    "slow"
  );
}

function update_cart(id = 0, code = "", quantity = 1, lang = "", tigia = 0) {
  if (id) {
    var ship = $(".price-ship").val();
    // console.log(lang);
    $.ajax({
      type: "POST",
      url: "ajax/ajax_cart.php",
      dataType: "json",
      data: {
        cmd: "update-cart",
        id: id,
        code: code,
        quantity: quantity,
        ship: ship,
        lang: lang,
        tigia: tigia,
      },
      success: function (result) {
        if (result) {
          $(".load-price-" + code).html(result.gia);
          $(".load-price-new-" + code).html(result.giamoi);
          $(".price-temp").val(result.temp);
          $(".load-price-temp").html(result.tempText);
          $(".price-total").val(result.total);
          $(".load-price-total").html(result.totalText);
          $(".load-weight-total").html(result.weighttotalText);
          $(".load-size-total").html(result.sizetotalText);
          $(".load-price-vat").html(result.vattotalText);
        }
      },
    });
  }
}

function load_district(id = 0) {
  $.ajax({
    type: "post",
    url: "ajax/ajax_district.php",
    data: { id_city: id },
    success: function (result) {
      $(".select-district").html(result);
      $(".select-wards").html(
        '<option value="">' + LANG["wards"] + "</option>"
      );
    },
  });
}

function load_wards(id = 0) {
  $.ajax({
    type: "post",
    url: "ajax/ajax_wards.php",
    data: { id_district: id },
    success: function (result) {
      $(".select-wards").html(result);
    },
  });
}

// function load_ship(id = 0) {
//   if (SHIP_CART) {
//     var ma = $(".discount_text").val();
//     // console.log(ma);
//     $.ajax({
//       type: "POST",
//       url: "ajax/ajax_cart.php",
//       dataType: "json",
//       data: { cmd: "ship-cart", id: id, ma: ma },
//       success: function (result) {
//         if (result) {
//           $(".load-price-ship").html(result.shipText);
//           $(".phiship").val(result.shipText);
//           $(".load-price-total").html(result.totalText);
//           $(".price-ship").val(result.ship);
//           $(".price-total").val(result.total);
//         }
//       },
//     });
//   }
// }

function load_discount(ma = "", lang = "", tigia = 0) {
  var id = $(".select-wards-cart").val();
  // console.log(id);
  $.ajax({
    type: "POST",
    url: "ajax/ajax_cart.php",
    dataType: "json",
    data: { cmd: "discount", ma: ma, lang: lang, tigia: tigia },
    success: function (result) {
      // console.log(result);
      // result = JSON.parse(result);
      //   if (result) {
      console.log(result);
      $(".load-price-discount").html(result.discountText);
      $(".load-price-vat").html(result.discountText);
      $(".load-price-total").html(result.totalText);
      $(".price-discount").val(result.discount);
      $(".price-total").val(result.total);
    },
    // },
  });
}

function click_danhmucsp() {
  $(".double_click_ndm").click(function () {
    // $(".select_thuonghieusanpham").find(".option_select").find("span").html("");

    $(".double_click_ndm").removeClass("active");
    $(this).addClass("active");

    var ht_ml = $(this).html();
    $(this)
      .parent("ul")
      .parent("li")
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    com = "loaisanpham";
    id = $(this).data("id");
    thuonghieusanpham = $(".select_thuonghieusanpham").html();
    id_loaisanpham = $(".select_thuonghieusanpham").find(".double_click.active").data("id");
    $.ajax({
      url: "ajax/ajax_getsearch.php",
      type: "POST",
      dataType: "html",
      data: { com: com, id: id, id_loaisanpham: id_loaisanpham },
      success: function (result) {
        if (result != "") {
          $("#ul_select_thuonghieusanpham")
            .find(".results__options")
            .html(result);
          $(".ul_select_thuonghieusanpham")
            .find(".results__options")
            .html(result);

          click_thuonghieusanpham(com, id);
          click_thuonghieusanpham_mobile(com, id);
        }
      },
    });
  });
}
function click_danhmucsp_mobile() {
  if ($(".double_click_ndm_mobile").exists()) {
    $(".double_click_ndm_mobile").click(function () {
      $(".select_thuonghieusanpham")
        .find(".option_select")
        .find("span")
        .html("");

      $(".double_click_ndm_mobile").removeClass("active");
      $(this).addClass("active");

      var ht_ml = $(this).html();
      $(".select_loaisanpham ").find(".option_select").find("span").html(ht_ml);
      com = "loaisanpham";
      id = $(this).data("id");
      // console.log(id);
      id_loaisanpham = $(".select_thuonghieusanpham").find(".double_click.active").data("id");
      thuonghieusanpham = $("#ul_select_thuonghieusanpham").html();
      $.ajax({
        url: "ajax/ajax_getsearch.php",
        type: "POST",
        dataType: "html",
        data: { com: com, id: id, id_loaisanpham: id_loaisanpham },
        success: function (result) {
          if (result != "") {
            $("#ul_select_thuonghieusanpham")
              .find(".results__options")
              .html(result);
            $("#ul_select_thuonghieusanpham").html(result);
            click_thuonghieusanpham(com, id);
            click_thuonghieusanpham_mobile(com, id);
          }
        },
      });
    });
  }
}

function click_thuonghieusanpham(com = "", id = 0) {
  $(".select_thuonghieusanpham li").click(function () {
    $(".select_thuonghieusanpham li").removeClass("active");
    $(this).addClass("active");

    var ht_ml = $(this).html();
    $(this)
      .parent(".results__options")
      .parent(".select_tong")
      .find(".option_select")
      .find("span")
      .html(ht_ml);
    com = "thuonghieusanpham";
    id = $(this).data("id");
    loaisanpham = $(".select_loaisanpham").html();
    id_loaisanpham = $(".select_loaisanpham").find(".double_click_ndm.active").data("id");
    if($(".select_loaisanpham").find(".double_click_ndm.active").data("id") != undefined){
      id_loaisanpham = $(".select_loaisanpham").find(".double_click_ndm.active").data("id");
    }else{
      id_loaisanpham = $("#ul_select_loaisanpham").find(".double_click_ndm_mobile.active").data("id");
    }
    console.log(id_loaisanpham);
    // console.log(id);
    $.ajax({
      url: "ajax/ajax_getsearch.php",
      type: "POST",
      dataType: "html",
      data: { com: com, id: id, id_loaisanpham: id_loaisanpham },
      success: function (result) {
        if (result != "") {
          $(".select_loaisanpham").find(".results__options").html(result);
          // $(".select_loaisanpham").html(result);
          click_thuonghieusanpham(com, id);
          click_danhmucsp(com, id);
        }
      },
    });
    // var idlist = $(this).data('idlist');
    // var mang_idlist = idlist.split(',');

    // var id_danhmuc = '';
    // $('.double_click_ndm').removeClass('in_array');
    // $('.double_click_ndm').each((index, el) => {
    //   id_danhmuc = $(el).data('id');
    //   id_danhmuc = ''+ id_danhmuc + '';
    //   if(mang_idlist.indexOf(id_danhmuc) !== -1){

    //     console.log($(el));
    //     $(el).addClass('in_array');
    //   }
    // })
  });
}
function click_thuonghieusanpham_mobile(com = "", id = 0) {
  $("#ul_select_thuonghieusanpham li").click(function () {
    $("#ul_select_thuonghieusanpham li").removeClass("active");
    $(this).addClass("active");

    var ht_ml = $(this).html();
    $(".select_thuonghieusanpham")
      .find(".option_select")
      .find("span")
      .html(ht_ml);

    com = "thuonghieusanpham";
    id = $(this).data("id");
    loaisanpham = $("#ul_select_loaisanpham").html();
    id_loaisanpham = $("#ul_select_loaisanpham").find(".double_click_ndm_mobile.active").data("id");

    console.log(id_loaisanpham);

    $.ajax({
      url: "ajax/ajax_getsearch.php",
      type: "POST",
      dataType: "html",
      data: { com: com, id: id, id_loaisanpham: id_loaisanpham },
      success: function (result) {
        if (result != "") {
          // $("#ul_select_loaisanpham").find('.results__options').html(result);
          $("#ul_select_loaisanpham").html(result);
          click_thuonghieusanpham_mobile(com, id);
        }
      },
    });
  });
}

function locthuonghiesanpham(idbrand_list = "", idlist_list = "", brandpro = "") {
  // log
  idbrand_list = idbrand_list;
  idlist_list = idlist_list;
  brandpro = brandpro;
  $.ajax({
    url: "ajax/ajax_getsearch_thuonghieu.php",
    type: "POST",
    dataType: "html",
    data: { idbrand_list: idbrand_list, idlist_list:idlist_list, brandpro: brandpro },
    success: function (result) {
      if (result != "") {
        $(".all_danhmuc_con_catalog").html(result);
        // click_locthuonghiesanpham();
      }
    },
  });
}

function locbrandsanpham(idlist_list = "",idbrand_list = "", listpr = "") {
  idbrand_list = idbrand_list;
  idlist_list = idlist_list;
  listpr = listpr;
  $.ajax({
    url: "ajax/ajax_getsearch_brand.php",
    type: "POST",
    dataType: "html",
    data: {idbrand_list: idbrand_list, idlist_list: idlist_list, listpr: listpr },
    success: function (result) {
      if (result != "") {
        $(".all_danhmuc_con_catalog").html(result);
        // click_locthuonghiesanpham();
      }
    },
  });
}

function click_locthuonghiesanpham() {
  $(".check_brand,.check_idlist,.check_vehicles").click(function () {
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

    if ($(this).hasClass("check_brand_dm") == true) {
      locthuonghiesanpham(idbrand_list, brandpro);
    }
    if ($(this).hasClass("check_idlist_dm") == true) {
      locbrandsanpham(idlist_list, listpr);
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
        dodaylistpro: dodaylistpro,
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
        dodaylistpro: dodaylistpro,
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
}
