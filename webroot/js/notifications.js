/**
 * Created by guille on 15-05-18.
 */
var socket = io.connect('http://demo.cakefest:3000/');

//socket.set('transports', ['websocket']);

//socket.set('transports', ['xhr-polling']);

socket.on('something', function(data){
    console.log(data);
});

socket.on('newArticle', function(data) {
    var message = '<div>New article added: <a href="/articles/view/' + data.articleId + '">' + data.articleTitle + ' </a>';
    $('#notifications').append(message);
});

socket.on('updatedArticle', function(data) {
    var message = '<div>Article <a href="/articles/view/' + data.articleId + '">' + data.articleTitle + '</a> has been modified';
    $('#notifications').append(message);
});

socket.on('newComment', function(data){
    console.log('new coomn');
    console.log(data);
});

socket.on('notifyNewComment', function(data){
    //[Author] added a [Comment] in [Article Title]
    var message = data.author + ' added a <a href="/articles/view/' + data.articleId + '"> comment</a> in "' + data.articleTitle + '"';
    $('#notifications').append(message);
});