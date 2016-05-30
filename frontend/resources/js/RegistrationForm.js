/**
 * Форма регистрации участников
 */
var RegistrationForm = {
    
    init: function() {
        var self = this;
        $(document).ready(function() {
            $('.js-addFriendBtn').click(function() {
                self.addFriendForm($(this));
            });
        });
    },
    
    addFriendForm: function($btn){
        var $container = $btn.parent();
        $.ajax({
            type: 'get',
            url: '/friend',
            data: {},
            cache: false,
            dataType: 'html'
        }).done(function(html) {
            $btn.attr('disabled', true);
            $container.append(html);
        }).fail(function() {
            alert('Request error');
        });
    },
    
    asArray: function($form) {
        var $fields = $form.find('input');
        var data = {};
        $fields.each(function() {
            var startPos =  $(this).attr('name').indexOf('[');
            var endPos = $(this).attr('name').indexOf(']');
            var name = $(this).attr('name').substr(startPos + 1, endPos - startPos - 1);
            data[name] = $(this).val();
        });
        return data;
    },
    
    getForm: function() {
        return $('#form-registration');
    },
    
    submitFriends: function($btn) {
        var $container = $btn.closest('#friend-registration');
        var data = this.asArray($container);
        $.ajax({
            type: 'post',
            url: '/friend/save',
            data: data,
            cache: false,
            dataType: 'html'
        }).done(function(html) {
            $container.html(html);
        }).fail(function() {
            alert('Request error');
        });
    }
};