# [TodoMVC](http://addyosmani.github.com/todomvc/) with [Laravel](http://laravel.com) PHP framework as backend.

Working demo at http://laraveltodos.pagodabox.com

Also a secure version avaiable at http://laraveltodossecure.pagodabox.com/ 
The source code for the secure version is in this repo, in SECURE branch. 
 
Full Integration + API Tutorial at my blog (http://maxoffsky.com/maxoffsky-blog/building-restful-api-in-laravel-part-3-integration-with-backbonejs/)

## Feature Overview

- Has a simple API consisting of ONE route and ONE controller to manage todos.
- Has view templates that look just like TodoMVC example
- Users can save, edit and delete todos.

#DB structure 

```
CREATE TABLE `todos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `completed` varchar(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

```

## License
Code is open-sourced software licensed under the MIT License.
