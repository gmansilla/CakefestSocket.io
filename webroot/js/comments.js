$(document).ready(function() {
    var articleID = $('#articleId').val();
    var url = 'http://demo.cakefest:3000/';
    var socket = io.connect(url);

    socket.emit('joinRoom', {'articleId': articleID});

    socket.on('newComment', function(data){
        console.log(data);
        var newComment = '<p>' + data.author + '</p>'
            + '<p>' + data.comment + '</p>'
            + '<p><small>' + data.created + '</small></p><hr>';

        $('#comments').append(newComment);
    });
});