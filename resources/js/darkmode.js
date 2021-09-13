$(document).ready(function (){
    $("#checkbox").click(function() {
        $("#checkbox").prop("checked", this.checked);
        if (this.checked){
            localStorage.setItem('theme','dark');
            $("body").attr('data-theme','dark');
            $(".title_dark").attr('color','dark');
            $(".item_book").attr('data-theme','dark');
            $(".navbar").attr('data-theme','dark');
            $(".breadcrumb").attr('data-theme','dark');
        }else{
            localStorage.removeItem('theme');
            $("body").removeAttr('data-theme');
            $('.title_dark').removeAttr('color');
            $(".item_book").removeAttr('data-theme');
            $(".navbar").removeAttr('data-theme');
            $(".breadcrumb").removeAttr('data-theme');
        }
    });
})

