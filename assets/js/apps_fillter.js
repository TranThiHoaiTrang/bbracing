/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");

/* Exists */
$.fn.exists = function () {
  return this.length;
};

NN_FRAMEWORK.Fillter = function () {
  if ($(".check_point_input").exists()) {
    $(".check_point_input").click(function () {

      // var check_sum = '';
      var checkpoint = '';
      var action = $(this).data("action");
      // check_sum = $(".check_sum").val();
      checkpoint = $(".check_point").val();

      
      // console.log(checkpoint);

      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_sim.php",
          type: "POST",
          dataType: "html",
          data: {
            checkpoint: checkpoint,
            // check_sum: check_sum,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_sim_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            checkpoint: checkpoint,
            // check_sum: check_sum,
          },
          success: function (result) {
            if (result != "") {
              $(".all_product_mobile").html(result);
            }
          },
        });
      }
    });
  }
  if ($(".check_nut_input").exists()) {
    $(".check_nut_input").click(function () {

      var check_sum = '';
      // var checkpoint = '';
      var action = $(this).data("action");
      check_sum = $(".check_sum").val();
      // checkpoint = $(".check_point").val();

      
      // console.log(checkpoint);

      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_sim.php",
          type: "POST",
          dataType: "html",
          data: {
            // checkpoint: checkpoint,
            check_sum: check_sum,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_sim_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            // checkpoint: checkpoint,
            check_sum: check_sum,
          },
          success: function (result) {
            if (result != "") {
              $(".all_product_mobile").html(result);
            }
          },
        });
      }
    });
  }

  if ($(".jbtn-submit_top").exists()) {
    $(".jbtn-submit_top").click(function () {
      var action = $(this).data("action");
      var check_sum = $(".check_sum_top").val();
      var checkpoint = $(".check_point_top").val();

      var id_loai_sim = "";
      var id_sim_tinh_nhan = "";
      var check_loai_sim = $(".check_loai_sim.active");
      if($(this).data("id_loai_sim") != 'sim_tinh_nhan'){
        check_loai_sim.each(function () {
          id_loai_sim = id_loai_sim + "|" + $(this).data("id_loai_sim") + ",";
        });
        if ((id_loai_sim.length = 1)) {
          id_loai_sim = id_loai_sim.substring(1);
        }
      }else{
        id_sim_tinh_nhan = $(".check_loai_sim.active").data("id_loai_sim");
      }

      var id_sim = "";
      var check_sim = $(".check_sim.active");
      check_sim.each(function () {
        id_sim = id_sim + "," + $(this).data("id_sim");
      });
      if ((id_sim.length = 1)) {
        id_sim = id_sim.substring(1);
      }

      var id_gia = "";
      var check_gia = $(".check_gia.active");
      check_gia.each(function () {
        id_gia = id_gia + "," + $(this).data("gia");
      });
      if ((id_gia.length = 1)) {
        id_gia = id_gia.substring(1);
      }

      var dauso = "";
      var check_dauso = $(".check_dauso.active");
      check_dauso.each(function () {
        dauso = dauso + "," + $(this).data("dauso");
      });
      if ((dauso.length = 1)) {
        dauso = dauso.substring(1);
      }

      var tranhso = "";
      var check_tranhso = $(".check_tranhso.active");
      check_tranhso.each(function () {
        tranhso = tranhso + "," + $(this).data("tranhso");
      });
      if ((tranhso.length = 1)) {
        tranhso = tranhso.substring(1);
      }
      console.log(checkpoint);

      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_sim.php",
          type: "POST",
          dataType: "html",
          data: {
            id_sim: id_sim,
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
            checkpoint: checkpoint,
            check_sum: check_sum,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_sim_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            id_sim: id_sim,
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
            checkpoint: checkpoint,
            check_sum: check_sum,
          },
          success: function (result) {
            if (result != "") {
              $(".all_product_mobile").html(result);
            }
          },
        });
      }
    });
  }

  // fillter_sim
  if ($(".jfilter-option").exists()) {
    $(".jfilter-option").click(function () {
      $(".check_order").removeClass("active");
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
      } else {
        $(this).addClass("active");
      }
      var action = $(this).data("action");
      // $(this).addClass('active');

      var orderby = $(".check_order.active").data("order");

      var id_loai_sim = "";
      var id_sim_tinh_nhan = "";
      var check_loai_sim = $(".check_loai_sim.active");
      if($(this).data("id_loai_sim") != 'sim_tinh_nhan'){
        check_loai_sim.each(function () {
          id_loai_sim = id_loai_sim + "|" + $(this).data("id_loai_sim") + ",";
        });
        if ((id_loai_sim.length = 1)) {
          id_loai_sim = id_loai_sim.substring(1);
        }
      }else{
        id_sim_tinh_nhan = $(".check_loai_sim.active").data("id_loai_sim");
      }
      

      var id_sim = "";
      var check_sim = $(".check_sim.active");
      check_sim.each(function () {
        id_sim = id_sim + "," + $(this).data("id_sim");
      });
      if ((id_sim.length = 1)) {
        id_sim = id_sim.substring(1);
      }

      var id_gia = "";
      var check_gia = $(".check_gia.active");
      check_gia.each(function () {
        id_gia = id_gia + "," + $(this).data("gia");
      });
      if ((id_gia.length = 1)) {
        id_gia = id_gia.substring(1);
      }

      var dauso = "";
      var check_dauso = $(".check_dauso.active");
      check_dauso.each(function () {
        dauso = dauso + "," + $(this).data("dauso");
      });
      if ((dauso.length = 1)) {
        dauso = dauso.substring(1);
      }

      var tranhso = "";
      var check_tranhso = $(".check_tranhso.active");
      check_tranhso.each(function () {
        tranhso = tranhso + "," + $(this).data("tranhso");
      });
      if ((tranhso.length = 1)) {
        tranhso = tranhso.substring(1);
      }
      // console.log(id_loai_sim);
      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_sim.php",
          type: "POST",
          dataType: "html",
          data: {
            id_sim: id_sim,
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
            orderby: orderby,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_sim_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            id_sim: id_sim,
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
            orderby: orderby,
          },
          success: function (result) {
            if (result != "") {
              $(".all_product_mobile").html(result);
            }
          },
        });
      }
    });
  }

  // fillter_sim
  if ($(".jfilter-option_scd").exists()) {
    $(".jfilter-option_scd").click(function () {
      if ($(this).hasClass("active")) {
        // console.log("aaa");
        $(this).removeClass("active");
      } else {
        $(this).addClass("active");
      }
      var action = $(this).data("action");
      // $(this).addClass('active');

      var id_sim = "";
      var check_sim = $(".check_sim.active");
      check_sim.each(function () {
        id_sim = id_sim + "," + $(this).data("id_sim");
      });
      if ((id_sim.length = 1)) {
        id_sim = id_sim.substring(1);
      }
      var id_loai_sim = "";
      var id_sim_tinh_nhan = "";
      var check_loai_sim = $(".check_loai_sim.active");
      if($(this).data("id_loai_sim") != 'sim_tinh_nhan'){
        check_loai_sim.each(function () {
          id_loai_sim = id_loai_sim + "|" + $(this).data("id_loai_sim") + ",";
        });
        if ((id_loai_sim.length = 1)) {
          id_loai_sim = id_loai_sim.substring(1);
        }
      }else{
        id_sim_tinh_nhan = $(".check_loai_sim.active").data("id_loai_sim");
      }

      var id_gia = "";
      var check_gia = $(".check_gia.active");
      check_gia.each(function () {
        id_gia = id_gia + "," + $(this).data("gia");
      });
      if ((id_gia.length = 1)) {
        id_gia = id_gia.substring(1);
      }

      var dauso = "";
      var check_dauso = $(".check_dauso.active");
      check_dauso.each(function () {
        dauso = dauso + "," + $(this).data("dauso");
      });
      if ((dauso.length = 1)) {
        dauso = dauso.substring(1);
      }

      var tranhso = "";
      var check_tranhso = $(".check_tranhso.active");
      check_tranhso.each(function () {
        tranhso = tranhso + "," + $(this).data("tranhso");
      });
      if ((tranhso.length = 1)) {
        tranhso = tranhso.substring(1);
      }
      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_simcd.php",
          type: "POST",
          dataType: "html",
          data: {
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_loai_sim: id_loai_sim,
            id_sim:id_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_simcd_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_sim:id_sim,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      }
    });
  }

  // $('.jfilter-option_ceckone.check_loai_sim').click(function() {
  //   $('.jfilter-option_ceckone.check_loai_sim').removeClass("active");
  //   console.log("aaa");
  //   // $('.jfilter-option_ceckone.check_gia').removeClass("active");
  //   // $('.jfilter-option_ceckone.check_sim').removeClass("active");
  // });

  if ($(".jfilter-option_ceckone").exists()) {
    $(".jfilter-option_ceckone").click(function () {
      $(".jfilter-option_ceckone").removeClass("active");
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
      } else {
        // if($(this).data('id_loai_sim')){
        //   $(".jfilter-option_ceckone.check_loai_sim").removeClass("active");
        // }
        // if($(this).data('gia')){
        //   $(".jfilter-option_ceckone.check_gia").removeClass("active");
        // }
        // if($(this).data('id_sim')){
        //   $(".jfilter-option_ceckone.check_sim").removeClass("active");
        // }
        // if($(this).data('dauso')){
        //   $(".jfilter-option_ceckone.check_dauso").removeClass("active");
        // }
        // if($(this).data('tranhso')){
        //   $(".jfilter-option_ceckone.check_tranhso").removeClass("active");
        // }
        $(this).addClass("active");
        // console.log();
        
      }
      var action = $(this).data("action");
      // $(this).addClass('active');
      
      var id_sim = "";
      var check_sim = $(".check_sim.active");
      check_sim.each(function () {
        id_sim = id_sim + "," + $(this).data("id_sim");
      });
      if ((id_sim.length = 1)) {
        id_sim = id_sim.substring(1);
      }
      // console.log(id_sim);
      var id_loai_sim = "";
      var id_sim_tinh_nhan = "";
      var check_loai_sim = $(".check_loai_sim.active");
      if($(this).data("id_loai_sim") != 'sim_tinh_nhan'){
        check_loai_sim.each(function () {
          id_loai_sim = id_loai_sim + "|" + $(this).data("id_loai_sim") + ",";
        });
        if ((id_loai_sim.length = 1)) {
          id_loai_sim = id_loai_sim.substring(1);
        }
      }else{
        id_sim_tinh_nhan = $(".check_loai_sim.active").data("id_loai_sim");
      }

      var id_gia = "";
      var check_gia = $(".check_gia.active");
      check_gia.each(function () {
        id_gia = id_gia + "," + $(this).data("gia");
      });
      if ((id_gia.length = 1)) {
        id_gia = id_gia.substring(1);
      }

      var dauso = "";
      var check_dauso = $(".check_dauso.active");
      check_dauso.each(function () {
        dauso = dauso + "," + $(this).data("dauso");
      });
      if ((dauso.length = 1)) {
        dauso = dauso.substring(1);
      }

      var tranhso = "";
      var check_tranhso = $(".check_tranhso.active");
      check_tranhso.each(function () {
        tranhso = tranhso + "," + $(this).data("tranhso");
      });
      if ((tranhso.length = 1)) {
        tranhso = tranhso.substring(1);
      }
      // console.log(tranhso);
      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_sim.php",
          type: "POST",
          dataType: "html",
          data: {
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_sim:id_sim,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
              $(".sim_gan_giong").addClass('d-hide')
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_sim_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_sim:id_sim,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
          },
          success: function (result) {
            if (result != "") {
              $(".all_product_mobile").html(result);
            }
          },
        });
      }
    });
  }

  // fillter_sim
  if ($(".jfilter-option_scd_ceckone").exists()) {
    $(".jfilter-option_scd_ceckone").click(function () {
      $('.jfilter-option_ceckone.check_loai_sim').removeClass("active");
      $('.jfilter-option_ceckone.check_gia').removeClass("active");
      $('.jfilter-option_ceckone.check_sim').removeClass("active");
      if ($(this).hasClass("active")) {
        // console.log("aaa");
        $(this).removeClass("active");
      } else {
        $(this).addClass("active");
      }
      var action = $(this).data("action");
      // $(this).addClass('active');

      var id_sim = "";
      var check_sim = $(".check_sim.active");
      check_sim.each(function () {
        id_sim = id_sim + "," + $(this).data("id_sim");
      });
      if ((id_sim.length = 1)) {
        id_sim = id_sim.substring(1);
      }

      var id_loai_sim = "";
      var id_sim_tinh_nhan = "";
      var check_loai_sim = $(".check_loai_sim.active");
      if($(this).data("id_loai_sim") != 'sim_tinh_nhan'){
        check_loai_sim.each(function () {
          id_loai_sim = id_loai_sim + "|" + $(this).data("id_loai_sim") + ",";
        });
        if ((id_loai_sim.length = 1)) {
          id_loai_sim = id_loai_sim.substring(1);
        }
      }else{
        id_sim_tinh_nhan = $(".check_loai_sim.active").data("id_loai_sim");
      }

      var id_gia = "";
      var check_gia = $(".check_gia.active");
      check_gia.each(function () {
        id_gia = id_gia + "," + $(this).data("gia");
      });
      if ((id_gia.length = 1)) {
        id_gia = id_gia.substring(1);
      }

      var dauso = "";
      var check_dauso = $(".check_dauso.active");
      check_dauso.each(function () {
        dauso = dauso + "," + $(this).data("dauso");
      });
      if ((dauso.length = 1)) {
        dauso = dauso.substring(1);
      }

      var tranhso = "";
      var check_tranhso = $(".check_tranhso.active");
      check_tranhso.each(function () {
        tranhso = tranhso + "," + $(this).data("tranhso");
      });
      if ((tranhso.length = 1)) {
        tranhso = tranhso.substring(1);
      }
      if (action == "dev") {
        $.ajax({
          url: "ajax/ajax_fillter_simcd.php",
          type: "POST",
          dataType: "html",
          data: {
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_sim:id_sim,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      } else if (action == "mobile") {
        $.ajax({
          url: "ajax/ajax_fillter_simcd_mobile.php",
          type: "POST",
          dataType: "html",
          data: {
            id_gia: id_gia,
            dauso: dauso,
            tranhso: tranhso,
            id_sim:id_sim,
            id_loai_sim: id_loai_sim,
            id_sim_tinh_nhan: id_sim_tinh_nhan,
          },
          success: function (result) {
            if (result != "") {
              $(".prod-list-top").html(result);
            }
          },
        });
      }
    });
  }
};

/* Ready */
$(document).ready(function () {
  NN_FRAMEWORK.Fillter();
});
