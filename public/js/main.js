jQuery(function($){
  
  /* -------------------------------------
   datepicker
  ---------------------------------------- */
  $('#datepicker').datepicker({
 
    changeYear: true,
    changeMonth: true,
    monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
    dateFormat: 'yyyy/mm/dd',
    duration: 300,
    showAnim: 'show'
 
  });

  /* -------------------------------------
    ハンバーガーメニュー
  ---------------------------------------- */
  $('.navBtn').click(function() {
    $(this).toggleClass('active');

    if ($(this).hasClass('active')) {
        $('.sidebar').addClass('active');
    } else {
        $('.sidebar').removeClass('active');
    }
  });

  
  /* -------------------------------------
    ポップアップ
  ---------------------------------------- */

  $('.btn_pop').each(function(){
    $(this).on('click', function() {
      $('.popup').fadeIn();
    });
      
    // ×やモーダルの背景をクリックした時
    $('.popup').click(function(){
      $('.popup').fadeOut(); // モーダルを非表示にする
    });
  });
  
});