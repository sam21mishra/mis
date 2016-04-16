/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version 1.0.5
 * @since $Id:$
 */
//on document ready
(function () {
    var events = {
        events: {},
        on: function (eventName, fn) {
            this.events[eventName] = this.events[eventName] || [];
            this.events[eventName].push(fn);
        },
    };



    (function () {
        //caching DOM
        var $el = $('.followups');
        var $enquiry_id = $el.attr('data-value');

        $el.on('click', showfollowups);

        function showfollowups(value) {
            console.log(value);
        }
    })();
});
