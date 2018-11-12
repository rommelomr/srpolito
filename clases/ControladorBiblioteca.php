<?php 

	class ControladorBiblioteca{

		public static function principal(){


			Accion::cargarPagina('biblioteca','principal');
		}
		public static function registrarLibro(){


			Accion::cargarPagina('biblioteca','registrarLibro');
		}
		public static function prestamos(){

			Accion::cargarPagina('biblioteca','prestamos');
		}
		public static function biblioteca(){

			Accion::cargarPagina('biblioteca','biblioteca');
		}


	}




?>