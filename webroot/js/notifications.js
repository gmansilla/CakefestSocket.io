var socket = io.connect('http://demo.cakefest:3000/');

socket.on('newArticle', function(data) {
    var message = '<div>New article added: <a href="/articles/view/' + data.articleId + '">' + data.articleTitle + ' </a>';
    $('#notifications').append(message);
});

socket.on('updatedArticle', function(data) {
    var message = '<div>Article <a href="/articles/view/' + data.articleId + '">' + data.articleTitle + '</a> has been modified';
    $('#notifications').append(message);
});

socket.on('notifyNewComment', function(data){
    var message = data.author + ' added a <a href="/articles/view/' + data.articleId + '"> comment</a> in "' + data.articleTitle + '"';
    $('#notifications').append(message);
});