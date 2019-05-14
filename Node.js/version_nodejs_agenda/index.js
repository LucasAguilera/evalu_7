
const express = require('express'),
		mongoose = require('mongoose'),
		app = require('./app'),
		port = process.env.PORT || 3000


//realizamos la conexion con el servidor 
mongoose.connect('mongodb://localhost:27017/AgendaDB', {useMongoClient: true}, (err, res) => {
	if (err) return console.log('Error en la conexión con BD '+err)
	
	console.log('Conexión establecida con la base de datos')

	
	app.listen(port, function() {
  		console.log('Servidor corriendo')
	})
})
