
const Router = require('express').Router(),
      Usuario = require('../modelo/usuario')


  //Metodo que busca y verifica la existencia de los Usuarios del sistema (Crearlos si no existen)
  Router.get('/buscar_y_verificar_usuarios', function(req, res) {
    Usuario.find({}, (err, usuarios) => {
      if (err) {
        return res.status(500).send({message: 'Error al intentar obtener los usuarios. (status:500)'})
      }else{
        if (usuarios.length <= 0) {
			//primer usuario 
			let nuevoUsu1 = new Usuario()
			nuevoUsu1.nombre = 'Lucas Aguilera'
			nuevoUsu1.email = 'lucas@mail.com'
			nuevoUsu1.clave = '123456'
			nuevoUsu1.save((err, usuario1) => {
			  	
			})

			//segundo usuario
			let nuevoUsu2 = new Usuario()
			nuevoUsu2.nombre = 'Marcos Aguilera'
			nuevoUsu2.email = 'marcos@mail.com'
			nuevoUsu2.clave = '1234'
			nuevoUsu2.save((err, usuario2) => {
			  	
			})			
        }else{
          return res.json(usuarios)
        } 
      } 
    })
  })


//Exportar el modulo
module.exports = Router

