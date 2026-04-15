$(document).ready(function(){
    if($('#main-brands-form').length){
        $('#main-brands-form .selectpicker').selectpicker({
            liveSearch: true,
            mobile: $('body').width() <= 767
        });
    }
    
    const simpleBar = new SimpleBar(document.getElementById('simplebar'), { forceVisible: false });
    $('.search-brand-grid .quick-search-brand ul li').click(function(){
        var value = $(this).text();
        $(this).parent('ul').find('li').removeClass('active');
        $(this).addClass('active');
        $('.search-brand-grid .list .simplebar-content').html('<i class="fas fa-spinner fa-spin s-loader"></i>');
        $.ajax({
            url: '/index.php?dispatch=brands.brands_by_letters&letters=' + value,
            success: function(html){
                $('.search-brand-grid .list .simplebar-content').html(html);
                //simpleBar.removeObserver();
                simpleBar.recalculate();
            }
        });
    });
    
    $('.search-brand-form').submit(function(){
        var value = $(this).find('.search-brand-field').val().trim();
        if(value != ''){
            $.ajax({
                url: '/index.php?dispatch=brands.brands_by_name&value=' + value,
                beforeSend: function(){
                    $('.search-brand-grid .list .simplebar-content').html('<i class="fas fa-spinner fa-spin s-loader"></i>');  
                },
                success: function(html){
                    $('.search-brand-grid .list .simplebar-content').html(html);
                    simpleBar.recalculate();
                }
            });
        }else{
            alert('Please enter a value');
        }
        return false;
    });
    
    $('#main-brands-form').submit(function(){
        var url = $(this).find('.selectpicker option:selected').attr('data-url');
        if(url != undefined){
            location.href = url;
        }
        return false;
    });
});


function GetReCaptchaID(containerID) {
    var retval = -1;
    $(".g-recaptcha").each(function(index) {
        if(this.id == containerID)
        {
            retval = index;
            return;
        }
     });
 
     return retval;
}