<?php
	class DataBase{
		public static function set_values($arr=null){
			unset($_POST['mod']);
			$info = $_POST; //Se hace esto por si los valores vienen de un formulario (Por post) y se guarda en la variable $info los posibles datos
			if($arr!=null){
				foreach ($arr as $key => $value) {
					$info[$key]=$value;
				}
			}
			//Se agregan a la variable los valores recibidos por parámetro, tal que quedaría
			/*
				$info[
				...
				columna_1=>valor_1,
				columna_2=>valor_2,
				columna_3=>valor_3,
				columna_4=>valor_4,
				...
				];
			*/
			return $info;
		}
		public static function insert($Class,$arr=null){
			
			$class_attrs = $Class::$attr;
			$info = self::set_values($arr);

			$columns = '';		
			$values = '';
			//se iteran las columnas de la tabla recibidas desde su clase ya configurada
			foreach ($class_attrs as $key => $value) {
				if($key===0){

					$columns .= $value;//variable que guardará las columnas para la sentencia sql
					$values .= ':'.$value;
//					$values .= ':'.array_keys($info,$info[$value],true)[0];
					//variable que guardará los values para la sentencia sql... La función retorna el nombre de la columna 
				}else{
					$columns .= ', '.$value;
					$values .= ', :'.$value;
//					$values .= ', :'.array_keys($info,$info[$value],true)[0];
				}
				if($value=='pass'){

					$arr[':'.$value] = password_hash($info[$value],PASSWORD_BCRYPT);
				}else{
					$arr[':'.$value] = $info[$value];
				}

			}
			return 'insert into '.$Class::$table.' ('.$columns.') values('.$values.')';
			$con = new Conexion();
			return $con -> enviar('insert into '.$Class::$table.' ('.$columns.') values('.$values.')',$arr);
			
		}
		public static function select($attrs,$table,$w_p=null){

			$con = new Conexion;

			$sql = 'select '.$attrs;
			$sql .= ' from '.$table.' ';
			if($w_p!=null){
				
				$pred = explode('pred:',$w_p);

				if(count($pred)>1){
					if($pred[0]!=''){
						$sql .= 'where '.$pred[0];
					}
					if($pred[1]!=''){
						$sql .= $pred[1];
					}
				}else{
					$sql .= 'where '.$w_p;

				}
				
			}

			return $con -> extraer($sql);

		}
		public static function update($table,$set,$where){

			$con = new Conexion;
			$set_query = '';$first = true;
			foreach ($set as $key => $value){

				if($first){
					$set_query .= $key.'= :'.$key;
					
					$first = false;
				}else{
					$set_query .= ', '.$key.'= :'.$key;

				}
				$arr[$key]=$value;
			}
			if($where!=null){
				$where_query = ' where '; $first = true;
				foreach ($where as $key => $value){
					if($first){
						$where_query .= $key.$value[0].' (:'.$key.')';
						$first = false;
					}else{
						$where_query .= ' and '.$key.$value[0].' (:'.$key.')';
					}
					$arr[$key]=$value[1];
				}	
			}
			return $con -> enviar('update '.$table.' set '.$set_query.' '.$where_query,$arr);
		}
	}
?>