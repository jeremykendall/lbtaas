# Little Bobby Tables as a Service

Little Bobby Tables as a Service (LBTaaS) was created as an example of `composer create-project`
for my [Composer presentation](http://www.slideshare.net/jeremykendall/game-changing-dependency-managment)
given at [TechCamp Memphis](http://techcampmemphis.com/) on Nov 2, 2013.

### Live on the Webs

Check out the production version at [http://lbtaas.jeremykendall.net](http://lbtaas.jeremykendall.net).

## Installation

* Install [Composer](http://getcomposer.org)
* Run `composer create-project jeremykendall/lbtaas lbtaas`
* Add `127.0.0.1    lbtaas.dev` to `/etc/hosts`
* Create a vhost with `DocumentRoot` set to `/path/to/lbtaas/public`
* Restart apache
* WIN

## Usage

Make a GET request to [http://lbtaas.dev/lbt?version=1](http://lbtaas.dev/lbt?version=1). 
You should receive the following JSON response:

```
{
   "status":"success",
   "data":{
      "name":"Exploits of a Mom",
      "permalink":"http:\/\/xkcd.com\/327\/",
      "image":"http:\/\/imgs.xkcd.com\/comics\/exploits_of_a_mom.png",
      "alt":"Her daughter is named Help I'm trapped in a driver's license factory.",
      "link":"\/lbt?version=1&format=json"
   }
}
```

## Official xkcd JSON Interface

Unbeknownst to me, there is an actual, no kidding, in production JSON interface
for xkcd.  From the xkcd [About page](http://xkcd.com/about/):

> **Is there an interface for automated systems to access comics and metadata?**
>
> Yes. You can get comics through the JSON interface, at URLs like [http://xkcd.com/info.0.json](http://xkcd.com/info.0.json) (current comic) and [http://xkcd.com/614/info.0.json](http://xkcd.com/614/info.0.json) (comic #614).

So the "real" LBTaaS would be [http://xkcd.com/327/info.0.json](http://xkcd.com/327/info.0.json), wouldn't it?

### Official xkcd JSON Interface Response Body

Here's the response body you'll get for Little Bobby Tables from the [official JSON endpoint](http://xkcd.com/327/info.0.json):

````
{
   "month":"10",
   "num":327,
   "link":"",
   "year":"2007",
   "news":"",
   "safe_title":"Exploits of a Mom",
   "transcript":"[[A woman is talking on the phone, holding a cup]]\nPhone: Hi, this is your son's school. We're having some computer trouble.\nMom: Oh dear\u00e2\u0080\u0094did he break something?\nPhone: In a way\u00e2\u0080\u0094\nPhone: Did you really name your son \"Robert'); DROP TABLE Students;--\" ?\nMom: Oh, yes. Little Bobby Tables, we call him.\nPhone: Well, we've lost this year's student records. I hope you're happy.\nMom: And I hope you've learned to sanitize your database inputs.\n{{title-text: Her daughter is named Help I'm trapped in a driver's license factory.}}",
   "alt":"Her daughter is named Help I'm trapped in a driver's license factory.",
   "img":"http:\/\/imgs.xkcd.com\/comics\/exploits_of_a_mom.png",
   "title":"Exploits of a Mom",
   "day":"10"
}
```
