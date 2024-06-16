$(document).ready(function () {
    var formIndex = 1;

    $('#add_form').click(function () {
        var newForm = $('.form_instance:first').clone();
        newForm.find('input, select').each(function () {
            var name = $(this).attr('name');
            if (name) {
                var newName = name.replace(/\d+/, formIndex);
                $(this).attr('name', newName);
                $(this).val(''); // Очищаем значение поля
            }
        });
        $('#forms_container').append(newForm);
        formIndex++;
    });

    $('.select').click(function () {
        if ($(this).val() === "По организации") {
            $('#add_form').hide();
        } else {
            $('#add_form').show();
        }
    });

    let timeout;
    
    // При наведении на блок FAQ показываем блок info-menu и добавляем класс active
    $('.nav__item-info').mouseenter(function() {
        $('.info-menu').show();
        $('.nav__item-info a').addClass('active');
    });

    // При наведении на блок info-menu оставляем его отображенным и удаляем задержку
    $('.info-menu').mouseenter(function() {
        $(this).show();
        clearTimeout(timeout);
        $('.nav__item-info a').addClass('active');
    });

    // При уходе курсора из области обоих блоков скрываем блок info-menu с задержкой
    $('.nav__item-info, .info-menu').mouseleave(function() {
        timeout = setTimeout(() => {
            $('.info-menu').hide();
            $('.nav__item-info a').removeClass('active');
        }, 100); // Задержка в миллисекундах (например, 500 мс)
    });

    // Выбор
    $(".select").click(function(){
        $(".select").removeClass("choose");
        $(this).addClass("choose");
    });


});