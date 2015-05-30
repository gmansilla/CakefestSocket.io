# CakePHP + Node.js + Socket.io demo

The idea behind this demo is to demonstrate how to implement real-time notifications using CakePHP + Node.js + Socket.io.

## Notifications:

We will notify all users (in articles/index view) when an article is added/modified.
We will notify in articles/view/$articleId view when a comment is added to that particular article, in other words, users will be able to see the comments as soon as somebody adds one (No need to reload the page).

## Notes

I used the [blog](http://book.cakephp.org/3.0/en/tutorials-and-examples/blog/blog.html) demo in cakephp docs, so no rocket science in here, just add the articles and comments table

Grab a copy of the Node.js app [here](https://github.com/gmansilla/CakefestNodejs) (I used port 3000).

The hostname I used is http://demo.cakefest/ so you have to update your hosts file.

## TODO

You might want to use a configuration setting to store the url to connect to the Node.js server
