
const Router = require('express').Router(),
      Usuario = require('../modelo/usuario')


  //Metodo obtener un Usuario de sistema 
  Router.get('/obtener_usuario', function(req, res) {
    let usuarioID = req.query._id || '';
    Usuario.findById(usuarioID, (err, usuario) => {
      if (err) {
        return res.status(500).send({message: 'Error al intentar obtener el usuario.'})
      }else{
        if (!usuario) {
          return res.status(404).send({message: 'El usuario no existe en la base de datos.'})
        }else{
          res.json(usuario)
        } 
      } 
    })
  })


  Router.post('/login', function(req, res) {
    let inEmail = req.body.email,
        inClav = req.body.clave,
        inSesion = req.session
    Usuario.find({email: inEmail}, function (err, usuario_Mail) {
      if (err) {
        return res.status(500).send({message: 'Error al intentar obtener el usuario. '})
      }else{
        if(usuario_Mail.length == 1){
          Usuario.find({email: inEmail, clave: inClav}, function (err, usuario_MailYClave) {
            else{
              if(usuario_MailYClave.length == 1){ 
                inSesion.usuario = usuario_MailYClave[0]["email"]
                inSesion.id_usuario = usuario_MailYClave[0]["_id"]
                res.send('OK')
              }else{
                res.send("Clave incorrecta")
              }
            }
          })          
        }else{
          res.send("Usuario no registrado")
        }
      }
    });
  })

  //Metodo cerrar sesión
  Router.post('/logout', function(req, res) {
    req.session.destroy(function(err) {
      else{
        req.session = null
        res.send('logout')
        res.end()
      }
    })
  })  

  Router.all('/', function(req, res) {
    return res.send({message: 'Error al intentar mostrar el recurso solicitado.'}).end()
  })


module.exports = Router