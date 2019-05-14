var mongoose = require('mongoose'),
		esq = mongoose.Schema

//Modelo
var	esq_usuario = new esquema({
	nombre: {type: String},
	email: {type: String, unique: true, lowercase: true},
	clave: {type: String, required: true, lowercase: true}
})


//Exportar el modulo
module.exports = mongoose.model('Usuario', esq_usuario)