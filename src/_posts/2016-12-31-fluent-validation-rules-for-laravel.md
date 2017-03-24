---
layout: post
title:  "Fluent Validation Rules for Laravel"
date:   2016-12-31 23:58:00 +1100
excerpt: "Laravel validation rules are great, but wouldn't it be awesome if there was a fluent interface for ALL the rules. Well, that's what I've put together. If you love chaining methods, and dig Laravel validation, you'll enjoy this fluent validation package."
---

## What is Data Validation

Applications (both web and native) are continually receiving input from users that it can then perform actions upon. Whether you are sending a post to Facebook, that Facebook then saves to a database and presents to other users, or sending your credit card details to PayPal, all this input needs to be validated to ensure it is in a format that the application can handle. If you send through a credit card number to PayPal containing only letters, PayPal shouldn’t try and save those details, instead the input would not pass validation and they would let the user know they need to try again and (hopefully) provide the user with information about what actually went wrong. PayPal has just checked your input, that’s validation! Performing validation ensures data consistency and is also very important for security reasons.

For a working example, let’s say we are allowing a user to login and we have the following requirements for the input:

- __Email__
  - Must be a valid email address, i.e. tim@example.com
  - Must be a maximum length of 255 characters (a database restriction we have implemented)
- __Name__
  - Must be provided
  - Must be at least 2 characters in length
  - Must be a maximum of 255 characters (same as above)

## Using Laravel Validation

In order to use the validation workflow’s provided by Laravel, we basically just need to build up an array of rules. These rules can then be validated in many different ways, which you can read more about in the documentation. Here is what the most basic array would look like for our working example.

```php
<?php

$rules = [
    'email' => 'required|email|max:255',
    'name' => 'required|min:2|max:255'
];
```

As you can see, each rule is separated by the pipe `|` character. Most of the time I’m working with rather simple validation logic like this, and the above example is pretty straightforward to understand and read, which is always important. Once you have your rules mapped out like this, you can pass them to a validator to determine if the data passes or fails and perform actions based on the outcome. The validator will also provide you with error messages, or you can specify custom messages, but you should read up on that over at the docs, they are fantastic!

## Rule Builder

To make the creation of validation rules even more readable, I’ve develop a _rule builder_. The builder utilises a fluent interface that helps to make the code more expressive and gets rid of the pipe separated string syntax. Laravel as a whole has a large focus on the feel of the framework API and utilises the fluent interface for lots of things throughout the codebase. It actually already has a fluent rule builder for some more complex rules, but more on that shortly.

Now instead of concatenating all these rules with the pipe character, we can simply call method names that correspond with the rules and pass in the arguments.

```php
<?php

use TiMacDonald\Rule\Builder as Rule;

...

$rules = [

    'email' => Rule::required()
                   ->email()
                   ->max(255)
                   ->get(),

    'name' => Rule::required()
                  ->min(2)
                  ->max(255)
                  ->get()
];

// var_dump($rules);

array(2) {
  ["email"]=>
  string(22) "required|email|max:255"
  ["name"]=>
  string(22) "required|min:2|max:255"
}
```

### Bonus Points

For the sake of readability, it is also possible to prefix method calls with `is`, `allowed`, `has` or `matches` interchangeably. These can also be modified by extending the class. So now we can utilise these even more expressive method names. It is also possible with the basic validation rules to provide options as either seperate arguments or as a single array, to suit your preferred approach. For the sake of example, I’ll extend our validation requirements on this one to include a profile and banner image. Doubling up with the image/mimes validation here, but it is just to demonstrate the available flexibility. You’ll see in the profile image mimes are passed in as seperate arguments, but the banner image mimes are passed in as a single array, both are perfectly valid working versions.

```php
<?php

use TiMacDonald\Rule\Builder as Rule;

...

$rules = [

    'email' => Rule::isRequired()
                   ->isEmail()
                   ->hasMax(255)
                   ->get(),

    'name' => Rule::isRequired()
                  ->hasMin(2)
                  ->hasMax(255)
                  ->get(),

    'profile_image' => Rule::isImage()
                           ->allowedMimes('png', 'jpeg')
                           ->get(),

    'banner_image' => Rule::isImage()
                          ->allowedMimes(['png', 'jpeg'])
                          ->get()
];

// var_dump($rules);

array(4) {
  ["email"]=>
  string(22) "required|email|max:255"
  ["name"]=>
  string(22) "required|min:2|max:255"
  ["profile_image"]=>
  string(20) "image|mimes:png,jpeg"
  ["banner_image"]=>
  string(20) "image|mimes:png,jpeg"
}
```

## Built in Rule Class

As I mentioned earlier, Laravel actually comes with some built in classes for building validation rules, however it only allows for the creation of the `dimensions`,  `exists`,  `in`,  `not_in` and `unique` rules. I’d hate to reinvent the wheel, so I incorporated them into this builder and calls to these rules are proxied internally to the built in validation rules on the fly. One thing to keep in mind is that the built in rules have additional methods of their own for building up the validation logic, so you must call any methods on a built in rule directly after the initial call to it. As a example, let’s say we want to ensure that the user’s email is _unique_ in the database, but we want to ignore a specific users id. Easy, let’s make some magic…

```php
<?php

use TiMacDonald\Rule\Builder as Rule;

...

$rules = [

    'email' => Rule::isRequired()
                   ->isUnique('users')->ignore($user->id)
                   ->isEmail()
                   ->hasMax(255)
                   ->get(),

    'name' => Rule::isRequired()
                  ->hasMin(2)
                  ->hasMax(255)
                  ->get()
];

// var_dump($rules);

array(2) {
  ["email"]=>
  string(45) "required|email|max:255|unique:users,NULL,7,id"
  ["name"]=>
  string(22) "required|min:2|max:255"
}
```

Here you can see the built in `unique` rule with a following `ignore` method call on it. This ignore method is delegated to the ignore rule and so are any following method calls until another rule is encountered, in this case `isEmail` is the next encountered rule. Nice, right?

## Performance Hit

I’m no performance guru in any way, however wrapping this all up will undoubtably create some overhead, however minimal. There are things that can be done to improve performance, which I might get to one day like specifying specific methods for each rule rather than allowing multiple method prefixes for each rule. Keep this in mind, but I’d say with something like the above example the overhead is going to be pretty minimal.

## Stolen!

Validation is a pretty common thing and I’ve often thought of doing something like this (as I’m sure many Laravel developers have), but it wasn’t until I heard North Meets South podcast mention that someone should do the rest of the rules (very briefly in passing) that I decided I’d give it a go. So yea, I stole the idea really :) I’ve also seen, after some initial Googling around the idea, that there is another project (on GitHub?) similar to this that encapsulates a lot more of the validation process into it, but I can’t track it down now! If I track it down or someone else does, let me know, and I will definitely update this post and link to it. I wanted this to be a basic rule builder that just replaces the pipe concatenation process, which I think it does very nicely.

## The Wrap

If you wanna utilise the rule builder, you can checkout the repo on GitHub, but this was more of a proof of concept and a bit of an exercise for myself than anything else, but is a fully valid working example. The plain string validation syntax is easy to create and reads pretty well as it is, but this just codifies the process of creating the syntax. It isn’t in its own package as it’s just a little feature of my base setup for Laravel projects and wasn’t real sure if there would be any interest. If there is any interest I’d be happy to check it into into its own repo. Happy for any feedback, code reviews or comments that can help improve it.

## Links

- [Repo on GitHub][github-link]
- [The Fluent Interface](http://martinfowler.com/bliki/FluentInterface.html)
- [Laravel documentation](https://laravel.com/docs/master/validation)
- [North Meets South Podcast](http://www.northmeetssouth.audio/)
- [Learn the built in Laravel rules on Laracasts](https://laracasts.com/series/whats-new-in-laravel-5-3/episodes/18)

[github-link]: https://github.com/timacdonald/rule-builder
