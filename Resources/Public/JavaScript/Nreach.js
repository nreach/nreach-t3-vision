requirejs.config({
    paths: {
        NreachUI: [
            'http://localhost:3001/webpack/NreachUI',
            //If the dev version fails, load local
            '../typo3conf/ext/nreacht3/Resources/Public/JavaScript/lib/NreachUI'
        ]
    }
});

/**
 * @fileOverview Form JavaScript
 * @name Api.js
 * @author Johannes Goslar
 */
define([
    'jquery',
    './Remote',
    'NreachUI'
], function (
    $,
    Remote,
    NreachUI
) {
    if (HTMLCollection.prototype[Symbol.iterator] ==  null)
        HTMLCollection.prototype[Symbol.iterator] = Array.prototype[Symbol.iterator];

    var trans = {
        'nreacht3-imagekeywords': {
            widget: 'ImageKeywords',
            selector: function(element) {
                return $(element.parentElement.parentElement).siblings('.form-wizards-element')[0].children[0];
            }
        },
        'nreacht3-imagedescription': {
            widget: 'ImageDescription',
            selector: function(element) {
                return $(element.parentElement.parentElement).siblings('.form-wizards-element')[0].children[0];
            }
        },
        'nreacht3-pagekeywords': {
            widget: 'PageKeywords',
            selector: function(element) {
                return $(element.parentElement.parentElement).siblings('.form-wizards-element')[0].children[0];
            }
        }
    };

    $.each(trans,  function(className, config) {
        for (var element of document.getElementsByClassName(className))
        {
            var target = config.selector(element);
            var data = $.extend({target: target}, element.dataset);
            new NreachUI.default([config.widget], element, data, Remote);
        }
    });
});
