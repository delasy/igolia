//TODO: add recaptcha
var config = require('./package.json');
var http = require('http');
var util = require('util');

/*var redis = require("redis");
var client = redis.createClient({
    retry_strategy: function (options) {
        if (options.error && options.error.code === 'ECONNREFUSED') {
            // End reconnecting on a specific error and flush all commands with a individual error
            return new Error('The server refused the connection');
        }
        if (options.total_retry_time > 1000 * 60 * 60) {
            // End reconnecting after a specific timeout and flush all commands with a individual error
            return new Error('Retry time exhausted');
        }
        if (options.attempt > 10) {
            // End reconnecting with built in error
            return undefined;
        }
        // reconnect after
        return Math.min(options.attempt * 100, 3000);
    }
});*/

var igolia = require('igolia');

var db = igolia.db;
var paths = igolia.paths;
var router = igolia.router;
var mime = igolia.mime;

igolia.set('port', process.env.PORT || config.port);

var server = http.createServer(igolia.router).listen(igolia.get('port'),function(){
	console.log('Server started on port: ' + igolia.get('port'));
});

module.exports = igolia;

process.stdin.setEncoding('utf8');
process.stdin.on('readable', () => {
	var chunk = process.stdin.read();
	if(chunk.substr(0,16) === 'get_cached_files'){
		process.stdout.write( JSON.stringify(igolia.cache.files) );
	}
	if(chunk.substr(0,16) === 'get_cached_users'){
		process.stdout.write( JSON.stringify(igolia.cache.users) );
	}
});
