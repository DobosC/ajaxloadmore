let currentPage = 1;
jQuery("#load-more").on("click", function () {
  currentPage++;
  console.log("test");
  jQuery.ajax({
    type: "POST",
    url: "//ajax-load-more.local/wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "weichie_load_more",
      paged: currentPage,
    },
    success: function (res) {
      jQuery(".publication-list").append(res);
      console.log("test");
    },
  });
});
