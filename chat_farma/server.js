const express = require('express');
const app = express();
const path = require('path');
const http = require('http').Server(app);
const socketio = require('socket.io')(http);

/* Static File
    -index.html
    -css / styles.css
    -js / main.js
*/

app.use(express.static(path.join(__dirname, 'public')));

socketio.on('connection', function(socket){
    console.log('Nuevo usuario conectado')

    /* Escuchando evento enviado por el cliente */
    socket.on('nuevo mensaje', data =>{
        socketio.emit('nuevo mensaje servidor', data)
    })
})

var port = process.env.PORT || 3000;
http.listen(port, ()=>{
    console.log('Servidor corriendo en el puerto 3000');
})
