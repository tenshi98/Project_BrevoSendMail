#  BrevoSendMail
### Funcion para el envio de correos a traves del servicio Brevo

Brevo es un servicio que permite externalizar la tarea de envío de correos, ya que en muchos casos los servidores de los clientes son puestos en lista negra debido a que son considerados máquinas de envío de spam (muchas veces suele ocurrir debido a que el cliente tiene un servidor del tipo compartido y no uno dedicado), por lo que las notificaciones que envía a través de email no llegan a los destinatarios. Brevo se encarga del envío del correo de forma segura, revisando internamente que éste no devuelva error por spam sin la intervención de quien contrato su servicio.

Esta es una reimplementación del uso de su servicio en el entorno de PHP, básicamente es una forma mucho más fácil de implementar la librería de ellos en nuestros proyectos.

```php
//Documentacion Oficial
'https://developers.brevo.com/recipes/send-transactional-emails-in-php'
```

## Uso 🚀
Sólo basta agregar la función en algún lugar de nuestro proyecto y ejecutarlo de la siguiente forma:

```php
$rmail = brevoSendMail('jperez@mail.com', 'Juan Pérez', 'malvarez@mail.com', 'Marisol Alvarez', 'Notificación', '<p>Cuerpo mensaje</p>', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
```

Solo queda capturar la respuesta y listo

## Licencia 📄
Este proyecto está bajo la Licencia GPL-3.0 license - ve el archivo [LICENSE](LICENSE) para detalles

## Contacto 📖
Puedes contactarte conmigo a traves de cualquier de los siguientes canales:
- [Github](https://github.com/tenshi98)
- [Linkedin](https://www.linkedin.com/in/victor-reyes-galvez/)
- [Portafolio](https://tenshi98.github.io/portafolio/)
- [Mi Web](https://web.digitalcreations.cl/)

## Contribuciones 🎁
Estamos agradecidos por las contribuciones de la comunidad a este proyecto. Si encontraste cualquier valor en este proyecto o quieres contribuir, aquí está lo que puedes hacer:

- Comparte este proyecto con otros
- Invítame un café ☕
- Inicia un nuevo problema o contribuye con un PR
- Muestra tu agradecimiento diciendo gracias en un nuevo problema.

---

⌨️ por [Victor Reyes](https://github.com/tenshi98) 😊
