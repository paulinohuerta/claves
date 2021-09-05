# -*- coding: utf-8 -*-
from flask import Flask
from flask import render_template
from flask import request
from flask import make_response
import redis
import sys

app= Flask(__name__)

@app.route("/")
def home():
  last=None
  elementos=None
  if request.args :
   key = request.args.get('key')
   value = request.args.get('value')
   r = redis.StrictRedis(host='localhost', port=6379)
   if not r.sismember('nombres1',key):
     r.sadd('nombres1',key)
     r.hset('nombres1H',key,value)
     elementos=r.hgetall('nombres1H')
     last=key
  response = make_response(render_template("home.html", elementos=elementos,last=last))
  return response

if __name__ == '__main__':
  app.run(port=5300,debug=True)
