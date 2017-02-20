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
 * @fileOverview Chat Interface for Nreach
 * @name Chat.js
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



    $(document).ready(function(){
        var active = false,
            element = document.body.appendChild(document.createElement('div')),
            instance = null;

        $('#chatbottoggle').click(function() {
            if (!instance)
                instance = new NreachUI.default(['Chat'], element, {}, Remote);
            else if (active)
                instance.hide()
            else
                instance.render();
            active = !active;
        });
    });
    return null;
});
