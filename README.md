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
