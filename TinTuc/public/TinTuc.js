var http = require('http');
var Fs = require('fs');

var server=http.createServer(function(req,res){
	res.writeHead(200,{"Context-type":"text/html"});
	
	
	if(req.url=='/index.html' || req.url=='/'){
		res.writeHead(200,{"Context-type": "text/html"});
		Fs.createReadStream('./index.html').pipe(res);
	}else if(req.url=='/dangki.html') {
		res.writeHead(200,{"Context-type": "text/html"});
		Fs.createReadStream('./dangki.html').pipe(res);
	}else if(req.url=='/dangnhap.html') {
		res.writeHead(200,{"Context-type": "text/html"});
		Fs.createReadStream('./dangnhap.html').pipe(res);
	}else if(req.url=='/loaitin.html') {
		res.writeHead(200,{"Context-type": "text/html"});
		Fs.createReadStream('./loaitin.html').pipe(res);
	}else if(req.url=='/chitiet.html') {
		res.writeHead(200,{"Context-type": "text/html"});
		Fs.createReadStream('./dangki.html').pipe(res);
	}else{
		res.writeHead(404, {
            "Context-type" : "text/plain"
        });
         
        res.write('404 Not Found ' + req.url);
         
        res.end();
	}





}).listen(9090);

server.listen(9090,function(){
	console.log("Have people connect");
});