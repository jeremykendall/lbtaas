# Little Bobby Tables as a Service

Little Bobby Tables as a Service (LBTaaS) was created as an example of `composer create-project`
for my [Composer](http://getcomposer.org) presentation given at [TechCamp Memphis](http://techcampmemphis.com/)
on Nov 2, 2013.

## Installation

* Install [Composer](http://getcomposer.org)
* Run `composer create-project jeremykendall/lbtaas lbtaas`
* Add `127.0.0.1    lbtaas` to `/etc/hosts`
* Create a vhost with `DocumentRoot` set to `/path/to/lbtaas/public`
* Restart apache
* WIN

## Usage

Visit [http://lbtaas.dev](http://lbtaas.dev).  You should get the below response:

```
HTTP/1.1 200 OK
Date: Sat, 02 Nov 2013 20:40:30 GMT
Server: Apache/2.2.24 (Unix) DAV/2 PHP/5.4.19 mod_ssl/2.2.24 OpenSSL/0.9.8y
X-Powered-By: PHP/5.4.19
Content-Length: 159
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/json

{"status":"success","data":{"name":"Exploits of a Mom","permalink":"http:\/\/xkcd.com\/327\/","image":"http:\/\/imgs.xkcd.com\/comics\/exploits_of_a_mom.png"}}
```
