jQuery(function ($) {
  $("table.table_nhomdanhmuc tbody th, table.table_nhomdanhmuc tbody td").css(
    "cursor",
    "move"
  );

  const _helper = function (event, ui) {
    ui.each(function () {
      $(this).width($(this).width());
    });
    return ui;
  };

  const _start = function (event, ui) {
    ui.item.css("background-color", "#ffffff");
    ui.item.children("td, th").css("border-bottom-width", "0");
    ui.item.css("outline", "1px solid #dfdfdf");
  };

  const _stop = function (event, ui) {
    ui.item.removeAttr("style");
    ui.item.children("td,th").css("border-bottom-width", "1px");
  };

  const _sort = function (e, ui) {
    ui.placeholder.find("td").each(function (key, value) {
      if (ui.helper.find("td").eq(key).is(":visible")) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  };

  // pages, posts
  $("table.table_nhomdanhmuc #the-list").sortable({
    items: "tr:not(.inline-edit-row)",
    cursor: "move",
    axis: "y",
    containment: "table.table_nhomdanhmuc",
    scrollSensitivity: 40,
    helper: _helper,
    start: _start,
    stop: _stop,
    update: function (event, ui) {
      $(
        "table.table_nhomdanhmuc tbody th, table.table_nhomdanhmuc tbody td"
      ).css("cursor", "default");
      $("table.table_nhomdanhmuc tbody").sortable("disable");

      // Show Spinner
      ui.item
        .find(".my-checkbox input")
        .hide()
        .after(
          '<img alt="processing" src="assets/images/ajax-loader.gif" class="waiting" style="margin-left: 6px;" />'
        );
      // sorting via ajax
      //   console.log();
      var p = $("#p_nhomdanhmuc").val();
      var limit = $("#limit_nhomdanhmuc").val();
      var table = $("#table_nhomdanhmuc").val();
      ajaxurl = "ajax/ajax_stt_update.php";
      $.post(
        ajaxurl,
        {
          action: "update-menu-order",
          order: $("#the-list").sortable("serialize"),
          limit:limit,
          p:p,
          table:table,
        },
        function (response) {
          ui.item.find(".my-checkbox input").show().siblings("img").remove();
          $(
            "table.table_nhomdanhmuc tbody th, table.table_nhomdanhmuc tbody td"
          ).css("cursor", "move");
          $("table.table_nhomdanhmuc tbody").sortable("enable");
        }
      );

      // fix cell colors
      $("table.table_nhomdanhmuc tbody tr").each(function () {
        let i = $("table.table_nhomdanhmuc tbody tr").index(this);
        if (i % 2 === 0) {
          $(this).addClass("alternate");
        } else {
          $(this).removeClass("alternate");
        }
      });
    },
    sort: _sort,
  });
});
