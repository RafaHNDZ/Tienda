<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_Model extends CI_Model {

	function list_files($folder){
		$files = array();
		$directory = array();
		if(is_dir(($folder))){
			if ($dir = opendir($folder)) {
				while (($file = readdir($dir)) !== false) {
					//Discriminar regresos (./ o ..) y .htaccess
					if($file != '.' && $file != '..' && $file != '.htaccess'){
						//Comprobar si es dirctorio o archivo
						if(is_dir($folder.'/'.$file)){
							$file = array(
								'name' => $file,
								'path' => $folder.'/'.$file,
								'type' => 'folder',
								'file_icon' => 'fa fa-folder',
								'action' => "open_folder('".$folder.'/'.$file."')"
							);
							array_push($files, $file);
						}else{
							$file = array(
								'name' => $file,
								'path' => $folder.'/'.$file,
								'type' => 'file',
								'file_icon' => 'fa fa-file',
								'action' => "open_file('".$folder.'/'.$file."')"
							);
							array_push($files, $file);	
						}
					}
				}
				$sub_path_exploded = explode('/', $folder);
				$sub_paths = array();
				$sub_path = array();
				foreach ($sub_path_exploded as $path) {
					if($path != "opt" && $path !="lampp" && $path !="htdocs" && $path !="Apps" && $path !="Tienda" && $path !="assets" && $path != "uploads"){
						$sub_path = array(
							'path' => array_pop($sub_path_exploded),
							'folder' => $folder
						);
						array_push($sub_paths, $sub_path);
					}
				}
				$directory = array(
					'route' => 'root',
					'path' => $folder,
					'sub_paths' => $sub_paths,
					'content' => $files
				);
			}
			closedir($dir);
		}
		return $directory;
	}

}

/* End of file File_Model.php */
/* Location: ./application/models/File_Model.php */