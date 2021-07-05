import $ from "jquery";
import 'bootstrap'
import './modules/cookieInfo'
import './modules/main'
import 'slick-carousel'
import baguetteBox from 'baguettebox.js';
import './modules/residenceModalForm'
import './modules/formValidation'

$('body').click(function () {
    $('#menu').show();
    $('#menuhidden').hide();
});

$('.variable-width').slick({
    centerMode: false,
    variableWidth: false,
    adaptiveHeight: true,
    rows: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    infinite: true,
    speed: 900,
    fade: true,
    prevArrow: false,
    nextArrow: false,
    cssEase: 'linear'
});

baguetteBox.run('.cards-gallery', {animation: 'slideIn'});





