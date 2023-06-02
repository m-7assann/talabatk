let dashboard = $(".dashboard");

$(".menu-toggle-btn").click(function() {
  if (!dashboard.hasClass("close-menu") && !dashboard.hasClass("open-menu")) {
    if (document.body.clientWidth > 768) {
      dashboard.addClass("close-menu");
    } else {
      dashboard.addClass("open-menu");
    }
  } else if (dashboard.hasClass("close-menu")) {
    dashboard.removeClass("close-menu");
    dashboard.addClass("open-menu");
  } else {
    if (dashboard.hasClass("open-menu")) {
      dashboard.removeClass("open-menu");
    }
    dashboard.addClass("close-menu");
  }
});

$(".dashboard-content").click(function(e) {
  if (
    document.body.clientWidth <= 768 &&
    !$(e.target).hasClass("menu-toggle-btn") &&
    !$(e.target).parents(".menu-toggle-btn").length
  ) {
    if (dashboard.hasClass("open-menu")) {
      dashboard.removeClass("open-menu");
    }
    dashboard.addClass("close-menu");
  }
});

$(".dropdown-btn").click(function() {
  $(this)
    .parent()
    .find(".dropdown-content")
    .toggleClass("hide");
});

function __(element, lang_dict) {
  if (
    typeof lang_dict !== "undefined" &&
    lang_dict[element.dataset.translate]
  ) {
    element.innerText = lang_dict[element.dataset.translate];
  } else if (element.dataset.default) {
    element.innerText = element.dataset.default;
  }
}

function translate_page(lang_dict) {
  var translate_elements = document.getElementsByClassName("translate"),
      i;
  for (i = 0; i < translate_elements.length; i++) {
    __(translate_elements[i], lang_dict);
  }
}

var fa_lang = {
  dashboard: "داشبورد",
  'manage-campains': "مدیریت کمپین‌ها",
  'transaction_reports': "حسابداری",
  profile: "پروفایل کاربری",
  logout: "خروج",
  balance: "موجودی:",
  toman: "تومان",
  show_all_messages: "نمایش تمامی پیام‌ها",
  admin: "ادمین"
};

var en_lang = {
  dashboard: "Dashboard",
  'manage-campains': "Campains",
  'transaction_reports': "Accounting",
  profile: "user profile",
  logout: "logout",
  balance: "balance:",
  toman: "toman",
  show_all_messages: "Show all messages",
  admin: "admin"
};

translate_page(fa_lang);

$(".language-dropdown").click(function(e) {
  $(this)
    .children()
    .children()
    .toggleClass("hide");
  dashboard.toggleClass("rtl-dashboard");
  dashboard.toggleClass("ltr-dashboard");
  if (dashboard.hasClass("rtl-dashboard")) {
    translate_page(fa_lang);
  } else {
    translate_page(en_lang);
  }
});

$(document).click(function(e) {
  let target_parents = $(e.target).parents(".dropdown");
  $(".dropdown").each(function(index, element) {
    if (element !== target_parents[0]) {
      $(element)
        .find(".dropdown-content")
        .addClass("hide");
    }
  });
});

/* var myChart = new Chart($(".myChart"), {
  type: "line",
  data: {
    labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
    datasets: [
      {
        data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
        label: "کلیک",
        borderColor: "#3e95cd",
        fill: false
      },
      {
        data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
        label: "نمایش",
        borderColor: "#8e5ea2",
        fill: false
      },
      {
        data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
        label: "تعامل",
        borderColor: "#3cba9f",
        fill: false
      }
    ]
  }
}); */

/* $(".change-page").click(function(){
  let menu_item = $(".menu ul").find("[data-target='" + $(this).data('target') + "']");
  $(".menu ul li.activate").removeClass("activate");
  if(menu_item.length === 0){
if($('.menu-bar').hasClass('selected')){
      $('.menu-bar').removeClass('selected');
    }
  } else{
    if(!$('.menu-bar').hasClass('selected')){
      $('.menu-bar').addClass('selected');
    }
    $(".selector-row").offset({ top: menu_item[0].offsetTop + 86 });
    menu_item.addClass("activate");
  }
  $('.page').removeClass('current-page');
  $('.' + $(this).data('target')).addClass('current-page');
  $("html, body, .dashboard-content").animate({scrollTop: 0}, 300);
}); */

$(".dashboard-content").scroll(function(){
  if($(this).scrollTop() >= 0 && !$(this).hasClass('full-header')){
    $(this).addClass('full-header')
  }
  $(".page").scrollTop($(this).scrollTop() + 5);
});

$(".page").scroll(function(){
  if($('.dashboard-content').hasClass('full-header') && $(this).scrollTop() === 0){
    $(".dashboard-content").removeClass('full-header')
  }
  else if(!$('.dashboard-content').hasClass('full-header') && $(this).scrollTop() >= 10){
    $(".dashboard-content").addClass('full-header')
  }
});
