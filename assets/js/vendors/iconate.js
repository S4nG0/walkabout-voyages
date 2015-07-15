(function() {
    'use strict';
    var DEFAULT_DURATION = 600;
    var DEFAULT_ANIMATION = 'zoomOut';
    var frameCounter = 1;
    var TEST_INTERVAL = 10;
    var MAX_FRAMES = 100;
    var ONE_SECOND = 1000;
    var ANIMATION_START;
    var ANIMATION_END;
    var isAnimationSupported = (function() {
        var isIe11 = !window.ActiveXObject && 'ActiveXObject' in window;
        var documentStyle = document.documentElement.style;
        return !isIe11 && (documentStyle.animation !== undefined || documentStyle.webkitAnimation !== undefined);
    })();
    if (window.onanimationend === undefined && window.onwebkitanimationend !== undefined) {
        ANIMATION_END = 'webkitAnimationEnd';
    } else {
        ANIMATION_END = 'animationend';
    }
    if (window.onanimationstart === undefined && window.onwebkitanimationstart !== undefined) {
        ANIMATION_START = 'webkitAnimationStart';
    } else {
        ANIMATION_START = 'animationstart';
    }
    var currentTime = Date.now || function() {
        return new Date().getTime();
    };
    var time = currentTime();
    var timer1 = setInterval(func1, TEST_INTERVAL);
    var timer2 = setInterval(func1, TEST_INTERVAL);

    function func1() {
        var elapsedTime = currentTime() - time;
        if (elapsedTime >= ONE_SECOND) {
            clearInterval(timer1);
            clearInterval(timer2);
        }
        frameCounter = frameCounter + 1;
    }

    function setAnimation(element, animType, duration) {
        element.style.setProperty('-webkit-animation', animType + ' ' + duration + 's');
        element.style.setProperty('animation', animType + ' ' + duration + 's');
        element.style.setProperty('-moz-animation', animType + ' ' + duration + 's');
        element.style.setProperty('-o-animation', animType + ' ' + duration + 's');
    }

    function removeAnimation(element) {
        element.style.removeProperty('-webkit-animation');
        element.style.removeProperty('animation');
        element.style.removeProperty('-moz-animation');
        element.style.removeProperty('-o-animation');
    }

    function changeClasses(element, from, to) {
        if (element.classList.contains(from)) {
            element.classList.remove(from);
        }
        element.classList.add(to);
    }

    function iconate(el, options, callback) {
        if (!el) {
            throw new Error('Iconate > "element" is required');
        }
        if (!isAnimationSupported) {
            changeClasses(element, options.from, options.to);
            if (typeof callback == 'function') {
                callback();
            }
            return;
        }
        options = options || {};
        var duration, interval, showPercent, animation;
        animation = options.animation || DEFAULT_ANIMATION;
        duration = options.duration || DEFAULT_DURATION;
        interval = duration / MAX_FRAMES;

        function animationStartHandler() {
            var currentPercent = 0,
                averageFrames;
            showPercent = window.setInterval(function() {
                currentPercent = currentPercent < MAX_FRAMES ? currentPercent + 1 : 0;
                averageFrames = Math.max(parseInt(frameCounter / 4, 10), 40);
                if (currentPercent === averageFrames) {
                    changeClasses(el, options.from, options.to);
                }
            }, interval);
        }

        function animationEndHandler() {
            window.clearInterval(showPercent);
            removeAnimation(el);
            el.removeEventListener(ANIMATION_END, animationEndHandler);
            el.removeEventListener(ANIMATION_START, animationStartHandler);
            if (typeof callback === 'function') {
                callback();
            }
        }
        el.addEventListener(ANIMATION_START, animationStartHandler, false);
        el.addEventListener(ANIMATION_END, animationEndHandler, false);
        setAnimation(el, animation, duration / ONE_SECOND);
    }
    if (typeof exports === 'object') {
        module.exports = iconate;
    } else if (typeof define === 'function' && define.amd) {
        define([], iconate);
    } else {
        window.iconate = iconate;
    }
}());