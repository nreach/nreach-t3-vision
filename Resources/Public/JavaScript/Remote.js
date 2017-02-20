define([
    'jquery'
], function (
    $
) {
    function route(id)
    {
        if (TYPO3)
            return TYPO3.settings.ajaxUrls[id];
        else if (window && window.parent && window.parent.TYPO3)
            return window.parent.TYPO3.settings.ajaxUrls[id];
        else
            return '';
    }

    function remote(action, args, cb)
    {
        if (action === 'pagecontent')
            pagecontent(args, cb);
        else
            $.post(route('nreacht3_nreacht3'), {action: action,  args: args})
            .done(function(data) {
                cb(null, data);
            }).
            fail(function(jqXHR, textStatus, errorThrown) {
                cb(null, jqXHR.responseText);
            });
    }

    function pagecontent(args, cb) {

    }

    return remote;
});
